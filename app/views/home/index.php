<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/all.min.css">
  </head>

  <body>

  <?php
    include __DIR__ . '/../template/header.php'; 
  ?>

  <main class="container pt-5">
    <div class="bg-light p-5 mt-5 rounded">
      <h1>Menu</h1>
      <a href="/login/logout">Log out</a><br>

      <table>
        <tr><td>Name</td><td>Action 1</td><td>Action 2</td></tr>
        <?php
            foreach($data as $user)
            {
                echo "<tr>
                <td>$user->username</td>
                <td><a href='/home/detail/$user->user_id'>Details</a></td>
                <td><a href='/home/edit/$user->user_id'>Edit</a></td>
                <td><a href='/home/delete/$user->user_id'>Delete</a></td>
                </tr>";
            }

        ?>
      </table>
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