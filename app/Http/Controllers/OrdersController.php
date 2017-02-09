<?php

namespace App\Http\Controllers;


use App\Models\Order;
use App\Models\Ticket;

class OrdersController extends Controller
{

    public function index()
    {
        return view('orders.index', [
            'free' => Ticket::sum('amount') - Order::count()
        ]);
    }

}