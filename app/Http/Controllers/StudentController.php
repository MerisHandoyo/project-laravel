<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $title = "Students";
        $search = "Search student...";
        $searchTerm = trim($request->input('search', ''));

        $classrooms = Classroom::all();

        $students = Student::with('classroom')
            ->when($searchTerm, function ($query) use ($searchTerm) {
                $query->whereRaw(
                    'LOWER(name) LIKE ?',
                    [strtolower($searchTerm) . '%']
                );
            })
            ->get();

        $studentNames = Student::select('name')
            ->distinct()
            ->orderBy('name')
            ->pluck('name');

        $addStudent = "Add Student";

        return view('admin.student.index', compact(
            'title',
            'search',
            'searchTerm',
            'addStudent',
            'students',
            'classrooms',
            'studentNames'
        ));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nis' => 'required|string|max:20|unique:students,nis',
            'name' => 'required|string|max:255',
            'classroom_id' => 'required|exists:classrooms,id',
            'address' => 'nullable|string|max:255',
        ], [
            'nis.required' => 'NIS wajib diisi.',
            'nis.unique' => 'NIS sudah digunakan.',
            'name.required' => 'Nama siswa wajib diisi.',
            'classroom_id.required' => 'Kelas wajib dipilih.',
            'classroom_id.exists' => 'Kelas tidak ditemukan.',
        ]);

        Student::create($validated);

        return redirect()
            ->route('admin.student.index')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nis' => 'required|string|max:20',
            'name' => 'required|string|max:255',
            'classroom_id' => 'required|exists:classrooms,id',
            'address' => 'nullable|string|max:255',
        ]);

        $student = Student::findOrFail($id);

        $student->update($validated);

        return redirect()
            ->route('admin.student.index')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);

        $student->delete();

        return redirect()
            ->route('admin.student.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}
