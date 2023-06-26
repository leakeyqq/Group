<?php

include 'config.php';
session_start();
$email = $_SESSION['user_email'];


if(isset($_POST['pay'])){

   $loan_no = mysqli_real_escape_string($conn, $_POST['loan_no']);
   $amount = mysqli_real_escape_string($conn, $_POST['amount']);
   $phone = mysqli_real_escape_string($conn, $_POST['phone']);
   
   $update = mysqli_query($conn, "UPDATE loans set balance = balance - $amount, status = 'Repaying' where id = '$loan_no'") or die('query failed');
   header('location:loan_details.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repay loan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <!-- custom css file link  -->
  <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="home.css">
</head>
<body>
  <?php
  include 'loan_nav.php';
  ?>
<br />
<div class="form-container">

<form action="" method="post" enctype="multipart/form-data">
   <h3>Repay Loan</h3>
   <input type="number" name="loan_no" placeholder="Enter loan serial no" class="box" required>
     <input type="number" name="amount" placeholder="Enter Amount to repay" class="box" required>
     <input type="tel" name="phone" placeholder="Mpesa number for payment" class="box" minlength="10" maxlength="10" required>
   <input type="submit" name="pay" value="Pay now" class="btn">
</form>
</div>
</body>
</html>