<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Academic;
use App\Program;
use App\Level;
use App\Shift;
use App\Time;
use App\Batch;
use App\Group;
use App\Course;
use App\Student;
use App\user;
use App\Status;
use DB;
use Auth;
use Charts;

class ReportConroller extends Controller

{

    public function getStudentList()

    {
        $programs = Program::all();
        $shift = Shift::all();

        $time = Time::all();
        $batch = Batch::all();
        $group = Group::all();
        $level = Level::all();
        $academics = Academic::orderBy('academic_id','DESC')->get();


        return view('report.studentList',compact('programs','academics','shift','time','batch','group'));
    }

    public function showStudentInfo(Request $re)

    {
        $courses = $this->info()->select(DB::raw('students.student_id,
                         CONCAT(students.first_name, " ",students.second_name)as name,
                         (CASE WHEN students.sex = 0 THEN "Male" ELSE "Female" END) as sex,
                         students.dob,
                         CONCAT(programs.program, " / " , levels.level, " / ",
                         shifts.shift, " / ",times.time," Start-( ", courses.start_date," /  ",
                         courses.end_date,")"

                         ) as program


                                            '))
        ->where('courses.class_id',$re->$class_id)
        ->get();

        return view('report.studentInfo',compact('courses'));



    }

    public function info()
    {
      return  Status::join('courses','courses.class_id','=','statuses.class_id')
                ->join('students','students.student_id','=','statuses.student_id')
                ->join('levels','levels.level_id','=','courses.level_id')
                ->join('programs','programs.program_id','=','levels.program_id')
                ->join('academics','academics.academic_id','=','courses.academic_id')
                ->join('shifts','shifts.shift_id','=','courses.shift_id')
                ->join('times','times.time_id','=','courses.time_id')
                ->join('groups','groups.group_id','=','courses.group_id')
                ->join('batches','batches.batch_id','=','courses.batch_id');


    }

    public function getStudentListMultiClass()
    {
        $programs = Program::all();
        $shift = Shift::all();

        $time = Time::all();
        $batch = Batch::all();
        $group = Group::all();
        $level = Level::all();
        $academics = Academic::orderBy('academic_id','DESC')->get();

        return view('report.studentListMultiClass',compact('programs','academics','shift','time','batch','group'));
    }

    public function showStudentInfoMultiClass(Request $request)
    {
        if($request->ajax()){

            if(!empty($request['chk'])){

            $courses = $this->info()->select(DB::raw('students.student_id,
                         CONCAT(students.first_name, " ",students.second_name)as name,
                         (CASE WHEN students.sex = 0 THEN "Male" ELSE "Female" END) as sex,
                         students.dob,
                         programs.program,
                         levels.level,
                         shifts.shift,
                         times.time,
                         batches.batch,
                         groups.group
                       '))

        ->whereIn('courses.class_id',$request['chk'])
        ->get();


          return view('report.studentInfoMultiClass',compact('courses'));
            }
        }
    }

    public function getRegisteredUser()

  {

    $user_id = Auth::user()->id;

    $users = Student::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))

           ->get();

       $chart = Charts::database($users, 'bar', 'highcharts')

           ->title("Monthly new Register Student")

           ->elementLabel("Total Student")

           ->dimensions(1000, 500)

           ->responsive(false)

           ->groupByMonth(date('Y'), true);

       return view('report.newRegisteredUser',compact('chart'));
  }
}
