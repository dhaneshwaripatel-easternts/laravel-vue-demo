<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Mark;
use App\Models\Student;
use App\Http\Resources\MarkResource;
use App\Http\Resources\DataTrueResource;
use App\Http\Requests\MarkRequest;


class MarkAPIController extends Controller
{
    public function index()
    {
        $marks = Mark::all();
        return MarkResource::collection($marks);

    }


    public function store(MarkRequest $request)
    {

        $marks = Mark::create($request->all());
        return \App\Models\Mark::GetMessage(new MarkResource($marks), config('constants.messages.create_success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Mark $marks)
    {

        //dd($marks->student_id); 
        // try {
        //     $marks = Mark::findOrFail($id);
        //     return new MarkResource($marks);
        // } catch (\Exception $e) {
        //     // Log or handle the database error
        //     return response()->json(['error' => 'Database error'], 500);
        // }


        return new MarkResource($marks->load([]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MarkRequest $request, Mark $marks)
    {
        $data = $request->all();
        $marks->update($data);

        return \App\Models\Mark::GetMessage(new MarkResource($marks), config('constants.messages.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mark $marks)
    {
            $marks->delete();
            return new DataTrueResource($marks, config('constants.messages.delete_success'));
    }

}
