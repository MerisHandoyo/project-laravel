<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function index(Request $request)
    {
        $title = "Classroom";

        $searchTerm = trim($request->input('search', ''));

        // Mengambil daftar nama classroom untuk autocomplete
        $classroomNames = Classroom::select('name')
            ->distinct()
            ->orderBy('name')
            ->pluck('name');

        // Mengambil data classroom berdasarkan pencarian
        $classroom = Classroom::with('students')
            ->when($searchTerm, function ($query) use ($searchTerm) {
                $query->whereRaw(
                    'LOWER(name) LIKE ?',
                    [strtolower($searchTerm) . '%']
                );
            })
            ->get();

        return view('admin.classroom.index', compact(
            'title',
            'classroom',
            'searchTerm',
            'classroomNames'
        ));
    }

    // Menambahkan classroom
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'major' => 'required|string|max:255',
        ]);

        Classroom::create([
            'name' => $request->name,
            'major' => $request->major,
        ]);

        return redirect()
            ->route('admin.classroom.index')
            ->with('success', 'Classroom successfully added.');
    }
}
