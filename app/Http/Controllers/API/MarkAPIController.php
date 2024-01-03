<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Mark;
use App\Models\Student;


class MarkAPIController extends Controller
{
    public function index()
    {
        // Fetch all marks with associated students
        $marks = Mark::with('student')->get();

        return view('marks.index', compact('marks'));
    }

    public function create()
    {
        $students = Student::all();
        return view('marks.create', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'subject_id' => 'required',
            'marks_obtained' => 'required|numeric',
        ]);

        Mark::create($request->all());

        return redirect()->route('marks.index')->with('success', 'Mark added successfully');
    }
}
