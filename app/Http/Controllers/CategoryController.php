<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
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
        $category = Category::all();
        return view('admin.all-category')->with('all_category', $category);
    }

    public function showCategoryAddForm()
    {
        return view('admin.add-category');
    }

    public function save(Request $request)
    {
        // Validate form data
        $this->validate($request,
            [
                'category_name' => ['required', 'unique:categories'],
            ]
        );

        $category = Category::create([
            'category_name' => $request->category_name
        ]);

        return redirect('admin/add-category')->with('status', 'Category added successfully');
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect('admin/all-category')->with('status', 'Category is deleted');
    }
}
