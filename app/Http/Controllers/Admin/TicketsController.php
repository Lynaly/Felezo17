<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Validator;

class TicketsController extends Controller
{

    public function index()
    {
        return view('admin.tickets.index', [
            'tickets' => Ticket::all()
        ]);
    }

    public function create()
    {
        return view('admin.tickets.create');
    }

    public function store(Request $request)
    {
        $validator = $this->getValidator($request);

        if( $validator->fails() )
        {
            return redirect()->route('admin.tickets.create')
                ->withErrors($validator)
                ->withInput([
                    'name'      => $request->name,
                    'price'     => $request->price,
                    'amount'    => $request->amount
                ]);
        }

        Ticket::create([
            'name'      => $request->name,
            'price'     => $request->price,
            'amount'    => $request->amount
        ]);

        return redirect()->route('admin.tickets.index');
    }

    public function edit(Ticket $ticket)
    {
        return view('admin.tickets.edit', [
            'ticket' => $ticket
        ]);
    }

    public function update(Request $request, Ticket $ticket)
    {
        $validator = $this->getValidator($request);

        if( $validator->fails() )
        {
            return redirect()->route('admin.tickets.edit', [
                'ticket' => $ticket
            ])
                ->withErrors($validator)
                ->withInput([
                    'name'      => $request->name,
                    'price'     => $request->price,
                    'amount'    => $request->amount
                ]);
        }

        $ticket->update([
            'name'      => $request->name,
            'price'     => $request->price,
            'amount'    => $request->amount
        ]);

        return redirect()->route('admin.tickets.index');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()->route('admin.tickets.index');
    }

    private function getValidator(Request $request)
    {
        return Validator::make($request->all(), $this->getValidations());
    }

    private function getValidations()
    {
        return [
            'name'      => 'required|string|max:255',
            'price'     => 'required|numeric|min:0',
            'amount'    => 'required|numeric|min:0'
        ];
    }
}