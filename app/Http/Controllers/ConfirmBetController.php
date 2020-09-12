<?php

namespace App\Http\Controllers;

use App\ConfirmBet;
use App\Post;
use App\User;
use App\ReferAmount;
use Illuminate\Http\Request;

class ConfirmBetController extends Controller
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
        $all_bet = ConfirmBet::all();
        return view('admin.all-confirmbet')->with('all_bet', $all_bet);
    }

    public function showPostInfo(Request $request, $id)
    {
        $post = Post::where('id', $request->id)->first();
        return view('admin.post-info')->with('post', $post);
    }

    public function placerWin(Request $request, $id, $amount, $bet_id)
    {
        $refer = ReferAmount::where('id', 1)->first();

        $user = User::findOrFail($id);
        $user->wallet = $user->wallet + ($request->amount-(($request->amount*($refer->refer_amount/100))+($request->amount*($refer->author_amount/100))));
        $user->update();

        $give = User::where('user_name', $user->referrer_name)->first();
        $give->wallet = $give->wallet + ($request->amount*($refer->refer_amount/100));
        $give->update();

        $bet = ConfirmBet::findOrFail($bet_id);
        $bet->delete();

        return redirect('admin/all-bet')->with('status', 'User win given perfectly! becareful do not press that button once again for this user');
    }

    public function takerWin(Request $request, $id, $amount, $bet_id)
    {
        $refer = ReferAmount::where('id', 1)->first();

        $user = User::findOrFail($id);
        $user->wallet = $user->wallet + ($request->amount-(($request->amount*($refer->refer_amount/100))+($request->amount*($refer->author_amount/100))));
        $user->update();

        $give = User::where('user_name', $user->referrer_name)->first();
        $give->wallet = $give->wallet + ($request->amount*($refer->refer_amount/100));
        $give->update();


        $bet = ConfirmBet::findOrFail($bet_id);
        $bet->delete();

        return redirect('admin/all-bet')->with('status', 'User win given perfectly! becareful do not press that button once again for this user');
    }

    public function delete(Request $request, $id)
    {
        $bet = ConfirmBet::findOrFail($bet_id);
        $bet->delete();

        return redirect('admin/all-bet')->with('status', 'Confirm bet deleted');
    }
}
