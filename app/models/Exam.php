<?php

namespace App\Model;

use App\Core\Model;

class Exam extends Model
{
    public $exam_id;
    
    public function create_exam()
    {
        $sql = 'INSERT INTO exams(user_id, subject, year_level, class_code, no_of_questions) VALUES (:user_id, :subject, :year_level, :class_code, :no_of_questions)';
        $stmt = self::$conn->prepare($sql);
        $stmt->execute(['user_id'=>$this->user_id, 'subject'=>$this->subject, 'year_level'=>$this->year_level, 'class_code'=>$this->class_code, 'no_of_questions'=>$this->no_of_questions]);
        return $stmt->rowCount();
    }

    public function initial_config($q, $exam_id)
    {
        $sql = 'INSERT INTO questions(question, exam_id) VALUES (:question, :exam_id)';
        $stmt = self::$conn->prepare($sql);
        $stmt->execute(['question'=>$q, 'exam_id'=>$exam_id]);
        return $stmt->rowCount();
    }

    public function find_exams()
    {
        $sql = 'SELECT * FROM exams WHERE user_id = :user_id';
        $stmt = self::$conn->prepare($sql);
        $stmt->execute(['user_id'=>$_SESSION['user_id']]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Model\Exam');
        return $stmt->fetchAll();
    }

    public function get_exam_id($class_code)
    {
        $sql = 'SELECT exam_id FROM exams WHERE user_id = :user_id AND class_code = :class_code';
        $stmt = self::$conn->prepare($sql);
        $stmt->execute(['user_id'=>$_SESSION['user_id'], 'class_code'=>$class_code]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Model\Exam');
        return $stmt->fetchAll();
    }

    public function delete_exam($exam_id)
    {
        $sql = 'DELETE FROM exams WHERE exam_id = :exam_id';
        $stmt = self::$conn->prepare($sql);
        $stmt->execute(['exam_id'=>$exam_id]);
        return $stmt->rowCount();
    }

    public function get_exam($exam_id)
    {
        $sql = 'SELECT * FROM exams WHERE exam_id = :exam_id';
        $stmt = self::$conn->prepare($sql);
        $stmt->execute(['exam_id'=>$exam_id]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Model\Exam');
        return $stmt->fetch();
    }

    public function get_config($exam_id)
    {
        $sql = 'SELECT * FROM questions WHERE exam_id = :exam_id ORDER BY question ASC';
        $stmt = self::$conn->prepare($sql);
        $stmt->execute(['exam_id'=>$exam_id]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Model\Exam');
        return $stmt->fetchAll();
    }

    public function get_cutoffs($exam_id)
    {
        $sql = 'SELECT * FROM cutoffs WHERE exam_id = :exam_id ORDER BY percentage DESC';
        $stmt = self::$conn->prepare($sql);
        $stmt->execute(['exam_id'=>$exam_id]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Model\Exam');
        return $stmt->fetchAll();
    }

    public function add_cutoff($exam_id, $grade, $percentage)
    {
        $sql = 'INSERT INTO cutoffs(exam_id, grade, percentage) VALUES (:exam_id, :grade, :percentage)';
        $stmt = self::$conn->prepare($sql);
        $stmt->execute(['exam_id'=>$exam_id, 'grade'=>$grade, 'percentage'=>$percentage]);
        return $stmt->rowCount();
    }

    public function add_config($no_of_questions)
    {
        // marks
        if ($this->marks == NULL)
        {
            $sql_add = 'UPDATE questions SET marks = :marks WHERE question_id = :question_id';
            $stmt = self::$conn->prepare($sql_add);
            $stmt->execute(['marks'=>NULL, 'question_id'=>$this->question_id]);
        }
        if ($this->marks != NULL)
        {
            $sql_add = 'UPDATE questions SET marks = :marks WHERE question_id = :question_id';
            $stmt = self::$conn->prepare($sql_add);
            $stmt->execute(['marks'=>$this->marks, 'question_id'=>$this->question_id]);
        }
        // topic
        if ($this->topic == NULL)
        {
            $sql_add = 'UPDATE questions SET topic = :topic WHERE question_id = :question_id';
            $stmt = self::$conn->prepare($sql_add);
            $stmt->execute(['topic'=>NULL, 'question_id'=>$this->question_id]);
        }
        if ($this->topic != NULL)
        {
            $sql_add = 'UPDATE questions SET topic = :topic WHERE question_id = :question_id';
            $stmt = self::$conn->prepare($sql_add);
            $stmt->execute(['topic'=>$this->topic, 'question_id'=>$this->question_id]);
        }
        // difficulty
        if ($this->difficulty == NULL)
        {
            $sql_add = 'UPDATE questions SET difficulty = :difficulty WHERE question_id = :question_id';
            $stmt = self::$conn->prepare($sql_add);
            $stmt->execute(['difficulty'=>NULL, 'question_id'=>$this->question_id]);
        }
        if ($this->difficulty != NULL)
        {
            $sql_add = 'UPDATE questions SET difficulty = :difficulty WHERE question_id = :question_id';
            $stmt = self::$conn->prepare($sql_add);
            $stmt->execute(['difficulty'=>$this->difficulty, 'question_id'=>$this->question_id]);
        }
    }
}