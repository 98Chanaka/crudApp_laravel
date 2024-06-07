<?php

namespace App\Http\Controllers;


use App\Models\Student;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $students =Student::all();  //display to database details.
        return view('students.index',compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'first_name' => 'required|string',
            'address' => 'required|string'
        ];

        $messages = [
            'first_name.required' => 'You need to provide the first name.',
            'address.required' => 'You need to provide the address.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $student = new Student();
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->contact_no = $request->contact_no;
        $student->address = $request->address;
        $student->dob = $request->dob;
        $student->save();

        // Alternatively, you can use mass assignment if the $fillable property is set on the Student model:
        // $student = Student::create($request->all());

        return "success";
    }
    public function edit($id){
       $student = Student :: where('id',$id) -> first();
        return view('Students.edit', compact('student'));
    }

    public function update(Request $request,$student_id)
    {

        $rules = [
            'first_name' => 'required|string',
            'address' => 'required|string'
        ];

        $messages = [
            'first_name.required' => 'You need to provide the first name.',
            'address.required' => 'You need to provide the address.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $student = Student::where('id',$student_id)->first();
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->contact_no = $request->contact_no;
        $student->address = $request->address;
        $student->dob = $request->dob;

        $student->save();
        return redirect()->route('Student.index');
    }
    public function delete($student_id)
    {
        student::where('id', $student_id) ->delete();
        return redirect()->route('Student.index');
    }
}
