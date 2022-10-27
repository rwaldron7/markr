<?php
  include __DIR__ . '/../template/header.php'; 
?>

<main class="container pt-5">
  <div class="p-5 mt-5 rounded">
    <h1>Student summary</h1>
    <br>
    <?php
        $count = $more_data->no_of_questions;
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
    ?>
  </div>
</main>

<?php
  include __DIR__ . '/../template/footer.php';
?>