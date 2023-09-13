<?php
    $login = false;
    $showError = false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include 'partials/_dbconnect.php';
        $enrollment = $_POST["enrollment"];
        $password = $_POST["password"];

        $sql = "select * from usersdata where enrollment = '$enrollment' AND password='$password'";

        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
          if($num == 1){
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['enrollment'] = $enrollment;
            header("location: welcome.php");
          }
          else{
            $showError = true;
          }
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

    <title>Login</title>
    <style>
      *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
      }
      
      body{
        background: rgb(220,225,225);
      }
      .row{
        background: white;
        border-radius: 30px;
        box-shadow: 12px 12px 22px gray;
      }
      img{
        border-radius: 30px;
      }
      .btn1{
        border: none;
        outline: none;
        height: 40px;
        width: 100%;
        background-color: rgb(49, 49, 240);
        color: white;
        border-radius: 4px;
        font-weight: bold;
      }
      .btn1:hover{
        background-color: white;
        color: rgb(49, 49, 240);
        border: 2px solid rgb(49, 49, 240);
      }
      .title{
        color: rgb(49, 49, 240);;
        font-style:oblique;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        text-transform: uppercase;
        text-decoration:underline;
      }
      h6{
        font-style: italic;
        color: gray;
      }
    </style>
  </head>
  <body>
    <!-- <?php require 'partials/_nav.php' ?> -->
    <?php
    if($login){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    if($showError){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Invalid Credentials. 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    ?>

    <section class="form my-5 mx-4">
      <div class="container col-lg-7">
        <div class="row no-gutter">
          <div class="col-lg-5">
            <img src="logo1.jpg" class="img-fluid" alt="image">
          </div>
          <div class="col-lg-7 px-4 pt-4">
            <div class="title">
              <img src="logo.jpg" alt="logo" height="60px">
              <h3 class="pt-2">Collage Bus Services</h3>
            </div>
              <h6 class="pt-3" >Sign Into Your Account</h6>
            <form action="/loginsystem/login.php" method="post">
              <div class="form-row">
                <div class="col-lg-10">
                  <input type="text" placeholder="Enrollment Id" id="enrollment" name="enrollment" class="form-control my-2 p-2">
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-10">
                  <input type="password" placeholder="password"  id="password" name="password" class="form-control my-3 p-2" >
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-10">
                  <button type="submit" class="btn1 mt-3 mb-4" >Login</button>
                </div>
              </div>
              <p>Don't have an account...? Please
                <a href="/loginsystem/signup.php">Sign-Up</a>
              </p>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>