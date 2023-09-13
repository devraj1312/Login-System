<?php
  session_start();

  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    $username='username';
    header("location : login.php");
    exit;
  }
    
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title> Welcome - </title>
    
  </head>
  <body>
    <div class="container-fluid">
      <div class="row ">
        <header class="col-lg-12">
            <?php require 'partials/_nav.php' ?>
        </header>

        <main class="col-lg-12 pt-2">
          <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">welcome - <?php echo $_SESSION['enrollment'] ?> </h4>
            <p>Hey how are you doing? Welcome to iSecure. you are logged in as <?php echo $_SESSION['enrollment'] ?> </p>
            <hr>
            <p class="mb-0">Whenever you need to, be sure to logout <a href="/loginsystem/logout.php">using this link.</a></p>
          </div>
        </main>

        <footer clas="col-lg-12">
          <?php require 'partials/_footer.php' ?>
        </footer>
    </div>
    </div>
    

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>