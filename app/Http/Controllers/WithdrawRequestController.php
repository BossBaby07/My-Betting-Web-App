<?php

namespace App\Http\Controllers;

use App\WithdrawRequest;
use App\User;
use Illuminate\Http\Request;

class WithdrawRequestController extends Controller
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
        $all_withdraw = WithdrawRequest::all();
        return view('admin.all-withdraw-request')->with('all_withdraw', $all_withdraw);
    }

    public function showUserInfo(Request $request, $id)
    {
        $user = User::where('id', $request->id)->first();
        return view('admin.user-info')->with('user', $user);
    }

    public function withdrawSuccess(Request $request, $id, $user_id, $amount)
    {
        $user = User::findOrFail($user_id);
        $user->wallet = $user->wallet-$request->amount;
        $user->update();

        $withdraw = WithdrawRequest::findOrFail($id);
        $withdraw->delete();

        return redirect('admin/all-withdraw')->with('status', 'User Withdraw Successfull');
    }
}
