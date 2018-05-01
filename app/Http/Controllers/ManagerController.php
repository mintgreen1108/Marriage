<?php

namespace App\Http\Controllers;


use App\ClassModel;
use App\CourseModel;
use App\ManagerModel;
use App\MessageModel;
use App\StudentCourseModel;
use App\StudentModel;
use App\TeacherCourseModel;
use App\TeacherModel;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function index()
    {
        return view('manager/index', ['data' => StudentModel::all(), 'classes' => ClassModel::all()]);
    }

    public function login(Request $request)
    {

    }

    public function logout()
    {
        unset($_SESSION['manager_name']);
        unset($_SESSION['manager_name']);
        return redirect('/');
    }

    public function createStudent(Request $request)
    {
        $student           = empty($request->input('id')) ? new StudentModel() : StudentModel::where('id', $request->input('id'))->first();
        $student->name     = $request->input('name');
        $student->password = md5('123456');
        $student->sex      = $request->input('sex');
        $student->age      = $request->input('age');
        $student->class_id = $request->input('class_id');
        $student->save();
        return redirect('manager/index');
    }

    public function deleteStudent($id)
    {
        StudentModel::where('id', $id)->delete();
        return redirect('manager/index');
    }

    public function teacher()
    {
        return view('manager/teacher', ['data' => TeacherModel::all()]);
    }

    public function createTeacher(Request $request)
    {
        $student           = empty($request->input('id')) ? new TeacherModel() : TeacherModel::where('id', $request->input('id'))->first();
        $student->name     = $request->input('name');
        $student->password = md5('123456');
        $student->sex      = $request->input('sex');
        $student->age      = $request->input('age');
        $student->mobile   = $request->input('mobile');
        $student->save();
        return redirect('manager/teacher');
    }

    public function deleteTeacher($id)
    {
        TeacherModel::where('id', $id)->delete();
        return redirect('manager/teacher');
    }

    public function course()
    {
        return view('manager/course', ['data' => CourseModel::all()]);
    }

    public function createCourse(Request $request)
    {
        $student       = empty($request->input('id')) ? new CourseModel() : CourseModel::where('id', $request->input('id'))->first();
        $student->name = $request->input('name');
        $student->save();
        return redirect('manager/course');
    }

    public function deleteCourse($id)
    {
        CourseModel::where('id', $id)->delete();
        StudentCourseModel::where('course_id', $id)->delete();
        TeacherCourseModel::where('course_id', $id)->delete();
        return redirect('manager/course');
    }

    public function class()
    {
        return view('manager/class', ['data' => ClassModel::all()]);
    }

    public function createClass(Request $request)
    {
        $student       = empty($request->input('id')) ? new ClassModel() : ClassModel::where('id', $request->input('id'))->first();
        $student->name = $request->input('name');
        $student->save();
        return redirect('manager/class');
    }

    public function deleteClass($id)
    {
        ClassModel::where('id', $id)->delete();
        return redirect('manager/class');
    }

    public function message()
    {
        return view('/manager/message', ['data' => MessageModel::all()]);
    }

    public function createMessage(Request $request)
    {
        $message             = new MessageModel();
        $message->body       = $request->input('body');
        $message->title      = $request->input('title');
        $message->manager_id = $_SESSION['manager_id'];
        $message->save();
        return redirect('manager/message');
    }
}
