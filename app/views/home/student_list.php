<?php
  include __DIR__ . '/../template/header.php'; 
?>

<main class="container pt-5">
  <div class="p-5 mt-5 rounded">
    <h1>Edit students</h1>
    <br>
    <a href="/home/exam_list" class="btn btn-secondary mb-3" role="button">Back to exam list</a>
    <a href="/home/mark_exam/<?=$extra_data?>" class="btn btn-secondary mb-3" role="button">Mark</a>
    <form action="" method="post">
      <div class="form-group mb-3">
          <label>First name: <input type="text" name="first_name" class="form-control"/></label>
      </div>
      <div class="form-group mb-3">
          <label>Last name: <input type="text" name="last_name" class="form-control"/></label>
      </div>
      <input type="submit" name="action" value="Add student" class="btn btn-primary mb-3"/>
    </form>
    <table class="table table-striped">
      <thead><tr><th>Student ID</th><th>First name</th><th>Last name</th><th>Action</th></tr></thead>
      <?php
          foreach($data as $student)
          {
              echo "<tr>
              <td>$student->student_id</td>
              <td>$student->first_name</td>
              <td>$student->last_name</td>
              <td><a href='/home/delete_student/$student->student_id' class='btn btn-secondary' role='button'>Delete</a></td>
              </tr>";
          }
      ?>
    </table>
  </div>
</main>

<?php
  include __DIR__ . '/../template/footer.php';
?>