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
use App\WinHistory;
use App\WithdrawHistory;
use App\MoneySellPost;
use App\WithdrawRequest;
use App\ReferAmount;
use App\ContactUs;
use Illuminate\Support\Facades\Validator;
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

    public function indexPage()
    {
        $sport = Sport::orderby('created_at', 'DESC')->limit(3)->get();
        $post = Post::orderby('created_at', 'DESC')->limit(3)->get();

        return view('index', array('sports' => $sport, 'posts' => $post));
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

        $confirms = ConfirmBet::where('sp_id', $id);

        return view('sport-details', array('sport' => $sport, 'post_one' => $post_one, 'post_two' => $post_two, 'confirms' => $confirms));
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

            Validator::make($request, [
                'bid_amount' => ['required', 'integer'],
            ]);

            $bid = Bid::create([
                'post_id' => $id,
                'user_id' => Auth::user()->id,
                'message' => $request->message,
                'bid_amount' => $request['bid_amount'],
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
                'sp_id' => $sp_id,
                'placer_id' => $user_id,
                'placer_team' => $placer_team,
                'taker_id' => Auth::user()->id,
                'taker_team' => $post->support_team,
                'confirm_price' => $bid_amount,
            ]);

            $confirm_post = Post::findOrFail($id); //Post post status update
            $confirm_post->post_status = 0;
            $confirm_post->update();

            $bid_delete_taker = Bid::where('post_id', $id)->where('user_id', Auth::user()->id)->delete();
            $bid_delete_placer = Bid::where('post_id', $id)->where('user_id', $user_id)->delete();

            return redirect('/place-bid/'.$id)->with('c_status', 'Bid Confirm');
        }

    }

    // Post Form

    public function showPostForm($id, $team)
    {
        return view('make-post', array('id' => $id, 'team' => $team));
    }

    // Post Create

    public function savePost(Request $request, $id, $team)
    {
        $bid = Post::create([
            'post_owner_id' => Auth::user()->id,
            'sp_id' => $id,
            'support_team' => $team,
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'post_status' => 1,
        ]);

        return redirect('/place-bid/'.$id)->with('c_status', 'Bid Confirm');
    }

    //User Own Post
    public function userOwnPost()
    {
        $post = Post::where('post_owner_id', Auth::user()->id);

        return view('user-own-post')->with('posts', $post);
    }

    //User Profile
    public function userProfile()
    {
        //Win History
        $win = WinHistory::where('user_id', Auth::user()->id)->get();

        //Withdraw History
        $withdraw = WithdrawHistory::where('user_id', Auth::user()->id)->get();

        $refer = ReferAmount::first();

        return view('user-profile', array('wins' => $win, 'withdraws' => $withdraw, 'refer' => $refer));
    }

    //Coin Transfer
    public function coinTransfer()
    {
        $coin = MoneySellPost::all();

        return view('coin-transfer', array('coins' => $coin));
    }


    public function transferPost(Request $request)
    {
        if($request->t_amount > Auth::user()->wallet)
        {
            return redirect('/my-coin')->with('status', 'You do not have such amount of coin to sell');
        }else{

            $coin = MoneySellPost::create([
                'name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'user_name' => Auth::user()->user_name,
                'phone' => $request->phone,
                't_amount' => $request->t_amount,
            ]);

            return redirect('/my-coin')->with('status', 'You Post Is Live Now');
        }

    }

    public function moneyTransfer(Request $request)
    {

        if($request->wallet > Auth::user()->wallet)
        {
            return redirect('/my-coin')->with('c_status', 'You do not have such amount to transfer');
        }else{

            $user = User::where('user_name', $request->user_name)->first();

            $transfer = User::findOrFail($user->id);
            $transfer->wallet = $request->input("wallet");
            $transfer->update();

            return redirect('/my-coin')->with('c_status', 'Coin transfered Successfully');
        }

    }

    //Withdraw Request From Profile
    public function withdrawRequest(Request $data, $refer_cut)
    {
        if($data->wallet > Auth::user()->wallet)
        {
            return redirect('/my-coin')->with('status', 'You do not have such amount to request');
        }else{

            $coin = withdrawRequest::create([
                'user_id' => Auth::user()->id,
                'request_amount' => $data->wallet+($data->wallet*($refer_cut/100)),
                'bikash_number' => $data->bikash_number,
            ]);

            return redirect('/my-profile')->with('status', 'You withdraw Request Submit');
        }
    }

    //Contact Us
    public function contactForm()
    {
        return view('contact-us');
    }

    public function sendMessage(Request $request)
    {


            $coin = ContactUs::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'messages' => $request->message,
            ]);

            return redirect('/contact-us')->with('status', 'We got your message! Please wait for reply!');

    }

    //Blog Page
    public function BlogPage()
    {
        return view('sport-blog');
    }

}
