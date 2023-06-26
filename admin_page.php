<?php
include 'config.php';

session_start();
if(!isset($_SESSION['admin_name'])){
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="home.css">
</head>

<body class="p-3 mb-2 bg-dark-subtle text-emphasis-dark">
  <nav class="navbar navbar-expand-lg" style="background-color: #1ecbe1;
    overflow: hidden;">
    <h1> Welcome Admin <span><?php 
        echo $_SESSION['admin_name']?></span></h1>
   <div class="container-fluid">
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav" style="overflow: hidden; width: 700px; margin: auto;">
          <a class="nav-link"  href="home.php">Home</a>
          <a class="nav-link"href="#">About</a>
          <a class="nav-link" href="#">Transactions</a>
          <a class="nav-link" href="loan_system\index.php">Loans</a>
          <a class="nav-link" href="Contact.php">Contacts</a>
          <a class="nav-link"  href="#">FAQ</a>

        </div>
      </div>
    </div>
  </nav><br />
  <div class="card text-bg-dark" style="position: relative;
      text-align: center;
      color: white;
    ">
    <img src="images\Youths.jpg" class="card-img" alt="Clinque Terre" style=" background-size: cover;
        width: 100%; height: 660px; border: 2px solid; color: pink; resize: both; overflow: scroll;">
    <div class="card-img-overlay" style="position: absolute;top: 50%; left: 50%;transform: translate(-50%, -50%);
    font-size: xx-large;">
      <h1 class="card-title">Youths Saving & Loans</h1>
      <p class="card-text">
        <bold>Lets Grow Together Financially</bold>
      </p>

    </div>
  </div><br />
<div class="title">
<h2>For You <br></h2>
<p class="heading">We got financial solutions designed to help you easily transact, 
  manage and grow your money. Join us today</p>
</div>
  <div class="class= row row-cols-1 row-cols-md-3 g-4">
  <div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-8">
      <img src="images\Business.jpg" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-4">
      <div class="card-body">
        <h5 class="card-title">Start a Business</h5>
        <p class="card-text">Get a loan and easily start or expand your buiness</p>
      </div>
    </div>
  </div>
</div>
<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-8">
      <img src="images\Savings.jpg" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-4">
      <div class="card-body">
        <h5 class="card-title">Make Savings</h5>
        <p class="card-text"> Open an account and start your savings tody</p>
      </div>
    </div>
  </div>
</div>
<div class="card mb-3" >
  <div class="row g-0">
    <div class="col-md-8">
      <img src="images\Loan.jpg" class="img-fluid" alt="...">
    </div>
    <div class="col-md-4">
      <div class="card-body">
        <h5 class="card-title">Get a Loan</h5>
        <p class="card-text">Borrow and get money instantly</p>
      </div>
    </div>
  </div>
</div>
</div>

<?php
include "footer.php"
?>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
    integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
    crossorigin="anonymous"></script>
</body>

</html>


