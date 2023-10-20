<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UseraccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($choice)
    {
        if ($choice === 'admin') {
            // Tampilan untuk data admin
            return view('layouts.content.page-user-admin'); // Gantilah 'admin_view' dengan nama berkas tampilan yang sesuai untuk admin.
        } elseif ($choice === 'author') {
            // Tampilan untuk data employee
            return view('layouts.content.page-authors'); // Gantilah 'employee_view' dengan nama berkas tampilan yang sesuai untuk employee.
        } else {
            // Tindakan default jika pilihan tidak valid
            return view('invalid_choice');
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
