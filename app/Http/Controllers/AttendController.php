<?php

namespace App\Http\Controllers;

use App\Http\Requests\Attend\AttendDeleteRequest;
use App\Http\Requests\Attend\AttendStoreRequest;
use App\Http\Requests\Attend\AttendUpdateRequest;
use App\Models\Attend;
use App\Models\Lesson;
use App\Models\Student;
use RealRashid\SweetAlert\Facades\Alert;

class AttendController extends Controller
{

    public function index()
    {

        $attends = Attend::orderBy('id', 'DESC')->get();

        return view('admin.pages.attende.index', [
            'attends' => $attends
        ]);
    }

    public function create()
    {
        $students  = Student::get();
        $lessons = Lesson::get();

        return view('admin.pages.attende.create', [
            'students' => $students,
            'lessons' => $lessons

        ]);
    }

    public function store(AttendStoreRequest $request)
    {


        Attend::create([
            'student_id' => $request->student_id,
            'lesson_id' =>  $request->lesson_id,
            'date' =>  $request->date,
            'attend' =>  $request->attend == 1 ? "1" : "0",
            'note' =>  $request->note,
        ]);
        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect()->back();
    }

    public function edit(Attend $attend)
    {

        $students  = Student::get();
        $lessons = Lesson::get();



        return view('admin.pages.attende.edit', [
            'students' => $students,
            'lessons' => $lessons,
            'attend' => $attend

        ]);
    }

    public function update(AttendUpdateRequest $request, Attend $attend)
    {


        $attend->update([
            'student_id' => $request->student_id,
            'lesson_id' =>  $request->lesson_id,
            'date' =>  $request->date,
            'attend' =>  $request->attend == 1 ? "1" : "0",
            'note' =>  $request->note,
        ]);
        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect(route('admin.attend.index'));
    }

    public function delete(AttendDeleteRequest $request, Attend $attend)
    {


        $attend->delete();
        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect()->back();
    }
}
