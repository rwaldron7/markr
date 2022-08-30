<?php

namespace App\Model;

use App\Core\Model;

class Student extends Model
{
    public $first_name;
    public $last_name;
    public $exam_id;
    
    public function get_student($student_id)
    {
        $sql = 'SELECT * FROM results WHERE student_id = :student_id';
        $stmt = self::$conn->prepare($sql);
        $stmt->execute(['student_id'=>$student_id]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Model\Student');
        return $stmt->fetch();
    }
    
    public function find_students($exam_id)
    {
        $sql = 'SELECT * FROM results WHERE exam_id = :exam_id';
        $stmt = self::$conn->prepare($sql);
        $stmt->execute(['exam_id'=>$exam_id]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Model\Student');
        return $stmt->fetchAll();
    }

    public function add_student($exam_id)
    {
        $sql = 'INSERT INTO results(first_name, last_name, exam_id) VALUES (:first_name, :last_name, :exam_id)';
        $stmt = self::$conn->prepare($sql);
        $stmt->execute(['first_name'=>$this->first_name, 'last_name'=>$this->last_name, 'exam_id'=>$exam_id]);
        return $stmt->fetch();
    }

    public function delete_student($student_id)
    {
        $sql = 'DELETE FROM results WHERE student_id = :student_id';
        $stmt = self::$conn->prepare($sql);
        $stmt->execute(['student_id'=>$student_id]);
        return $stmt->rowCount();
    }


}