<?php

namespace App\Http\Controllers;

use App\Http\Requests\Teacher\TeacherDeleteRequest;
use App\Http\Requests\Teacher\TeacherStoreRequest;
use App\Http\Requests\Teacher\TeacherUpdateRequest;
use App\Models\Teacher;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::get();
       
        return view('admin.pages.teacher.index',[
            'teachers' => $teachers,
        ]);
    }

    public function create()
    {
        return view('admin.pages.teacher.create');
    }

    public function store(TeacherStoreRequest $request)
    {
        Teacher::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'birthday' => $request->birthday,
            'note' => $request->note,
        ]);
        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect(route('admin.teacher.index'));
    }

    public function edit($id)
    {
        $teachers = Teacher::find($id);
        return view('admin.pages.teacher.edit',[
            'teacher'  => $teachers,
        ]);
    }

    public function update(TeacherUpdateRequest $request)
    {

        $teacher = Teacher::find($request->teacher_id);
        $teacher->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'birthday' => $request->birthday,
            'note' => $request->note,
        ]);

        
        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect(route('admin.teacher.index'));


    }

    public function delete(TeacherDeleteRequest $request)
    {
        $teacher = Teacher::find($request->id);
        $teacher->delete();
        
        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect()->back();
      
    }
}
