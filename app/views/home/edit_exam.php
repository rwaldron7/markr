<?php
  include __DIR__ . '/../template/header.php'; 
?>

<main class="container pt-5">
  <div class="p-5 mt-5 rounded">
    <h1>Edit exam</h1>
    <br>
    <a href="/home/add_students/<?=$data[0]->exam_id;?>" class="btn btn-secondary mb-3" role="button">Add students</a>
    <br>
    <table class="table table-striped">
      <thead><tr><th>ID</th><th>First name</th><th>Last name</th>
      <?php
          $count = $extra_data->no_of_questions;
          for ($i = 1; $i <= $count; $i++)
              {
                echo "<th>Q$i</th>";
              }
          echo "<th>Action</th></tr></thead>";
          foreach($data as $exam)
          {
              echo "<tr>
              <td>$exam->student_id</td>
              <td>$exam->first_name</td>
              <td>$exam->last_name</td>";
              for ($i = 1; $i <= $count; $i++)
              {
                $mark = $exam->{$i};
                echo "<td>$mark</td>";
              }
              echo "<td><a href='/home/edit_exam/$exam->exam_id' class='btn btn-secondary' role='button'>Edit</a>
              <a href='/home/delete_exam/$exam->exam_id' class='btn btn-secondary' role='button'>Delete</a></td>
              </tr>";
          }
      ?>
    </table>
  </div>
</main>

<?php
  include __DIR__ . '/../template/footer.php';
?>