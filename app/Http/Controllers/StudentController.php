<?php

namespace App\Http\Controllers;

use App\Models\Student; // DIUBAH: import model Student
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Students";
        $search = "Search student...";
        $addStudent = "Add Student";

        $students = Student::with('classroom')->get(); // DIUBAH: mengambil data Student beserta relasi Classroom dari database

        return view('admin.students', compact('title', 'search', 'addStudent', 'students'));
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
