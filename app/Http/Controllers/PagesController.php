<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Teacher;
use App\Student;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Comment;
use App\Schedule;
use Cookie;
use DateTime;
use App\Lecture;
use Carbon\Carbon;
use App\Worksheet;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

class PagesController extends Controller
{
    public function home (){
        return view('pages/home');
    }
    public function about(){
        $teachers = DB::select('select * from `teachers`');
        return view('pages.about')-> with('teachers',$teachers);
    }
    public function addcomment() {
        $students = DB::select('select * from `students`');
        return view('pages/comment')-> with('students',$students);
    }
    public function storecomment(Request $request) {
        $teacher = Teacher::where('name',$request['teacher_name'])->first();
        $tid = $teacher['id'];
        $student = Student::where('name',$request['student_name'])->first();
        $id = $student['id'];
        $admin = Comment::create([
            'teacher_id' => $tid,
            'student_id' => $id,
            'comment' => $request['comment'],
        ]);
        return redirect('\teacher');
    }
    // $admin = Admin::create([
    //     'name' => $request['name'],
    //     'email' => $request['email'],
    //     'password' => Hash::make($request['password']),
    // ]);
    public function viewSchedule() {
        $teachers = DB::select('select * from `teachers`');
        return view('pages/adminschedule')->with('teachers',$teachers);
    }
    public function createSchedule(Request $request) {
        $day = new DateTime($request['date']);
        $aday = $day->format('l');
            $schedule = Schedule::create([
            'date' => $request['date'],
            'time_in' => $request['time_in'],
            'time_out' => $request['time_out'],
            'day' => $aday,
            'standard' => $request['standard'],
        ]);
        echo $request['teacher_1'];
        $id = $schedule->id;
        $i = $request['no_lecs'];
        for ($x = 1; $x <= $i; $x++) {
            $tname = Teacher::where('name',$request['teacher_'.$x])->first();
            echo $tname['id'];
            $lecture = Lecture::create([
                'schedule' => $id,
                'time_in' => $request['time_in_'.$x],
                'time_out' => $request['time_out_'.$x],
                'teacher_id' => $tname['id'],
            ]);
        }
        return redirect('/admin')->with('success','SuccessFully Created');
    }
    public function studentschedule() {
        $user = Auth::user();
        $std = $user->standard;
        $schedules = Schedule::where('standard',$std)->orderBy('date','DESC')->get();
        $lectures = Lecture::all();
        $teachers = Teacher::all();
        $flag = 0;
        $total = DB::select('select * from `schedules` inner join `lectures` on `lectures`.`schedule` = `schedules`.`id` inner join `teachers` on `lectures`.`teacher_id` = `teachers`.`id` where `standard` = '.$std.' order by `date` desc');
        $date = Carbon::now()->format('Y-m-d');
        if($schedules[0]->date == $date)
        {
            $flag = 1;
        }
        return view('pages/studentschedule',['total' => $total,'flag' => $flag,'schedules' => $schedules,'lectures' => $lectures,'teachers' => $teachers, 'date' => $date]);
    }
    public function teacherschedule() {
        $user = Auth::user();
        $id = $user->id;
        $mainsalary = $user->salary;
        $lectures = Lecture::where('teacher_id',$id)->get();
        $schedules = Schedule::orderBy('date','DESC')->get();
        $date = Carbon::now()->format('Y-m-d');
        $total = DB::select('select * from `lectures` inner join `schedules` on `lectures`.`schedule` = `schedules`.`id` where `teacher_id` = '.$id);
        return view('pages/teacherschedule',['total' => $total,'mainsalary' => $mainsalary,'today' => $date,'lectures' => $lectures,'schedules' => $schedules]);
    }

    public function viewcomments() {
        $user = Auth::user();
        $id = $user->id;
        $comments = DB::select('select * from `comments` where `student_id` = '.$id);
        for($x = 0;$x < count($comments);$x++)
        {
            $teacher_id = DB::select('select * from `teachers` where `id` = '.$comments[$x]->teacher_id);
            $comments[$x]->teacher_name = $teacher_id[0]->name;
        }
        //echo $comments;
        return view('pages/viewcomment',['comments' => $comments]);
    }


    public function viewmakeworksheet() {
        return view('pages/makeworksheet');
    }
    public function makeworksheet (Request $request) {
        if($request->hasFile('file')){
            // Get filename with the extension
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('file')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('file')->storeAs('public/files', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $teacher = Teacher::where('name',$request['teacher_name'])->get();
        echo $teacher;
        $tid = $teacher[0]->id;
        $worksheet = Worksheet::create([
            'teacher_id' => $tid,
            'description' => $request['description'],
            'standard' => $request['standard'],
            'file' => $fileNameToStore,
        ]);
        return redirect('/teacher');
    }
    public function viewworksheet() {
        $user = Auth::user();
        $standard = $user->standard;
        $worksheets = DB::select('select * from `worksheets` where `standard` = '.$standard);
        // $uni_key = DB::select('SELECT left (file, count(file) -3) FROM worksheets');
        // echo $uni_key;
        for($x = 0;$x < count($worksheets);$x++)
        {
            $name = DB::select('select * from `teachers` where `id` = '.$worksheets[$x]->teacher_id.' limit 1');
            $worksheets[$x]->teacher = $name[0]->name;
            //echo $worksheets[$x]->teacher;
        }
        return view('pages/viewworksheet',['worksheets' => $worksheets]);
    }
    public function viewmail() {
        $students = DB::select('select * from `students`');
        //echo $students;
        return view('emails/viewmail',['students' => $students]);
    }
    public function mail(Request $request)
    {
        $studentsinfo = $request['studentsinfo'];
        $students = explode(",",$studentsinfo);
        if(isset($students)) {
        foreach($students as $student) {
                $std = DB::select('select * from `students` where `name`=\''.$student.'\'');
                $email = $std[0]->parent_email;
                Mail::to($email)->send(new SendMailable($std,$request['send_info']));

        }
    }

        return redirect('/admin');
    }
}
