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

    public function find_exams()
    {
        $sql = 'SELECT * FROM exams WHERE user_id = :user_id';
        $stmt = self::$conn->prepare($sql);
        $stmt->execute(['user_id'=>$_SESSION['user_id']]);
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
}