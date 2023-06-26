<?php

include 'config.php';
session_start();
$email = $_SESSION['user_email'];

$query = "SELECT * FROM `savings` where email = '$email' LIMIT 1;";
// FETCHING DATA FROM DATABASE
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$account_balance = $row['amount'];

if(isset($_POST['withdraw'])){

    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

    

    $update = mysqli_query($conn, "UPDATE savings set amount = amount - $amount where email = '$email'") or die('query failed');
    header("Refresh:0");



}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Withdraw Savings</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="home.css">

</head>
<body>
   
<?php
include 'savings_nav.php';
?>
<br />

<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>Withdraw savings</h3>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>

<input type="number" name="amount" placeholder="Enter amount" class="box" required>
<input type="tel" name="phone" minlength="10" maxlength="10" placeholder="Enter Mpesa number" class="box" required>
<input type="submit" name="withdraw" value="Finish withdrawing" class="btn">

      <p>I want to <a href="savings.php">add savings</a></p>
   </form>

</div>

</body>
</html>