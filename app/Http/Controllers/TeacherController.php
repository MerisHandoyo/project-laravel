<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Subject;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = "Teachers";
        $search = "Search teacher...";
        $searchTerm = trim($request->input('search', ''));

        $subjects = Subject::all();

        $teachers = Teacher::with('subject')
            ->when($searchTerm, function ($query) use ($searchTerm) {
                $query->whereRaw(
                    'LOWER(name) LIKE ?',
                    [strtolower($searchTerm) . '%']
                );
            })
            ->get();

        $teacherNames = Teacher::select('name')
            ->distinct()
            ->orderBy('name')
            ->pluck('name');

        return view('admin.teachers', compact(
            'title',
            'search',
            'searchTerm',
            'teachers',
            'subjects',
            'teacherNames'
        ));
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
            'name' => 'required|string|max:255',
            'niy' => 'required|digits:10|unique:teachers,niy',
            'subject_id' => 'required|exists:subjects,id|unique:teachers,subject_id',
            'start_date' => 'required|date',
        ]);

        Teacher::create([
            'name' => $request->name,
            'niy' => $request->niy,
            'subject_id' => $request->subject_id,
            'start_date' => $request->start_date,
        ]);

        return redirect()
            ->route('admin.teacher.index')
            ->with('success', 'Teacher successfully added.');
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
