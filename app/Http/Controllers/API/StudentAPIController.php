<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Http\Resources\StudentResource;
use App\Http\Resources\DataTrueResource;

use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;



class StudentAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return StudentResource::collection($students);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request)
    {
        // $student = new Student;
        // $student->name = $request->input('name');
        // $student->email = $request->input('email');
        // $student->password = bcrypt($request->input('password'));

        $student = Student::create($request->all());
        //$student->save();

        return \App\Models\Student::GetMessage(new StudentResource($student), config('constants.messages.create_success'));
        //return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $student = Student::findOrFail($id);
            return new StudentResource($student);
        } catch (\Exception $e) {
            // Log or handle the database error
            return response()->json(['error' => 'Database error'], 500);
        }

        // eager loading
        //return new StudentResource($student-> load([]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::find($id);

        if (!$student) {
            abort(404);
        }

        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::find($id);

        if (!$student) {
            abort(404);
        }

        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->save();

        return \App\Models\Student::GetMessage(new StudentResource($student), config('constants.messages.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $student = Student::findOrFail($id);

        try {
            $student->delete();
            return new DataTrueResource($student, config('constants.messages.delete_success'));
        } catch (\Exception $e) {
            // Log or handle the database error
            return response()->json(['error' => 'Database error'], 500);
        }
    }
}
