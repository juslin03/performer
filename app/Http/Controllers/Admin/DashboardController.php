<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function registered()
    {
        $users_registered = User::all();

        return view('admin.register')->with(
            'users_registered',
            $users_registered
        );
    }
    public function edit(Request $request, $id)
    {
        $userToEdit = User::findOrFail($id);
        return view('admin.edit')->with('userToEdit', $userToEdit);
    }

    public function editOne(Request $request, $id)
    {
        $userEdit = User::findOrFail($id);

        $userEdit->name = $request->input('name');
        $userEdit->phone = $request->input('phone');

        $userEdit->usertype = $request->input('usertype');

        $userEdit->update();

        return redirect('/role-register')->with(
            'message',
            'User infos has been updated successfully !'
        );
    }

    public function removeOne(Request $request, $id)
    {
        $userToRemove = User::findOrFail($id);
        $userToRemove->delete();

        return redirect('/role-register')->with(
            'message',
            'Ow, user  has just been deleted'
        );
    }
}
