<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSemesterRequest;
use App\Http\Resources\SemesterResource;
use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        $query = Semester::query();

        if($request->name){
            $query->where('name','like','%'.$request->name.'%');
        }
        
        if($request->year){
            $query->where('year','like','%'.$request->year.'%');
        }

        $semester = $query->paginate(10);

        return SemesterResource::collection($semester);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSemesterRequest $request)
    {
        $semester = Semester::create($request->validated());

        return new SemesterResource($semester);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $semester = Semester::findOrFail($id);

        return new SemesterResource($semester);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $semester = Semester::findOrFail($id);

        $semester->update([
            'name'=>$request->name,
            'year'=>$request->year
        ]);

        return new SemesterResource($semester);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $semester = Semester::findOrFail($id);

        return response()->json([
            'message'=>'Semester deleted',
        ]);
    }
}
