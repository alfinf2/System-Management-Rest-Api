<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Student::query();

        if($request->class_id){
            $query->where('class_id',$request->class_id);
        }

        if($request->search){
            $query->where('name','like','%'.$request->search.'%');
        }

        $students = $query->with('class')->paginate(10);

        return StudentResource::collection($students);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $student = Student::create($request->validated());

        return new StudentResource($student);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::with(['class','scores'])->findOrFail($id);

        return new StudentResource($student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::findOrFail($id);

        $student->update([
            'name'=>$request->name,
            'nisn'=>$request->nisn,
            'class_id'=>$request->class_id
        ]);

        return new StudentResource($student);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);

        $student->delete;

        return response()->json([
            'message'=>'Subject deleted'
        ]);
    }
}
