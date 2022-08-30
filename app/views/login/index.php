<?php
  include __DIR__ . '/../template/header.php'; 
?>

<main class="container pt-5">
  <div class="p-5 mt-5 rounded">
    <h1>Login</h1>
    <br>
    <?php
      if(!is_array($data))
      {
          echo "<div class='alert alert-danger' role='alert'>$data</div>";
      }
    ?>
    <form action="" method="post">
      <div class="form-group mb-3">
          <label>Username: <input type="text" name="username" class="form-control"/></label>
      </div>
      <div class="form-group mb-3">
          <label>Password: <input type="password" name="password" class="form-control"/></label>
      </div>
      <input type="submit" name="action" value="Login" class="btn btn-primary mb-3"/>
    </form>
    <span>No account? <a href='/login/register'>Register</a></span>
  </div>
</main>

<?php
  include __DIR__ . '/../template/footer.php';
?>