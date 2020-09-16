<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::all();
        $count = $user->count();

        $amount = 0;

        foreach($user as $item)
        {
            $amount = $amount + $item->wallet;
        }

        return view('admin.dashboard', array('total_user' => $count, 'amount' => $amount));
    }
}
