<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;

class UsersController extends Controller
{

    public function index()
    {
        return view('admin.users.index', [
            'users' => User::orderBy('name')->paginate(10)
        ]);
    }

    public function show(User $user)
    {
        return view('admin.users.show', [
            'user'          => $user,
            'orders'        => Order::whereUserId($user->id)->get(),
            'overAllPrice'  => 0
        ]);
    }

    public function promoteToParticipant(User $user)
    {
        $user->attachRole(Role::whereName('participant')->firstOrFail()->id);

        return redirect()->intended('admin/users');
    }

    public function demoteParticipant(User $user)
    {
        $user->detachRole(Role::whereName('participant')->firstOrFail()->id);

        return redirect()->intended('admin/users');
    }

    public function exportCsv()
    {
        return response()->view('admin.users.export.csv', [
            'users' => User::all()
        ], 200, [
            'Content-type'          => 'text/csv',
            'Content-Disposition'   => 'attachment;filename=felezo-felhasznalok-'. Carbon::now()->format('Y-m-d-h-i-s') .'.csv'
        ]);
    }
}