<?php

include 'config.php';
session_start();
$email = $_SESSION['user_email'];

if(isset($_POST['borrow'])){

   $loan_amount = mysqli_real_escape_string($conn, $_POST['loan_amount']);
   $phone = mysqli_real_escape_string($conn, $_POST['phone']);
   $loan_type = mysqli_real_escape_string($conn, $_POST['loan_type']);
   $loan_plan = mysqli_real_escape_string($conn, $_POST['loan_plan']);

   $interest =floor($loan_amount * 0.13);
   $balance = $loan_amount + $interest;


   $insert = mysqli_query($conn, "INSERT INTO `loans`(email,loan_type,loan_plan, loan_amount, interest, balance) VALUES('$email', '$loan_type', '$loan_plan', $loan_amount, $interest, $balance)") or die('query failed');
   header('location:loan_details.php');

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Loan</title>
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
      <h3>Borrow Now</h3>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <select name="loan_type" class="box">
            <option value="Business">Business Loan</option>
            <option value="Emergency">Emergency Loan</option>
            <option value="Other Plans">Other Plans Loan</option>
        </select>
        <select name="loan_plan" class="box">
            <option value="3_months">3_months</option>
            <option value="1_year">1_year</option>
        </select>
        <input type="number" name="loan_amount" placeholder="Enter Amount to borrow" class="box" required>
        <input type="tel" name="phone" placeholder="Enter Mpesa number to receive" class="box" minlength="10" maxlength="10" required>
      <input type="submit" name="borrow" value="Borrow now" class="btn">
   </form>
</div>
</body>
</html>