<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function add()
    {
        return view('add');
    }
    public function storedata(Request $request)
    {
        $name = $request->fullname;

        $student = new Student();
        $student->fullname = $name;
        $image = $request->file('attachment');
        if ($image) {
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('users'), $imageName);
            $student->attachment = $imageName;
        }
        $student->save();

        return back()->with('student_added', "Student's record has been added successfully");
    }
    public function show()
    {
        $students = Student::latest()->get();
        return view('show', compact('students'));
    }
    public function edit($id)
    {
        $student = Student::where('id', $id)->first();
        // dd($student);

        return view('edit', compact('student'));
    }
    public function edit_submit(Request $request)
    {
        $student = Student::find($request->student_id);
        $student->fullname = $request->fullname;
        $image = $request->file('attachment');
        if ($image) {
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('users'), $imageName);
            $student->attachment = $imageName;
        }
        $student->save();
        return redirect()->route('student.show')->with('student_added', "Student's record has been added successfully");
    }
    public function delete($id){
        $student= Student::find($id);
        // dd($student);
        unlink(public_path('users').'/'.$student->attachment);
        $student->delete();
        return back()->with('student_deleted',"Student information has been deleted successfully");
    }
}
