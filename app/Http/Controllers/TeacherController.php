<?php

namespace App\Http\Controllers;

use App\CourseModel;
use App\QuestionModel;
use App\ReplyModel;
use App\StudentCourseModel;
use App\StudentModel;
use App\TeacherCourseModel;
use App\TeacherModel;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function login(Request $request)
    {
        try {
            session_start();
            $user = TeacherModel::where('name', $request->input('name'))->firstOrFail();
            if (md5($request->input('password')) != $user->password) throw new \Exception('error');
            $_SESSION['teacher_name'] = $user->name;
            $_SESSION['teacher_id']   = $user->id;
            return redirect('teacher/index');
        } catch (\Throwable $e) {
            return \Response::json(['msg' => '用户名或密码错误'], 500);
        }
    }

    public function logout()
    {
        unset($_SESSION['teacher_name']);
        unset($_SESSION['teacher_id']);
        return redirect('teacher/');
    }

    public function index()
    {
        return view('teacher/index', [
            'data' => TeacherCourseModel::where('teacher_id', $_SESSION['teacher_id'])->with('students')->get()
        ]);
    }

    public function pwd()
    {
        return view('teacher/password');
    }

    public function modifyPwd(Request $request)
    {
        $teacher = TeacherModel::where('id', $_SESSION['teacher_id'])->first();
        if ($teacher->password != md5($request->input('password'))) throw new \Exception('error');
        if ($request->input('pwd') != $request->input('pwd_repeat')) throw new \Exception('error');
        $teacher->password = md5($request->input('pwd'));
        $teacher->save();
        return redirect('teacher/index');
    }

    public function reply()
    {
        return view('teacher/reply', ['data' => QuestionModel::with('reply')->get()]);
    }

    public function createReply(Request $request)
    {
        $reply              = new ReplyModel();
        $reply->question_id = $request->input('question_id');
        $reply->reply       = $request->input('reply');
        $reply->teacher_id  = $_SESSION['teacher_id'];
        $reply->save();
        return redirect('teacher/reply');
    }

    public function score()
    {
        return view('teacher/score', ['data' => TeacherCourseModel::where('teacher_id', $_SESSION['teacher_id'])->get()]);
    }

    public function createScore(Request $request)
    {
        $data = StudentCourseModel::where('course_id', $request->input('course_id'))->where('student_id', $request->input('student_id'))->first();
        if (empty($data)) $data = new StudentCourseModel();
        $data->student_id = $request->input('student_id');
        $data->course_id  = $request->input('course_id');
        $data->score      = $request->input('score');
        $data->save();
        return redirect('teacher/index');
    }

    public function search(Request $request)
    {
        switch ($request->input('type')) {
            case 1:
                $courseId = CourseModel::where('name', 'like', '%' . $request->input('key') . '%')->get()->pluck('id')->toArray();
                $data     = TeacherCourseModel::where('teacher_id', $_SESSION['teacher_id'])->with(['students'])->whereIn('course_id', $courseId)->get();
                $students = array_column($data[0]->students->pluck('student')->toArray(), 'name');
                $x        = '"' . implode($students, '","') . '"';
                $y        = '"' . implode($data[0]->students->pluck('score')->toArray(), '","') . '"';
                break;
            case 3:
                $studentId = StudentModel::where('name', 'like', '%' . $request->input('key') . '%')->get()->pluck('id')->toArray();
                $data      = TeacherCourseModel::where('teacher_id', $_SESSION['teacher_id'])->with(['students' => function ($query) use ($studentId) {
                    return $query->whereIn('student_id', $studentId);
                }])->get();
                $x         = '"' . implode($data->pluck('course')->toArray(), '","') . '"';
                foreach ($data as $student) {
                    $student  = $student->students;
                    $scores[] = $student[0]->score;
                }
                $y = '"' . implode($scores, '","') . '"';
                break;
            case 2:
                $data = TeacherCourseModel::where('teacher_id', $_SESSION['teacher_id'])->with(['students' => function ($query) use ($request) {
                    return $query->where('student_id', $request->input('key'));
                }])->get();
                $x    = '"' . implode($data->pluck('course')->toArray(), '","') . '"';
                foreach ($data as $student) {
                    $student  = $student->students;
                    $scores[] = $student[0]->score;
                }
                $y = '"' . implode($scores, '","') . '"';
                break;
        }


        return view('teacher/index', ['data' => $data, 'x' => $x, 'y' => $y]);
    }

}
