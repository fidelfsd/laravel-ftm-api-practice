<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'get all courses';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return 'create new course';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return 'get a course';
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return 'update a course';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return 'delete a course';
    }
}
