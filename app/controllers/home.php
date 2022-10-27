<?php

namespace App\Controller;

use App\Core\Controller;

class Home extends Controller
{
    
    public function index()
    {
        if ($_COOKIE['user_id'] == null)
        {
            header('location:/login/index');
            return;
        }
        $this->view('/home/index');
    }

    public function create_exam()
    {
        if ($_COOKIE['user_id'] == null)
        {
            header('location:/login/index');
            return;
        }
        if(isset($_POST['action']))
        {
            $new_exam = $this->model('Exam');
            $new_exam->user_id = $_COOKIE['user_id'];
            $new_exam->subject = $_POST['subject'];
            $new_exam->year_level = $_POST['year_level'];
            $new_exam->class_code = $_POST['class_code'];
            $new_exam->no_of_questions = $_POST['no_of_questions'];
            $new_exam->create_exam();
            $get_exam_id = $this->model('Exam');
            $exam_id = $get_exam_id->get_exam_id($new_exam->class_code);
            for ($i = 1; $i <= $new_exam->no_of_questions; $i++)
            {
                $new_exam->initial_config($i, $exam_id[0]->exam_id);
            }
            header('location:/home/exam_list');
        }
        else{
            $this->view('/home/create_exam');
        }
    }

    public function exam_list()
    {
        if ($_COOKIE['user_id'] == null)
        {
            header('location:/login/index');
            return;
        }
        $exam_list = $this->model('Exam')->find_exams();
        $this->view('home/exam_list', $exam_list);
    }

    public function mark_exam($exam_id)
    {
        if ($_COOKIE['user_id'] == null)
        {
            header('location:/login/index');
            return;
        }  
        $results = $this->model('Results')->get_marks($exam_id);
        $exam = $this->model('Exam')->get_exam($exam_id);
        $questions = $this->model('Exam')->get_config($exam_id);
        $cutoffs = $this->model('Exam')->get_cutoffs($exam_id);
        if(isset($_POST['action']))
        {
            foreach($results as $student_results)
            {
                for($i = 1; $i <= $exam -> no_of_questions; $i++)
                {
                    $q = 'q_' . $i;
                    $q_student = $student_results->student_id . $q;
                    $student_results->{$q} = $_POST[$q_student];
                }
                $student_results->add_marks($exam->no_of_questions);
            }   
        }
        $this->view('/home/mark_exam', $results, $exam, $questions, $cutoffs);
    }

    public function delete_exam($exam_id)
    {
        if ($_COOKIE['user_id'] == null)
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
        if ($_COOKIE['user_id'] == null)
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
        }
        $this->view('/home/student_list', $class_list, $exam_id);

    }

    public function delete_student($student_id)
    {
        if ($_COOKIE['user_id'] == null)
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

    public function config_exam($exam_id)
    {
        if ($_COOKIE['user_id'] == null)
        {
            header('location:/login/index');
            return;
        }  
        $configs = $this->model('Exam')->get_config($exam_id);
        $exam = $this->model('Exam')->get_exam($exam_id);
        $new_cutoff = $this->model('Exam');
        if(isset($_POST['config_q']))
        {
            foreach ($configs as $config)
            {
                $config->marks = $_POST[$config->question . "_marks"];
                $config->topic = $_POST[$config->question . "_topic"];
                $config->difficulty = $_POST[$config->question . "_diff"];
                $config->add_config($exam->no_of_questions);
            }   
        }
        else if(isset($_POST['config_c']))
        {
            $new_cutoff->add_cutoff($exam_id, $_POST['grade'], $_POST['percentage']);
            $cutoffs = $this->model('Exam')->get_cutoffs($exam_id);
        }
        $cutoffs = $this->model('Exam')->get_cutoffs($exam_id);
        $this->view('/home/config_exam', $configs, $exam, $cutoffs);
        
    }

    public function summary($exam_id, $student_id)
    {
        if ($_COOKIE['user_id'] == null)
        {
            header('location:/login/index');
            return;
        }
        $summary = $this->model('Student')->get_student($student_id);
        $configs = $this->model('Exam')->get_config($exam_id);
        $exam = $this->model('Exam')->get_exam($exam_id);
        $cutoffs = $this->model('Exam')->get_cutoffs($exam_id);
        $this->view('/home/summary', $summary, $configs, $exam, $cutoffs);
    }
}

