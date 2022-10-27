<?php
  include __DIR__ . '/../template/header.php'; 
?>

<main class="container pt-5">
  <div class="p-5 mt-5 rounded">
    <?php
        if(isset($_COOKIE['user_id']))
        {
          echo "<h1>Hello, {$_COOKIE['username']}.</h1><br>";
          echo "<a class='btn btn-warning mb-3' href='/login/logout'>Log out</a>";
        }
        else
        {
          echo "<h1>No account logged in.</h1>";
        }

        
    ?>
  </div>
</main>

<?php
  include __DIR__ . '/../template/footer.php';
?>