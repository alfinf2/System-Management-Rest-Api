<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClassesRequest;
use App\Http\Resources\ClassesResource;
use App\Models\ClassRoom;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = ClassRoom::query();

        if($request->search){
            $query->where('grade','like','%'.$request->search.'%');
        }

        $classes = $query->paginate(10);

        return ClassesResource::collection($classes);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClassesRequest $request)
    {
        $classes = ClassRoom::create($request->validated());

        return new ClassesResource($classes);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $class = ClassRoom::findOrFail($id);

        return new ClassesResource($class);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $classes = ClassRoom::findOrFail($id);

        $classes->update([
            'name'=>$request->name,
            'grade'=>$request->grade,
        ]);

        return new ClassesResource($classes);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $class = ClassRoom::findOrFail($id);

        $class->delete();

        return response()->json([
            'message'=>'Subject deleted'
        ]);
    }
}
