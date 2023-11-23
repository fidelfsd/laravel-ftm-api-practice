<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'get all teachers';
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return 'create new teacher';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return 'get a teacher';
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return 'update a teacher';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return 'delete a teacher';
    }
}
