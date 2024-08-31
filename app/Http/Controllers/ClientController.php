<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Content;
use App\Models\Department;
use App\Models\Role;
use App\Models\User;
use App\Models\Category;
use App\Models\attachment;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function createAccount(Request $request)
    {
        // $request->validate([
        //     'firstname' => 'required',
        //     'lastname' => 'required',
        //     'email' => 'required|unique:users',
        //     'password' => 'required|same:confirm_password'
        // ]);

        // $user = new User();
        // $user->name = $_REQUEST['firstname'] . ' ' . $_REQUEST['lastname'];
        // $user->email = $_REQUEST['email'];
        // $user->role = 0;
        // $user->password = Hash::make($request->password);
        // $user->save();

        return redirect()->back()->withErrors('This action is closed for now, only open to allowed personels!');
    }
}
