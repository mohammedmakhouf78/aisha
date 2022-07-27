<?php

namespace App\Http\Controllers;

use App\Http\Requests\Exam\ExamDeleteRequest;
use App\Http\Requests\Exam\ExamStoreRequest;
use App\Http\Requests\Exam\ExamUpdateRequest;
use App\Http\Traits\ExamTrait;
use App\Http\Traits\TeacherTrait;
use App\Models\Exam;
use App\Models\Teacher;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ExamController extends Controller
{
    use ExamTrait;
    use TeacherTrait;



    public function index()
    {
        $teachers = $this->getTeachers();
        $exams = $this->getExamsDesc();
        return view('admin.pages.exam.index', [
            'exams' => $exams,
            'teachers' => $teachers
        ]);
    }

    public function create()
    {
        $teachers = $this->getTeachers();
        return view('admin.pages.exam.create', [
            'teachers' => $teachers
        ]);
    }

    public function store(ExamStoreRequest $request)
    {

        Exam::create([
            'teacher_id' => $request->teacher_id,
            'title' => $request->title,
            'max_mark' => $request->max_mark,
            'min_mark' => $request->min_mark,
            'note' => $request->note,
        ]);
        Alert::success('نجاح', 'تمت العملية بنجاح');

        return redirect(route('admin.exam.index'));
    }

    public function edit(Exam $exam)
    {

        $teachers = $this->getTeachers();
        return view('admin.pages.exam.edit', [
            'teachers' => $teachers,
            'exam' => $exam
        ]);
    }

    public function update(ExamUpdateRequest $request, Exam $exam)
    {

        $exam->update([
            'teacher_id' => $request->teacher_id,
            'title' => $request->title,
            'max_mark' => $request->max_mark,
            'min_mark' => $request->min_mark,
            'note' => $request->note,
        ]);
        Alert::success('نجاح', 'تمت العملية بنجاح');

        return redirect(route('admin.exam.index'));
    }

    public function delete(ExamDeleteRequest $request, Exam $exam)
    {



        $exam->delete();
        Alert::success('نجاح', 'تمت العملية بنجاح');

        return redirect()->back();
    }
}
