<?php

namespace App\Http\Controllers;

use App\Sport;
use Illuminate\Http\Request;

class SportController extends Controller
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
        $sport = Sport::all();
        return view('admin.all-sports')->with('all_sport', $sport);
    }

    public function showSportAddForm()
    {
        return view('admin.add-sports');
    }

    public function save(Request $request)
    {
        // Validate form data
        $this->validate($request,
            [
                'category_id' => ['required'],
            ]
        );

        $sport = Sport::create([
            'category_id' => $request->category_id,
            'team_one' => $request->team_one,
            'team_two' => $request->team_two,
            'bet_price' => $request->bet_price,
            'sport_status' => 1,
            'match_date' => $request->match_date,
            'venue' => $request->venue,
            'match_result' => 'TBA',
        ]);

        return redirect('admin/add-sport')->with('status', 'Sport added successfully');
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect('admin/all-sport')->with('status', 'Sport is deleted');
    }

    public function sportUpdateForm($id)
    {

    }

    public function update($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect('admin/all-sport')->with('status', 'Sport is deleted');
    }

}
