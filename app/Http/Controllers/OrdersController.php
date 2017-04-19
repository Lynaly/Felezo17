<?php

namespace App\Http\Controllers;


use App\Models\Order;
use App\Models\Ticket;
use Auth;
use Illuminate\Http\Request;
use SendGrid;
use SendGrid\Content;
use SendGrid\Email;
use SendGrid\Mail;
use Validator;

class OrdersController extends Controller
{

    public function index()
    {
        $free           = Ticket::Free();
        $ownOrders      = Auth::check() ? Order::whereUserId(Auth::user()->id)->get() : null;
        $overAllPrice   = 0;

        return view('orders.index', [
            'free'          => $free,
            'ownOrders'     => $ownOrders,
            'overAllPrice'  => $overAllPrice
        ]);
    }

    public function order()
    {
        $availableTickets = Ticket::Available()->get();

        return view('orders.order', [
            'availableTickets' => $availableTickets
        ]);
    }

    public function placeAnOrder(Request $request)
    {
        return abort(404);

        $validator = $this->getValidator($request);

        if( $validator->fails() )
        {
            return redirect()->route('orders.order')
                ->withErrors($validator)
                ->withInput([
                    'ticket'    => $request->ticket,
                    'jug_name'  => $request->jug_name,
                    'comment'   => $request->comment
                ]);
        }

        $order = Order::create([
            'user_id'   => Auth::user()->id,
            'ticket_id' => $request->ticket,
            'jug_name'  => $request->jug_name,
            'comment'   => $request->comment
        ]);

        $this->sendEmail($order);

        return redirect()->route('orders.index');
    }

    private function sendEmail(Order $order)
    {
        $sg = new SendGrid(env('SENDGRID_API_KEY'));

        $content = new Content('text/html',
            'Kedves ' . Auth::user()->name .'!<br>' .
            '<br>' .
            'Jegyet foglaltál a felező <a href="' . env('APP_URL') .'">oldalon</a>.<br>'.
            'Adatok:<br>' .
            '<ul>' .
            '<li>Jegy típusa: '. $order->ticket->name .'</li>' .
            '<li>Jegy ára: ' . $order->ticket->price .' Ft</li>' .
            ($order->ticket->jug ? '<li>Korsó felirata: '. $order->jug_name .'</li>' : '') .
            (!empty($order->comment) ? '<li>Megjegyzésed: ' . $order->comment .'</li>' : '') .
            '<li>Foglalás időpontja: ' . $order->created_at->format('Y. m. d. H:i') .'</li>' .
            '</ul><br>' .
            'Találkozunk <b>április 14</b>-én!<br><br>' .
            '<i>Üdvözlettel,<br>' .
            'A rendezők</i>'
        );

        $mail = new Mail(
            new Email('Felező rendezők', env('ORGANIZER_EMAIL')),
            'Felezőjegy foglalás',
            new Email(Auth::user()->name, Auth::user()->email),
            $content
        );

        $response = $sg->client->mail()->send()->post($mail);

        //dd($response, $response->statusCode(), $response->headers(), $response->body());
    }

    public function destroy(Order $order)
    {
        return abort(404);

        if( Auth::user()->id != $order->user_id )
            abort(404);

        $order->delete();

        return redirect()->route('orders.index');
    }

    public function getValidator(Request $request)
    {
        $validator = Validator::make($request->all(), $this->getValidations());

        $validator->addExtension('required_jug', function ($attribute, $value, $parameters) use($request) {
            $ticket = Ticket::find($request->ticket)->firstOrFail();

            return ($ticket->jug && !empty($value)) || !$ticket->jug;
        });

        return $validator;
    }

    public function getValidations()
    {
        return [
            'ticket'    => 'required|integer|exists:tickets,id',
            'jug_name'  => 'required_jug',
            'comment'   => 'nullable|string'
        ];
    }
}