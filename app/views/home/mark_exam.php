<?php
  include __DIR__ . '/../template/header.php'; 
?>

<main class="container pt-5">
  <div class="pt-5 pl-0 rounded">
    <h1>Mark exam</h1>
    <br>
    <a href="/home/student_list/<?=$extra_data->exam_id;?>" class="btn btn-secondary mb-3" role="button">Edit students</a>
    <a href="/home/exam_list/<?=$_COOKIE['user_id'];?>" class="btn btn-secondary mb-3" role="button">Exam list</a>
    <br>
    <form id="class_marks" name="marks" action="" method="post">
      <div class="overflow-auto">
      <?php
          $total_marks_allocated = 0;
          foreach ($more_data as $question)
          {
            $total_marks_allocated = (int) $total_marks_allocated + (int) $question->marks;
          }
          if ($data == null)
          {
            echo "<p>This exam has no students yet!</p>";
          }
          if ($total_marks_allocated == 0)
          {
            echo "<p>This exam has no marks allocated yet!</p>";
          }
          else
          {
            $count = $extra_data->no_of_questions;
            $student_count = 0;
            foreach ($data as $student_results)
            {
              $student_count = $student_count + 1;
            }
            echo "<table class='table table-borderless table-marking'>
            <thead class='table-secondary'><tr><th colspan='2' class='text-center'></th><th colspan=$count class='text-center'>Questions</th><th colspan='4' class='text-center'>Total</th></tr></thead>
            <thead class='table-secondary'><tr><th class='name-columns'>First name</th><th class='name-columns'>Last name</th>";
            for ($i = 1; $i <= $count; $i++)
              {
                echo "<th class='text-center'>$i</th>";
              }
            echo "<th class='text-center'>Marks</th><th class='text-center'>%</th><th class='text-center'>Grade</th><th class='text-center'>Details</th></tr></thead>";
            echo "<div class='form-group'>";
            $student_no = 0;
            foreach ($data as $student_results)
            {
              $student_no = $student_no + 1;
              echo "<tr>
              <td class='name-columns'>$student_results->first_name</td>
              <td class='name-columns'>$student_results->last_name</td>";
              $total_marks = 0;
              for ($i = 1; $i <= $count; $i++)
              {
                $q = 'q_' . $i;
                $mark = $student_results->{$q};
                $q_student = $student_results->student_id . $q;
                $total_marks = (int) $total_marks + (int) $mark;
                $tab_index = $student_no + ($i-1) * $student_count;
                echo "<td class='text-center'><input tabindex=$tab_index id='marks' class='text-center marks' type='number' name=$q_student value=$mark></td>";
              }                 
              echo "<td class='text-center'>$total_marks</td>";
              $percentage = $total_marks / $total_marks_allocated * 100;
              $rounded_percentage = round($percentage, 1);
              echo "<td class='text-center'>$rounded_percentage</td>";
              $grade = "";
              foreach ($bonus_data as $cutoff)
              {
                if ($percentage >= $cutoff->percentage)
                {
                  $grade = $cutoff->grade;
                  break;
                }
              }
              echo "<td class='text-center'>$grade</td>";
              echo "<td class='text-center'><a class='btn btn-success btn-sm' href='/home/summary/$student_results->exam_id/$student_results->student_id'>Summary</a></td>";
              echo "</tr>";
              echo "</div>";

            }
            echo "<tr><td class='name-columns'></td><th class='name-columns'>Marks allocated</th>";
            foreach ($more_data as $question)
            {
              echo "<td class='text-center'>$question->marks</td>";
            }
            echo "<td class='text-center'>$total_marks_allocated</td><td colspan='3'></td></tr>";
            echo "</table>";
            echo "</div>
      <div class='d-flex flex-row-reverse'><input type='submit' name='action' value='Save and update' id='save' class='btn btn-primary mb-3'/></div>
      <div class='d-flex flex-row-reverse'><button type='button' class='btn btn-warning'>Class summary</button></div>";
          }
      ?>
      
    </form>
  </div>
</main>

<?php
  include __DIR__ . '/../template/footer.php';
?>