<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ScoresResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'student_id'=>$this->student->name,
            'subject_id'=>$this->subject->name,
            'semester_id'=>$this->semester->name,
            'score'=>$this->score,
        ];
    }
}
