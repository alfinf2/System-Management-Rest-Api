<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreScoresRequest;
use App\Http\Resources\ScoresResource;
use App\Models\Score;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Score::query();

        if($request->student_id){
            $query->where('student_id', $request->student_id);
        }

        if($request->subject_id){
            $query->where('subject_id',$request->subject_id);
        }

        if($request->semester_id){
            $query->where('semeser_id', $request->semester_id);
        }

        $score = $query->with(['student','subject','semester'])->paginate(10);

        return ScoresResource::collection($score);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreScoresRequest $request)
    {
        $score = Score::create($request->validated());

        return new ScoresResource($score);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $score = Score::findOrFail($id);
        return new ScoresResource($score);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $score = Score::findOrFail($id);

        $score->update([
            'student_id'=>$request->student_id,
            'subject_id'=>$request->subject_id,
            'semester_id'=>$request->semester_id,
            'score'=>$request->score
        ]);

        return new ScoresResource($score);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $score = Score::findOrFail($id);

        $score->delete;

        return response()->json([
            'message'=>'Subject deleted'
        ]);
    }
}
