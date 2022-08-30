<?php
  include __DIR__ . '/../template/header.php'; 
?>

<main class="container pt-5">
  <div class="p-5 mt-5 rounded">
    <h1>Create an exam</h1>
    <br>
    <form action="" method="post">
      <div class="form-group mb-3">
          <label>Subject: <input type="text" name="subject" class="form-control"/></label>
      </div>
      <div class="form-group mb-3">
          <label>Year level <input type="text" name="year_level" class="form-control"/></label>
      </div>
      <div class="form-group mb-3">
          <label>Class code<input type="text" name="class_code" class="form-control"/></label>
      </div>
      <div class="form-group mb-3">
          <label>Number of questions<input type="number" name="no_of_questions" class="form-control"/></label>
      </div>
      <input type="submit" name="action" value="Create" class="btn btn-primary mb-3"/>
    </form>
  </div>
</main>

<?php
  include __DIR__ . '/../template/footer.php';
?>