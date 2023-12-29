<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;



class StudentAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        dd(123);
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student = new Student;
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->password = bcrypt($request->input('password'));
        $student->save();

        return redirect()->route('students.index');
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
        // Assuming you have a Student model
        $student = Student::find($id);

        // Check if the student was not found
        if (!$student) {
            abort(404); // or handle it in your own way, e.g., redirect
        }

        return view('students.edit', compact('student'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Assuming you have a Student model
        $student = Student::find($id);

        // Check if the student was not found
        if (!$student) {
            abort(404); // or handle it in your own way, e.g., redirect
        }

        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->save();

        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Assuming you have a Student model
        $student = Student::find($id);

        // Check if the student was not found
        if (!$student) {
            abort(404); // or handle it in your own way, e.g., redirect
        }
        
        $student->delete();

        return redirect()->route('students.index');
    }
}
