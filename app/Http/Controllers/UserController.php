<?php

namespace App\Http\Controllers;

use App\User;
use App\WinHistory;
use App\WithdrawHistory;
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
        $user = User::orderby('created_at', 'ASC')->paginate(10);

        return view('admin.all-users')->with('all_user', $user);
    }

    // public function userSearch(Request $request)
    // {
    //     $user = User::where('user_name', 'LIKE', "%{$request->user_name}%")->get();

    //     return view('admin.all-users')->with('all_user', $user);
    // }

    public function userdelete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        $w_history = WinHistory::where('user_id', $id)->delete();
        $with_history = WithdrawHistory::where('user_id', $id)->delete();

        return redirect('admin/all-user')->with('status', 'User is deleted');
    }

    public function walletForm($id)
    {
        $user = User::where('id', $id)->first();

        return view('admin.wallet-redeem-form')->with('user', $user);
    }

    public function walletRedeem(Request $request, $id)
    {
        $user = User::find($id);
        $user->wallet = $user->wallet + $request->input("wallet");
        $user->update();

        return redirect('admin/all-user')->with('status', 'User wallet coin added successfully');
    }
}
