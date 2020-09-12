<?php

namespace App\Http\Controllers;

use App\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
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
        $all_message = ContactUs::all();
        return view('admin.all-message')->with('all_message', $all_message);
    }

    public function delete($id)
    {
        $message = ContactUs::findOrFail($id);
        $message->delete();

        return redirect('admin/all-contact')->with('status', 'Trash Message is deleted');
    }
}
