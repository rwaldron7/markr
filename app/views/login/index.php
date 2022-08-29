<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/all.min.css">
  </head>

  <body>

  <?php
    include __DIR__ . '/../template/header.php'; 
  ?>

  <main class="container pt-5">
    <div class="bg-light p-5 mt-5 rounded">
      <h1>Login</h1>
      <?php
        if(!is_array($data))
        {
            echo "<div class='alert alert-danger' role='alert'>$data</div>";
        }
      ?>
      <form action="" method="post">
        <div class="form-group">
            <label>Username: <input type="text" name="username" class="form-control"/></label>
        </div>
        <div class="form-group">
            <label>Password: <input type="password" name="password" class="form-control"/></label>
        </div>
        <input type="submit" name="action" value="Login" class="btn btn-primary"/>
      </form>
      No account? <a href='/login/register'>Register</a>
    </div>
  </main>

  <?php
    include __DIR__ . '/../template/footer.php';
  ?>

  <script src="/js/jquery-3.6.1.min.js"></script>
  <script src="/js/bootstrap.bundle.min.js"></script>
  <script src="/js/all.min.js"></script>

  </body>

</html>