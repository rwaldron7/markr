<?php
  include __DIR__ . '/../template/header.php'; 
?>

<main class="container pt-5">
  <div class="p-5 mt-5 rounded">
    <h1>Register an account</h1>
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
      <div class="form-group mb-3">
          <label>Confirm password: <input type="password" name="password_confirm" class="form-control"/></label>
      </div>
      <input type="submit" name="action" value="Register" class="btn btn-primary  mb-3"/>
    </form>
    <span>Already have an account? <a href='/login/index'>Login</a></span>
  </div>
</main>

<?php
  include __DIR__ . '/../template/footer.php';
?>
