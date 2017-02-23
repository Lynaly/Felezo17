<?php

namespace App\Http\Controllers;


use App\Models\Order;
use App\Models\Ticket;
use Auth;
use Illuminate\Http\Request;
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
        $validator = $this->getValidator($request);

        if( $validator->fails() )
        {
            return redirect()->route('orders.order')
                ->withErrors($validator)
                ->withInput([
                    'ticket' => $request->ticket
                ]);
        }

        Order::create([
            'user_id'   => Auth::user()->id,
            'ticket_id' => $request->ticket
        ]);

        return redirect()->route('orders.index');
    }

    public function destroy(Order $order)
    {
        if( Auth::user()->id != $order->user_id )
            abort(404);

        $order->delete();

        return redirect()->route('orders.index');
    }

    public function getValidator(Request $request)
    {
        return Validator::make($request->all(), $this->getValidations());
    }

    public function getValidations()
    {
        return [
            'ticket'    => 'required|integer|exists:tickets,id'
        ];
    }
}