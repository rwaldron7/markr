<?php
  include __DIR__ . '/../template/header.php'; 
?>

<main class="container pt-5">
  <div class="p-5 mt-5 rounded">
    <?php
        // Student details
        echo "<h1>Student summary</h1><br>";
        echo "<p>Name: $data->first_name $data->last_name</p>";
        echo "<p>Subject: $more_data->subject</p>";
        echo "<p>Year level: $more_data->year_level</p>";
        echo "<p>Class code: $more_data->class_code</p>";
        // Get number of questions
        $count = $more_data->no_of_questions;
        // Get total marks allocated for exam
        $total_marks_allocated = 0;
        foreach ($extra_data as $question)
        {
            $total_marks_allocated = (int) $total_marks_allocated + (int) $question->marks;
        }
        // Get total marks for student
        $total_marks = 0;
        for ($i = 1; $i <= $count; $i++)
        {
          $q = 'q_' . $i;
          $mark = $data->{$q};
          $total_marks = (int) $total_marks + (int) $mark;
        }  
        // Get rounded percentage
        $percentage = $total_marks / $total_marks_allocated * 100;
        $rounded_percentage = round($percentage, 1);
        // Get grade
        foreach ($bonus_data as $cutoff)
        {
          if ($percentage >= $cutoff->percentage)
          {
            $grade = $cutoff->grade;
            break;
          }
        }
        // Get unique topics and difficulties
        $topic_array = [];
        $diff_array = [];
        foreach ($extra_data as $config){
            if (!in_array($config->topic,$topic_array))
            {
                array_push($topic_array, $config->topic);
            }
            if (!in_array($config->difficulty,$diff_array))
            {
                array_push($diff_array, $config->difficulty);
            }
        }
        // Overall results
        echo "<h3>Results</h1>";
        echo "<p>Total marks : $total_marks/$total_marks_allocated";
        echo "<p>Total percentage : $rounded_percentage%";
        echo "<p>Grade : $grade";
        // By topic summary
        echo "<h3>By topic</h1>";
        foreach ($topic_array as $topic)
        {
            $given_marks = 0;
            $total_marks = 0;
            for ($i = 1; $i <= $count; $i++)
            {
              $q = 'q_' . $i;
              $mark = $data->{$q};
              if ($topic == $extra_data[$i - 1]->topic)
              {
                $given_marks = (int) $given_marks + (int) $mark;
                $total_marks = (int) $total_marks + (int) $extra_data[$i - 1]->marks;
              }
            }
            $percentage = $given_marks / $total_marks * 100;
            $rounded_percentage = round($percentage, 1);
            echo "<p>$topic : $rounded_percentage%";
        }
        // By difficulty summary
        echo "<h3>By difficulty</h1>";
        foreach ($diff_array as $difficulty)
        {
            $given_marks = 0;
            $total_marks = 0;
            for ($i = 1; $i <= $count; $i++)
            {
              $q = 'q_' . $i;
              $mark = $data->{$q};
              if ($difficulty == $extra_data[$i - 1]->difficulty)
              {
                $given_marks = (int) $given_marks + (int) $mark;
                $total_marks = (int) $total_marks + (int) $extra_data[$i - 1]->marks;
              }
            }
            $percentage = $given_marks / $total_marks * 100;
            $rounded_percentage = round($percentage, 1);
            echo "<p>$difficulty : $rounded_percentage%";
        }
        echo "<div><br><a href='/home/mark_exam/$more_data->exam_id' class='btn btn-secondary' role='button'>Back to class marks</a></div>";
    ?>
    
  </div>
</main>

<?php
  include __DIR__ . '/../template/footer.php';
?>