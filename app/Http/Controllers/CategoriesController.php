<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->hasRole('admin')) {
                $categories = Categories::all();
                return view('layouts.content.page-categories', compact('categories'));
            } elseif ($user->hasRole('author')) {
                $categories = Categories::all();
                return view('layouts.content-user.page-categories-user', compact('categories'));
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'categories' => 'required|string|max:100'
        ]);

        $categories = new Categories();
        $categories->name = $request->input('categories');
        $categories->save();

        return redirect('/categories')->with('message','Category added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Categories::find($id);
        $category = Categories::all();
        // $categories = Categories::all();
        // dd($categories);
        return view('layouts.content.page-categories-edit', ["categories" => $categories, "category" => $category]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categories = Categories::find($id);
        $category = Categories::all();
        $categories->name = $request->input('categories');
        $categories->save();
        return redirect()->route('categories.index', ["categories" => $categories, "category" => $category])->with('message','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories = Categories::find($id);
        $categories->delete();
        return redirect()->route('categories.index')->with('message','Category successfully deleted');
    }

}
