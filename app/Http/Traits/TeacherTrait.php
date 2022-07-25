<?php


namespace App\Http\Traits;

use App\Models\Teacher;

trait TeacherTrait
{
    private function getTeachers()
    {
        return Teacher::get();
    }
}
