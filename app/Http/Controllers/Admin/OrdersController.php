<?php

namespace app\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;

class OrdersController extends Controller
{
    public function index()
    {
        return view('admin.orders.index', [
            'orders' => Order::orderBy('created_at')->paginate(20)
        ]);
    }

    public function edit(Order $order)
    {
        return view('admin.orders.edit', [
            'order' => $order
        ]);
    }

    public function update(Request $request, Order $order)
    {
        $validator = $this->getValidator($request);
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('admin.orders.index');
    }

    public function exportCsv()
    {
        return response()->view('admin.orders.export.csv', [
            'orders' => Order::all()
        ], 200, [
            'Content-type'          => 'text/csv',
            'Content-Disposition'   => 'attachment;filename=felezo-foglalasok-'. Carbon::now()->format('Y-m-d-h-i-s') .'.csv'
        ]);
    }

    private function getValidator(Request $request)
    {
        return Validator::make($request->all(), $this->getValidatons());
    }

    private function getValidations()
    {
        return [

        ];
    }
}