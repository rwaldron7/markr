<?php

namespace App\Model;

use App\Core\Model;

class Results extends Model
{
    public function get_marks($exam_id)
    {
        $sql = 'SELECT * FROM results WHERE exam_id = :exam_id';
        $stmt = self::$conn->prepare($sql);
        $stmt->execute(['exam_id'=>$exam_id]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Model\Results');
        return $stmt->fetchAll();
    }

    /*
    public function add_marks($no_of_questions)
    {
        $q_string = 'q_1';
        for ($i = 2; $i <= $no_of_questions; $i++)
        {
            $q = 'q_' . $i;
            $q_string = $q_string . ', ' . $q;
        }
        $q_results = ':q_1';
        for ($i = 2; $i <= $no_of_questions; $i++)
        {
            $q = ':q_' . $i;
            $q_results = $q_results . ', ' . $q;
        }
        $q_execute = "'q_1'=>$" . "this->q_1'";
        for ($i = 2; $i <= $no_of_questions; $i++)
        {
            $q = 'q_' . $i;
            $q_execute = $q_execute . ", '" . $q . "'=>$" . "this->" . $q;
        }
        print_r($this);
        echo '<br/>';
        print_r($q_string);
        echo '<br/>';
        print_r($q_results);
        echo '<br/>';
        print_r($q_execute);
        echo '<br/>';
        $sql = 'INSERT INTO results($q_string) VALUES ($q_results)';
        $stmt = self::$conn->prepare($sql);
        $stmt->execute([$q_execute]);
        echo "Data added!";
        return $stmt->rowCount();
    }
    */

    public function add_marks($no_of_questions)
    {
        for ($i = 1; $i <= $no_of_questions; $i++)
        {
            $q = 'q_' . $i;
            $q_value = ':' . $q;
            /*
            $sql_find = 'SELECT `' . $q . '` FROM results WHERE `results`.`student_id` = ' . $this->student_id;
            $stmt_find = self::$conn->prepare($sql_find);
            $stmt_find->execute();
            $stmt_find->setFetchMode(\PDO::FETCH_CLASS, 'App\Model\Results');
            $existing_mark = $stmt_find->fetch();
            */
            if ($this->{$q} == NULL)
            {
                $sql_add = 'UPDATE `results` SET `' . $q . '` = ' . $q_value . ' WHERE `results`.`student_id` = ' . $this->student_id;
                $stmt = self::$conn->prepare($sql_add);
                $stmt->execute([$q=>NULL]);
            }
            if ($this->{$q} != NULL)
            {
                $sql_add = 'UPDATE `results` SET `' . $q . '` = ' . $q_value . ' WHERE `results`.`student_id` = ' . $this->student_id;
                $stmt = self::$conn->prepare($sql_add);
                $stmt->execute([$q=>$this->{$q}]);
            }
        }
    }
}