<?php

namespace App\Http\Controllers;

use App\ReferAmount;
use Illuminate\Http\Request;

class ReferAmountController extends Controller
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

    // public function index()
    // {
    //     $refer = ReferAmount::where('id', 1)->first();
    //     return view('admin.all-refer')->with('refer', $refer);
    // }

    public function showReferForm()
    {
        $refer = ReferAmount::where('id', 1)->first();
        return view('admin.add-refer')->with('refer', $refer);
    }

    public function update(Request $request)
    {
        $refer = ReferAmount::find(1);
        $refer->refer_amount = $request->input("refer_amount");
        $refer->author_amount = $request->input("author_amount");
        $refer->request_cut = $request->input("request_cut");
        $refer->update();

        return redirect('admin/add-referamount')->with('status', 'Refer Amount Added');
    }
}
