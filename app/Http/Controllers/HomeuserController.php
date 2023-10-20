<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Content;
use App\Models\Categories;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class HomeuserController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $getContentMe = Content::where('id_profil', $userId)->count();
        $getCategories = Categories::count();
        $roleName = 'author';
        $role = Role::where('name', $roleName)->first();
        $getTotalUsers = User::role($roleName)->count();
        return view('layouts.content-user.page-dashbord-user', compact('getContentMe', 'getCategories', 'getTotalUsers'));
    }
}
