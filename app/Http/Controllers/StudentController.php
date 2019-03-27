<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\URL;

use App\Academic;
use App\Program;
use App\Level;
use App\Shift;
use App\Time;
use App\Batch;
use App\Group;
use App\Course;
use App\Student;
use App\Status;
use App\FileUpload;
use File;
use Storage;
use Auth;
use DB;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }
public function getStudentRegister()

{
    $programs = Program::all();
    $shift = Shift::all();
 
    $time = Time::all();
    $batch = Batch::all();
    $group = Group::all();
    $level = Level::all();
    $academics = Academic::orderBy('academic_id','DESC')->get();
    $student_id = Student::max('student_id');
    return view('student.studentRegister',compact('programs','academics','shift','time','batch','group','level','student_id' ));
}

//===============================================
public function postStudentRegister(Request $request)
{
    $st = new Student;
    $st->first_name = $request->first_name;
    $st->second_name = $request->second_name;
    $st->last_name = $request->last_name;
    $st->email=$request->email;
    $st->dob = $request->dob;
    $st->sex = $request->sex;
    $st->status = $request->status;
    $st->nationality = $request->nationality;
    $st->passport = $request->passport;
    $st->phone = $request->phone;
    $st->village = $request->village;
    $st->commune = $request->commune;
    $st->district = $request->district;
    $st->province = $request->province;
    $st->current_address = $request->current_address;
    $st->date_registered = $request->date_registered;
    $st->photo = FileUpload::photo($request,'photo');
    $st->user_id=$request->user_id;

    if($st->save())
    {
        $student_id = $st->student_id;
        Status::insert(['student_id'=>$student_id,'class_id'=>$request->class_id]);
        return redirect()->route('goTopayment',['student_id'=>$student_id]);
    }
}

//==========================================show student infomation
public function studentInfo(Request $request)
{
    if($request ->has('search'))
    {
        $students = Student::where('student_id',$request->search)
                             ->Orwhere('first_name',"LIKE","%".$request->search."%")
                             ->Orwhere('second_name',"LIKE","%".$request->search."%")
                             ->select(DB::raw('student_id,
                                              first_name,
                                              second_name,
                                              CONCAT(first_name," ",second_name) AS full_name,
                                              (CASE WHEN sex=0 THEN "M" ELSE "F" END) AS sex,
                                              dob'))
                                              ->paginate(2)
                                              ->appends('search',$request->search);
    }
    else
    {
        $students = Student::select(DB::raw('student_id,
                                              first_name,
                                              second_name,
                                              CONCAT(first_name," ",second_name) AS full_name,
                                              (CASE WHEN sex=0 THEN "M" ELSE "F" END) AS sex,
                                              dob'))

                                              ->paginate(2);

    }

    return view('student.studentList',compact('students'));
    

}
}
