<?php


namespace App\Http\Traits;

use App\Models\Exam;

trait ExamTrait
{
    private function getExamDesc()
    {
        return Exam::orderBy('id', 'DESC')->get();
    }
}
