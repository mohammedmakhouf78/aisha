<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\StudentDeleteRequest;
use App\Http\Requests\Student\StudentStoreRequest;
use App\Http\Requests\Student\StudentUpdateRequest;
use App\Models\Group;
use App\Models\Student;
use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;

class StudentController extends Controller
{



    public function index()
    {
        $students  = Student::get();

        return view('admin.pages.student.index', [
            'students' => $students,
        ]);
    }

    public function create()
    {
        $groups = Group::get();

        return view('admin.pages.student.create', [
            'groups' => $groups
        ]);
    }

    public function store(StudentStoreRequest $request)
    {
    
        Student::create([
            'name' => $request->name,
            'brithday' => $request->brithday,
            'phone' => $request->phone,
            'type' => $request->type,
            'group_id' => $request->group_id,
            'note' => $request->note,
        ]);
        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect(route('admin.student.index'));
    }

    public function edit($id)
    {
        $groups = Group::get();
        $student = Student::find($id);
        return view('admin.pages.student.edit', [
            'groups' => $groups,
            'student' => $student
        ]);
    }

    public function update(StudentUpdateRequest $request)
    {


        $student = Student::find($request->student_id);

        $student->update([
            'name' => $request->name,
            'brithday' => $request->brithday,
            'phone' => $request->phone,
            'type' => $request->type,
            'group_id' => $request->group_id,
            'note' => $request->note,
        ]);

        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect(route('admin.student.index'));
    }

    public function delete(StudentDeleteRequest $request)
    {
       
        $student = Student::find($request->id);
        $student->delete();
        dd("
        
        SQLSTATE[23000]: Integrity constraint violation: 1451 Cannot delete or update a parent row: a foreign key constraint fails (`aisha`.`exam_students`, CONSTRAINT `exam_students_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES
        
        ");

        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect()->back();
    }
}
