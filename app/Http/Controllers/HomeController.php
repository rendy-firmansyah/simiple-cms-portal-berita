<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Content;
use App\Models\Categories;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

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
        $userId = auth()->id();
        $getContent = Content::count();
        $getCategories = Categories::count();
        $roleName = 'author';
        $role = Role::where('name', $roleName)->first();
        $getTotalUsers = User::role($roleName)->count();
        return view('layouts.content.page-dashboard', compact('getContent', 'getTotalUsers', 'getCategories'));
    }
}
