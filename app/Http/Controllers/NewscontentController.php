<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewscontentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->hasRole('admin')) {
                // $content = Content::with('categories')->get();
                $content = Content::all();
                $categories = Categories::all();
                return view('layouts.content.page-newsContent', compact('content', 'categories'));
            } elseif ($user->hasRole('author')) {
                $idProfil = Auth::id();
                $content = Content::where('id_profil', $idProfil)->get();
                $categories = Categories::all();
                return view('layouts.content-user.page-newsContent', compact('content', 'categories'));
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
            'headline' => 'required|string|max:255',
            'date_created' => 'required',
            'upload_image' => 'nullable|image|mimes:jpeg,png,jpg',  
            'news_content' => 'required',
            'categories_id' => 'required|exists:categories,id'
        ]);

        $idProfil = Auth::id();
        $content = new Content();
        $content->id_profil = $idProfil;
        $content->headline = $request->input('headline');
        $content->date_created = $request->input('date_created');
        if ($request->hasFile('upload_image')) {
            $image = $request->file('upload_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/content'), $imageName);
            $content->upload_image = $imageName;
        }
        $content->news_content = $request->input('news_content');
        $content->categories_id = $request->input('categories_id');
        $content->save();

        // dd($content);

        return redirect('/news-content')->with('message', 'Content Add Succesfully');
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
        $content = Content::find($id);
        $conten = Content::all();
        $categories = Categories::all();

        return view('layouts.content.page-newsContent-edit', ['content' => $content, 'conten' => $conten ,'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'headline' => 'required|string|max:255',
            'date_created' => 'required',
            'upload_image' => 'nullable|image|mimes:jpeg,png,jpg',  
            'news_content' => 'required',
            'categories_id' => 'required|exists:categories,id'
        ]);

        $idProfil = Auth::id();
        $content = Content::find($id);
        $conten = Content::all();
        $categories = Categories::all();
        $content->id_profil = $idProfil;
        $content->headline = $request->input('headline');
        $content->date_created = $request->input('date_created');
        if ($request->hasFile('upload_image')) {
            $image = $request->file('upload_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/content'), $imageName);
            $content->upload_image = $imageName;
        }
        $content->news_content = $request->input('news_content');
        $content->categories_id = $request->input('categories_id');
        $content->save();

        return redirect()->route('news-content.index', ['content' => $content, 'conten' => $conten ,'categories' => $categories])->with('message', 'Content updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $content = Content::find($id);
        $content->delete();
        return back()->with('message', 'Content succesfully deleted');
    }
}
