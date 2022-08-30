<?php
  include __DIR__ . '/../template/header.php'; 
?>

<main class="container pt-5">
  <div class="p-5 mt-5 rounded">
    <h1>Delete exam</h1>
    <br>
    <p>Are you sure you want to delete this exam?</p>
    <form action="" method="post">
      <button name="action" value="Yes" class="btn btn-danger">Yes</button>
    </form>
    <form action="/home/exam_list">
      <button value="No" class="btn btn-secondary">No</button>
    </form>
  </div>
</main>

<?php
  include __DIR__ . '/../template/footer.php';
?>