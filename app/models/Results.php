<?php

namespace App\Model;

use App\Core\Model;

class Results extends Model
{
    public function edit_exam($exam_id)
    {
        $sql = 'SELECT * FROM results WHERE exam_id = :exam_id';
        $stmt = self::$conn->prepare($sql);
        $stmt->execute(['exam_id'=>$exam_id]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Model\Results');
        return $stmt->fetchAll();
    }
}