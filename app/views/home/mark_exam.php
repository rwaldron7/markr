<?php
  include __DIR__ . '/../template/header.php'; 
?>

<main class="container pt-5">
  <div class="pt-5 pl-0 rounded">
    <h1>Mark exam</h1>
    <br>
    <a href="/home/student_list/<?=$extra_data->exam_id;?>" class="btn btn-secondary mb-3" role="button">Edit students</a>
    <a href="/home/exam_list/<?=$_SESSION['user_id'];?>" class="btn btn-secondary mb-3" role="button">Exam list</a>
    <br>
    <form action="" method="post">
      <div class="overflow-auto">
      <?php
          if ($data == null)
          {
            echo "<p>This exam has no students yet!</p>";
          }
          else
          {
            $count = $extra_data->no_of_questions;
            echo "<table class='table table-borderless table-marking'>
            <thead class='table-secondary'><tr><th colspan='2' style='text-align:center;'>Name</th><th colspan=$count style='text-align:center;'>Questions</th></tr></thead>
            <thead class='table-secondary'><tr><th class='name-columns'>First</th><th class='name-columns'>Last</th>";
            for ($i = 1; $i <= $count; $i++)
              {
                echo "<th style='text-align:center;'>$i</th>";
              }
            echo "</tr></thead>";
            echo "<div class='form-group'>";
            foreach($data as $exam)
            {
              echo "<tr>
              <td class='name-columns'>$exam->first_name</td>
              <td class='name-columns'>$exam->last_name</td>";
              for ($i = 1; $i <= $count; $i++)
              {
                $q = 'q_' . $i;
                $mark = $exam->{$q};
                echo "<td><input type='number' name=$q value=$mark></td>";
              }
              echo "</div>";
              echo "</tr>";
            }
            echo "</table>";
          }
      ?>
      </div>
      <input type="submit" name="action" value="Enter marks" class="btn btn-primary mb-3 mt-3"/>
    </form>
  </div>
</main>

<?php
  include __DIR__ . '/../template/footer.php';
?>