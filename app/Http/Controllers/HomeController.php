<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use Auth;
use App\Category;
use App\Sport;
use App\Post;
use App\ConfirmBet;
use App\User;
use App\Bid;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $current = new Carbon();
        $current->timezone('Asia/Dhaka');

        $category = Category::all();
        $sport = Sport::where('match_date', '>', $current)->orderby('created_at', 'DESC')->limit(10)->get();

        return view('home', array('category' => $category, 'sport' => $sport));
    }

    public function categoryItemShow($id)
    {
        $current = new Carbon();
        $current->timezone('Asia/Dhaka');

        $category = Category::all();
        $sport = Sport::where('match_date', '>', $current)->where('category_id', $id)->get();

        return view('homes.homes', array('category' => $category, 'sport' => $sport));
    }

    //----- Sport details -------//

    public function showSportDetails($id)
    {
        $sport = Sport::where("id", $id)->first();
        $post_one = Post::where('sp_id', $id)->where('support_team', $sport->team_one)->with('bets')->get();
        $post_two = Post::where('sp_id', $id)->where('support_team', $sport->team_two)->with('bets')->get();

        $confirm = ConfirmBet::where('sp_id', $id);

        return view('sport-details', array('sport' => $sport, 'post_one' => $post_one, 'post_two' => $post_two, 'confirms' => $confirm));
    }

    //----- Bid Place details -------//

    public function showPlaceBidForm($id)
    {
        $post = Post::where('id', $id)->first();

        $users = User::where('id', $post->post_owner_id)->first();

        $bid = Bid::where('post_id', $id)->where('user_id', Auth::user()->id)->get();

        $lastbid = Bid::where('post_id', $id)->where('user_id', Auth::user()->id)->latest()->first(); //->orderby('created_at', 'DESC')

        return view('sport-bid', array('post' => $post, 'bids' => $bid, 'lastbid' => $lastbid, 'users' => $users));
    }

    // Bid by user

    public function saveBid(Request $request, $id)
    {
        if($request->bid_amount > Auth::user()->wallet)
        {
            return redirect('/place-bid/'.$id)->with('status', 'Check Wallet! You can not place this bid.');
        }else{
            $bid = Bid::create([
                'post_id' => $id,
                'user_id' => Auth::user()->id,
                'message' => $request->message,
                'bid_amount' => $request->bid_amount,
            ]);

            return redirect('/place-bid/'.$id)->with('status', 'Bid Placed');
        }

    }

    // Bid Confirm

    public function confirmBid(Request $request, $id, $sp_id, $bid_amount, $user_id)
    {
        $post = Post::where('id', $id)->first();
        $sport = Sport::where('id', $post->sp_id)->first();

        if($post->support_team == $sport->team_one){
            $placer_team = $sport->team_two;
        }else{
            $placer_team = $sport->team_one;
        }

        if($request->bid_amount > Auth::user()->wallet)
        {
            return redirect('/place-bid/'.$id)->with('c_status', 'Check Wallet! You can not confirm this bid.');
        }else{
            $bid = ConfirmBet::create([
                'post_id' => $id,
                'sp_id' => $request->sp_id,
                'placer_id' => $user_id,
                'placer_team' => $placer_team,
                'taker_id' => Auth::user()->id,
                'taker_team' => $post->support_team,
                'confirm_price' => $bid_amount,
            ]);

            return redirect('/place-bid/'.$id)->with('c_status', 'Bid Confirm');
        }

    }

    // Post Form

    public function showPostForm($id, $team)
    {
        return view('make-post', array('id' => $id, 'team' => $team));
    }

    // Post Save

    public function savePost(Request $request, $id, $team)
    {
        $bid = Post::create([
            'post_owner_id' => Auth::user()->id,
            'sp_id' => $id,
            'support_team' => $team,
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return redirect('/place-bid/'.$id)->with('c_status', 'Bid Confirm');
    }
}
