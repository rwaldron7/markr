<?php
  include __DIR__ . '/../template/header.php'; 
?>

<main class="container pt-5">
  <div class="p-5 mt-5 rounded">
    <h1>Menu</h1>
    <br>
    <a href="/login/logout" class="btn btn-warning mb-3" role="button">Log out</a>
    <br>
    <a href="/home/create_exam" class="btn btn-success mb-3" role="button">Create new exam</a>
    <br>
    <a href="/home/exam_list" class="btn btn-secondary mb-3" role="button">Edit existing exam</a>
  </div>
</main>

<?php
  include __DIR__ . '/../template/footer.php';
?>