<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $user = User::all();
        return view('admin.all-users')->with('all_user', $user);
    }

    public function userdelete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('admin/all-user')->with('status', 'User is deleted');
    }
}
