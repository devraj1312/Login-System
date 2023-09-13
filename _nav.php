<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    /* a{
      text-decoration: none;
      font-weight: 500;
    } */
  </style>
</head>
<body>
<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $loggedin = true;
}
else{
  $loggedin = false;
}

  echo '<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">iSecure</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/loginsystem/welcome.php">Home</a>
          </li>';
          
          // if(!$loggedin){
          //   echo '<li class="nav-item">
          //   <a class="nav-link active" href="/loginsystem/login.php">Login</a>
          //   </li>
          //   <li class="nav-item">
          //   <a class="nav-link active" href="/loginsystem/signup.php">signup</a>
          //   </li>';
          // }
          if($loggedin){
          echo '<li class="nav-item">
            <a class="nav-link active" href="/loginsystem/logout.php">logout</a>
            </li>';
          }
  echo '</ul>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-light" type="submit">Search</button>
          </form>
          <a href="/loginsystem/logout.php"><button class="btn btn-light mx-2" type="submit">Log-Out</button></a>
      </div>
    </div>
  </nav>';
?>
</body>
</html>