<?php
  $showAlert = false;
  $showError = false;
  $showError2 = false;
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $emailid = $_POST["emailid"];
    $enrollment = $_POST["enrollment"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $institute = $_POST["institute"];
    $city = $_POST["city"];

    // check wether this username exists
    $existSql = "SELECT * FROM `usersdata` WHERE enrollment = '$enrollment'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);

    $existSql2 = "SELECT * FROM `usersdata` WHERE emailid = '$emailid'";
    $result2 = mysqli_query($conn, $existSql2);
    $numExistRows2 = mysqli_num_rows($result2);
      
    if($numExistRows > 0){
      $showError = "Enrollment-Id Already Exists...";
    }
    elseif($numExistRows2 > 0){
      $showError = "E-mail Id Already Exists...";
    }
    else{
      if($password == $cpassword){
        $sql="INSERT INTO `usersdata` (`username`, `emailid`, `enrollment`, `password`, `institute`, `city`, `date`) VALUES ('$username', '$emailid', '$enrollment', '$password', '$institute', '$city', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        if($result){
        $showAlert = true;
        }
      }
      else{
        $showError = "Password does not match";
      }
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

    <title>Signup</title>
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
      .title{
        text-align: center;
      }
      .head{
        color: rgb(49, 49, 240);
        font-style:oblique;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        text-transform: uppercase;
      }
      .sub_head{
        color: gray;
        font-style:italic;
        text-decoration:underline;
      }
      img{
        border-radius: 50%;
      }
      .btn1{
        outline: none;
        height: 40px;
        width: 100%;
        font-weight: bold;
        border-radius: 4px;
        background-color: white;
        color: rgb(49, 49, 240);
        border: 2px solid rgb(49, 49, 240);
      }
      .btn1:hover{
        background-color: rgb(49, 49, 240);
        color: white;
        border: 2px solid rgb(49, 49, 240);
      }
    </style>
  </head>

  <body>
    <!-- <?php require 'partials/_nav.php' ?> -->
    <?php
    if($showAlert){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success! Your account is now created and you can login.</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    if($showError){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error! '.$showError.'</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    ?>

    <section class="form my-5 mx-5">
      <div class="container col-lg-9">
        <form action="/loginsystem/signup.php" method="post" class="row g-3 px-5">
          <div class="title pt-3">
            <h2 class="head"><img src="logo.jpg" alt="logo" height="50px"> Collage Bus Services</h2>
            <h5 class="sub_head">Signup to our website</h5>
          </div>
          <div class="col-md-12">
            <label for="username" class="form-label">Full Name*</label>
            <input type="text" class="form-control" id="username" name="username" required>
          </div>
          <div class="col-md-6">
            <label for="enrollment" class="form-label">Enrollment Number*</label>
            <input type="text" class="form-control" id="enrollment" name="enrollment" required>
          </div>
          <div class="col-md-6">
            <label for="emailid" class="form-label">E-mail Id</label>
            <input type="email" class="form-control" id="emailid" name="emailid">
          </div>
          <div class="col-md-6">
            <label for="password" class="form-label">Password*</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <div class="col-md-6">
            <label for="cpassword" class="form-label">Confirm Password*</label>
            <input type="password" class="form-control" id="cpassword" name="cpassword" required>
          </div>
          <div class="col-md-8">
            <label for="institute" class="form-label">Institute Name*</label>
            <input type="text" class="form-control" id="institute" name="institute" required>
          </div>
          <div class="col-md-4">
            <label for="city" placeholder="select" class="form-label">City*</label>
            <select class="form-select" id="city" name="city" placeholder="Select" required>
              <option selected>Indore</option>
              <option selected>Ujjain</option>
              <option selected>Dewas</option>
              <option selected></option>
              <!-- <option selected>Select</option> -->
              <!-- <option>...</option> -->
            </select>
          </div>
          <div class="col-md-5">
            <button type="submit" class="btn1 mt-3 mb-2" >Sign-Up</button>
            <p class="mb-4">Do have an account...? Please 
            <a href="/loginsystem/login.php">Log-In</a>
            </p>
          </div>
        </form>
      </div>
    </section>
    

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>