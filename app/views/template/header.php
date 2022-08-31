<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MarkR</title>
  <link rel="stylesheet" href="/css/all.min.css">
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <style>
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none; 
    }
    .table-marking>tbody>tr>td, ..table-marking>tbody>tr>th, ..table-marking>tfoot>tr>td, ..table-marking>tfoot>tr>th, ..table-marking>thead>tr>td, ..table-marking>thead>tr>th{
      margin: 0;
      padding: 0;
      width: 40px;
    }
    tr>td>input{
      margin: 0;
      padding: 0;
      width: 40px;
    }
    .name-columns{
      min-width: 100px;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
    <div class="container">
      <a class="navbar-brand" href="/home/index">MarkR</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link" href="/home/index">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/home/create_exam">Create</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/home/exam_list">Mark</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto mb-2 mb-md-0">
            <?php
              if(isset($_SESSION['user_id']))
              {
                echo "<li class='nav-item'><a class='nav-link' href='/home/account'>{$_SESSION['username']}</a></li>";
                echo "<li class='nav-item'><a class='nav-link' href='/login/logout'>Log out</a></li>";
              }
              else
              {
                echo "<li class='nav-item'><a class='nav-link' href='/login/index'>Log in</a></li>";
              }
            ?>
        </ul>
        
          

        
      </div>
    </div>
  </nav>
