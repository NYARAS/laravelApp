<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\Academic;
use App\Program;
use App\Level;
use App\Shift;
use App\Time;
use App\Batch;
use App\Group;
use App\Course;
use Auth;

class CourseController extends Controller
{
   public function __construct()
   {
       $this->middleware('web');
   }

   public function getManageCourse()
   {
       $programs = Program::all();
       $shift = Shift::all();
    
       $time = Time::all();
       $batch = Batch::all();
       $group = Group::all();
       $level = Level::all();
       $academics = Academic::orderBy('academic_id','DESC')->get();
       return view('courses.manageCourse',compact('programs','academics','shift','time','batch','group','level' ));
   }

   //=================================================
   public function postInsertAcademic(Request $request)
   {
       if($request->ajax()){
           return response(Academic::create($request->all()));
       }
   }

   //==================================================

   public function postInsertProgram(Request $request)
   {
       if($request->ajax()){
           return response(Program::create($request->all()));
       }
   }

   //===================================================

   public function postInsertLevel(Request $request)
   {
       if($request->ajax()){
           return response(Level::create($request->all()));
       }
   }
   public function showLevel(Request $request)
   {
       if($request->ajax()){
           return response(Level::where('program_id',$request->program_id)->get());
       }
   }

   //=====================================================
   public function createShift(Request $request)
   {
       if($request->ajax()){
        return(Shift::create($request->all()));
       }
   }

   //====================================================
   public function createTime(Request $request)
   {
       if($request->ajax()){
        return(Time::create($request->all()));
       }
   }

   //=====================================================

   public function createBatch(Request $request)
   {
       if($request->ajax()){
        return(Batch::create($request->all()));
       }
   }

   //======================================================

   public function createGroup(Request $request)
   {
       if($request->ajax()){
        return(Group::create($request->all()));
       }
   }

   //======================================================
   public function createClass(Request $request)
   {
   
   
    {
        $this -> validate($request,[
        'time_id'=> 'required',
        'academic_id'=> 'required',
        'level_id'=> 'required',
        'shift_id'=> 'required',
        'group_id'=> 'required',
        'batch_id'=> 'required',
        'start_date'=> 'required',
        'end_date'=> 'required',
        
       
        
                ]);
                $courses= new Course;
                    $courses -> time_id = $request -> input('time_id');
                    $courses -> active = auth::user()-> active;
                    $courses -> academic_id = $request -> input('academic_id');
                    $courses -> level_id = $request -> input('level_id');
                    $courses -> shift_id = $request -> input('shift_id');
                    $courses -> group_id = $request -> input('group_id');
                    $courses -> batch_id = $request -> input('batch_id');
                    $courses -> start_date = $request -> input('start_date');
                    $courses -> end_date = $request -> input('end_date');
                        $courses ->save();
                        if(auth()->user()->id !==1){

                            return redirect('/dashboard')->with('error', 'Unauthorised page');
                           }
        return redirect('/') -> with('info', 'Information Saved successfully!');
                    
    }
 
   }
   //=================================================================
   public function showCourseInformation(Request $request)
   {
       if($request->academic_id!="" && $request->program_id=="")
       {
           $criterial = array('academics.academic_id' => $request->academic_id);

       }elseif($request->academic_id!="" && 
       $request->program_id!=""&&
        $request->level_id!="" &&
        $request->shift_id!="" &&
        $request->time_id!="" &&
        $request->batch_id!=""&&
        $request->group_id!="")
    {
        $criterial = array('academics.academic_id' => $request->academic_id,
                           'programs.program_id' => $request->program_id,
                           'levels.level_id' => $request->level_id,
                           'shifts.shift_id' => $request->shift_id,
                           'times.time_id' => $request->time_id,
                           'batches.batch_id' => $request->batch_id,
                           'groups.group_id' => $request->group_id);

    }
    
    $courses = $this->CourseInformation($criterial)->get();
    return view('class.classInfo',compact('courses'));
   
   }

   //====================================================================
   public function CourseInformation($criterial)
   {
       return Course::join('academics','academics.academic_id','=','courses.academic_id')
                          ->join('levels','levels.level_id','=','courses.level_id')
                          ->join('programs','programs.program_id','=','levels.program_id')
                          ->join('shifts','shifts.shift_id','=','courses.shift_id')
                          ->join('groups','groups.group_id','=','courses.group_id')
                          ->join('batches','batches.batch_id','=','courses.batch_id')
                          ->join('times','times.time_id','=','courses.time_id')
                          ->where($criterial)
                          ->orderBy('courses.class_id','DESC');
                         
                       

   }

   //============================================================
   public function deleteClass(Request $request)
   {
       if($request->ajax())
       {
           Course::destroy($request->class_id);
       }
   }

   //============================================================
   public function editClass(Request $request)
   {
       if($request->ajax())
       {
          return response(Course::find($request->class_id));
       }
   }
//=====================================================================
   public function updateClass(Request $request)
   {
       if($request->ajax())
       {
          return response(Course::updateOrCreate(['class_id'=>$request->class_id],$request->all()));
       }
   }
}
