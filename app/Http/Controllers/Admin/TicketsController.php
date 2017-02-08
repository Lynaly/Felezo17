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

        }
    }

    public function edit(Ticket $ticket)
    {
        return view('admin.tickets.edit');
    }

    public function update(Request $request, Ticket $ticket)
    {
        $validator = $this->getValidator($request);
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        //return redirect()->route('admin.tickets.index')
    }

    private function getValidator(Request $request)
    {
        return Validator::make($request->all(), $this->getValidations());
    }

    private function getValidations()
    {
        return [

        ];
    }
}