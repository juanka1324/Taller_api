<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Resources\StudentResource;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return StudentResource::collection(Student::paginate());

        //return Student::paginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $student = Student::create($request->validated());
        return response()->json($student, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return $student;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string',
            'age' => 'required|integer',
            'address' => 'required|string',
            'email' => 'required|email|unique:students,email,',
            'city' => 'required|string',
            'birthdate' => 'required|date',
            'status' => 'required|boolean'
            . $student->id,
        ]);

        $student->update($request->all());

        return response()->json($student, 201);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return response()->json(null, 204);
    }
}
