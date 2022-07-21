<?php

namespace App\Http\Controllers;

use App\Http\Requests\Exam\ExamDeleteRequest;
use App\Http\Requests\Exam\ExamStoreRequest;
use App\Http\Requests\Exam\ExamUpdateRequest;
use App\Models\Exam;
use App\Models\Teacher;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ExamController extends Controller
{
    public function index()
    {
        $exams = Exam::get();
        return view('admin.pages.exam.index', [
            'exams' => $exams
        ]);
    }

    public function create()
    {
        $teachers = Teacher::get();
        return view('admin.pages.exam.create', [
            'teachers' => $teachers
        ]);
    }

    public function store(ExamStoreRequest $request)
    {

        Exam::create([
            'teacher' => $request->teacher_name,
            'title' => $request->title,
            'max_mark' => $request->max_mark,
            'min_mark' => $request->min_mark,
            'note' => $request->note,
        ]);
        Alert::success('نجاح', 'تمت العملية بنجاح');

        return redirect(route('admin.exam.index'));
    }

    public function edit($id)
    {
        $exam = Exam::find($id);
        $teachers = Teacher::get();
        return view('admin.pages.exam.edit', [
            'teachers' => $teachers,
            'exam' => $exam
        ]);
    }

    public function update(ExamUpdateRequest $request)
    {
    
        $exam = Exam::find($request->exam_id);
        $exam->update([
            'teacher' => $request->teacher_name,
            'title' => $request->title,
            'max_mark' => $request->max_mark,
            'min_mark' => $request->min_mark,
            'note' => $request->note,
        ]);
        Alert::success('نجاح', 'تمت العملية بنجاح');

        return redirect(route('admin.exam.index'));
    }

    public function delete(ExamDeleteRequest $request)
    {

        $exam = Exam::find($request->id);

        $exam->delete();
        Alert::success('نجاح', 'تمت العملية بنجاح');

        return redirect()->back();
    }
}
