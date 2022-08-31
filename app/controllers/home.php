<?php

namespace App\Controller;

use App\Core\Controller;

class Home extends Controller
{
    
    public function index()
    {
        if ($_SESSION['user_id'] == null)
        {
            header('location:/login/index');
            return;
        }
        $this->view('/home/index');
    }

    public function create_exam()
    {
        if ($_SESSION['user_id'] == null)
        {
            header('location:/login/index');
            return;
        }
        if(isset($_POST['action']))
        {
            $new_exam = $this->model('Exam');
            $new_exam->user_id = $_SESSION['user_id'];
            $new_exam->subject = $_POST['subject'];
            $new_exam->year_level = $_POST['year_level'];
            $new_exam->class_code = $_POST['class_code'];
            $new_exam->no_of_questions = $_POST['no_of_questions'];
            $new_exam->create_exam();
            header('location:/home/exam_list');
        }
        else{
            $this->view('/home/create_exam');
        }
    }

    public function exam_list()
    {
        if ($_SESSION['user_id'] == null)
        {
            header('location:/login/index');
            return;
        }
        $exam_list = $this->model('Exam')->find_exams();
        $this->view('home/exam_list', $exam_list);
    }

    public function mark_exam($exam_id)
    {
        if ($_SESSION['user_id'] == null)
        {
            header('location:/login/index');
            return;
        }
        $results = $this->model('Results')->mark_exam($exam_id);
        $exam = $this->model('Exam')->get_exam($exam_id);
        $this->view('/home/mark_exam', $results, $exam);
    }

    public function delete_exam($exam_id)
    {
        if ($_SESSION['user_id'] == null)
        {
            header('location:/login/index');
            return;
        }
        if(isset($_POST['action']))
        {
            $exam = $this->model('Exam')->delete_exam($exam_id);
            header('location:/home/exam_list');
        }
        else{
            $this->view('/home/delete_exam', $exam);
        }
    }

    public function student_list($exam_id)
    {
        if ($_SESSION['user_id'] == null)
        {
            header('location:/login/index');
            return;
        }
        $class_list = $this->model('Student')->find_students($exam_id);
        if(isset($_POST['action']))
        {
            $student = $this->model('Student');
            $student->first_name = $_POST['first_name'];
            $student->last_name = $_POST['last_name'];
            $student->add_student($exam_id);
            $class_list = $this->model('Student')->find_students($exam_id);
            $this->view('/home/student_list', $class_list, $exam_id);
        }
        else{
            $this->view('/home/student_list', $class_list, $exam_id);
        }
    }

    public function delete_student($student_id)
    {
        if ($_SESSION['user_id'] == null)
        {
            header('location:/login/index');
            return;
        }
        $student = $this->model('Student')->get_student($student_id);
        if(isset($_POST['action']))
        {
            $student->delete_student($student_id);
            header('location:/home/student_list/' . $student -> exam_id);
        }
        else{
            $this->view('/home/delete_student', $student);
        }
    }

    public function account()
    {
        $this->view('/home/account');
    }
}

