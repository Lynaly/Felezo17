<?php

namespace app\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Ticket;
use Carbon\Carbon;
use Khill\Lavacharts\Lavacharts;
use Lava;

class IndexController extends Controller
{
    public function index()
    {
        $display = Ticket::count() && Order::count();

        if( $display ) {
            Lava::ColumnChart('Orders', $this->getOrdersChart(), [
                'title' => 'Foglalások'
            ]);
        }

        return view('admin.index.index', [
            'display'   => $display
        ]);
    }

    private function getOrdersChart()
    {
        $orders = Lava::DataTable();
        $orders
            ->addDateColumn('Date')
            ->setDateTimeFormat('Y. m. d.'); // Y. m.

        $tickets = Ticket::all();

        foreach($tickets as $ticket) {
            $orders->addNumberColumn($ticket->name);
        }

        $first = Order::orderby('created_at')
            ->first()
            ->created_at;

        for($day = $first; $day->lte(Carbon::now()); $day->addDay()) {
            $data = [$day->format('Y. m. d.')];

            foreach($tickets as $ticket) {
                $data[] = Order::whereTicketId($ticket->id)
                    ->whereDay('created_at', '=', $day->day)
                    ->count();
            }

            $orders->addRow($data);
        }

        return $orders;
    }

}