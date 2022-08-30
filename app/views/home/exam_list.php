<?php
  include __DIR__ . '/../template/header.php'; 
?>

<main class="container pt-5">
  <div class="p-5 mt-5 rounded">
    <h1>Exam list</h1>
    <br>
    <table class="table table-striped">
      <thead><tr><th>Subject</th><th>Year level</th><th>Class code</th><th>Questions</th><th>Action</th></tr></thead>
      <?php
          foreach($data as $exam)
          {
              echo "<tr>
              <td>$exam->subject</td>
              <td>$exam->year_level</td>
              <td>$exam->class_code</td>
              <td>$exam->no_of_questions</td>
              <td><a href='/home/edit_exam/$exam->exam_id' class='btn btn-secondary' role='button'>Edit</a>
              <a href='/home/add_students/$exam->exam_id' class='btn btn-secondary' role='button'>Add students</a>
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