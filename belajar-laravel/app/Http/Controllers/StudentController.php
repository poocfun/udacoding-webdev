<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentCreateRequest;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $student = Student::with('class')
                            ->where('name', 'LIKE', '%'.$keyword.'%')
                            ->orWhere('gender', $keyword)
                            ->orWhere('nis', 'LIKE', '%'.$keyword.'%')
                            ->orWhereHas('class', function($query) use($keyword) {
                                $query->where('name', 'LIKE', '%'.$keyword.'%');
                            })
                            ->paginate(15);
        return view('student', ['studentList' => $student]);
    }

    public function show($id)
    {
        $student = Student::with(['class.homeroomTeacher', 'extracurriculars'])
        ->findOrFail($id);
        return view('student-detail', ['student' => $student]);
    }

    public function create()
    {
        $class = ClassRoom::select('id', 'name')->get();
        return view('student-add', ['class' => $class]);
    }

    public function store(StudentCreateRequest $request)
    {
        $newName = '';

        if($request->file('photo')){
            $extension = $request->file('photo')->getClientOriginalExtension();
            $newName = $request->name.'_'.now()->timestamp.'.'.$extension;
            $request->file('photo')->storeAs('photo', $newName);
        }

        $request['image'] = $newName;
        $student=Student::create($request->all());

            if($student) {
                Session::flash('status', 'success');
                Session::flash('message', 'add new student success!');
            }


        return redirect('/students');
    }

    public function edit(Request $request, $id)
    {
        $student = Student::with('class')->findOrFail($id);
        $class = ClassRoom::where('id', '!=', $student->class_id)->get(['id', 'name']);
        return view('student-edit', ['student' => $student, 'class' => $class]);
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $student->update($request->all());
        return redirect('/students');
    }

    public function delete($id)
    {
        $student = Student::findOrFail($id);
        return view('student-delete', ['student' => $student]);
    }

    public function destroy($id)
    {
        $deleteStudent = Student::findOrFail($id);
        $deleteStudent->delete();

        if($deleteStudent) {
            Session::flash('status', 'success');
            Session::flash('message', 'delete student success!');
        }

        return redirect('/students');
    }

    public function deletedStudent()
    {
        $deleteStudent = Student::onlyTrashed()->get();
        return view('student-deleted-list', ['student' => $deleteStudent]);
    }

    public function restore($id)
    {
        $deleteStudent = Student::withTrashed()->where('id', $id)->restore();

        if($deleteStudent) {
            Session::flash('status', 'success');
            Session::flash('message', 'restore student success!');
        }

        return redirect('/students');
    }
}
