<?php

namespace App\Http\Controllers;

use App\Http\Requests\Group\GroupDeleteRequest;
use App\Http\Requests\Group\GroupStoreRequest;
use App\Http\Requests\Group\GroupUpdateRequest;
use App\Models\Group;
use App\Models\Teacher;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

use function Ramsey\Uuid\v1;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::orderBy('id', 'DESC')->get();

        return view('admin.pages.group.index', [
            'groups' => $groups
        ]);
    }

    public function create()
    {
        $teachers = Teacher::get();
        return view('admin.pages.group.create', [
            'teachers' => $teachers
        ]);
    }

    public function store(GroupStoreRequest $request)
    {
        Group::create([
            'teacher_id' => $request->teacher_id,
            'name' => $request->name,
            'type' => $request->type,
            'note' => $request->note,
        ]);

        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect(route('admin.group.index'));
    }

    public function edit(Group $group)
    {
        $teachers = Teacher::get();

        return view('admin.pages.group.edit', [
            'teachers' => $teachers,
            'group' => $group
        ]);
    }

    public function update(GroupUpdateRequest $request, Group $group)
    {

        $group->update([
            'teacher_id' => $request->teacher_id,
            'name' => $request->name,
            'type' => $request->type,
            'note' => $request->note,
        ]);

        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect(route('admin.group.index'));
    }

    public function delete(GroupDeleteRequest $request, Group $group)
    {

        $group->delete();

        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect(route('admin.group.index'));
    }
}
