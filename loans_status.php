<?php
include 'config.php';

session_start();
$user_name = $_SESSION['user_name'];
$email = $_SESSION['user_email'];

if(!isset($_SESSION['user_name'])){
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
  <link rel="stylesheet" href="css/style.css">

</head>

<body class="p-3 mb-2 bg-dark-subtle text-emphasis-dark">
  <nav class="navbar navbar-expand-lg" style="background-color: #1ecbe1;
    overflow: hidden;">
    <h5>Welcome Back <span><?php 
        //echo $_SESSION['user_name']
        echo "Admin"
        ?></span></h5>
<?php
   include("admin_nav.php");
   ?>
  </nav><br/>

  <?php
$email = $_SESSION['user_email'];
$servername = "localhost";
  $username = "root";
  $password = "";
  $databasename = "group_project";
  $myPort = "3307";
  // CREATE CONNECTION
  $conn = mysqli_connect($servername, 
    $username, $password, $databasename,$myPort);
  
  // GET CONNECTION ERRORS
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  
  // SQL QUERY
  $query = "SELECT * FROM `loans`;";
  // FETCHING DATA FROM DATABASE
  $result = mysqli_query($conn, $query);
  
  if (mysqli_num_rows($result) > 0) {
      // OUTPUT DATA OF EACH ROW
      echo "<table>
      <tr>
      <th>Loan serial no</th>
      <th>Email</th>
      <th>Loan type</th>
      <th>loan plan</th>
      <th>Amount taken</th>
      <th>Interest</th>
      <th>Remaining balance</th>
      <th>Status</th>
      <th>Date taken</th>
    </tr>
      ";

      while($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>". $row["id"]."<td>". $row["email"]."</td>"."</td>"."<td>". $row["loan_type"]."</td>"."<td>". $row["loan_plan"]."</td>"."<td>". $row["loan_amount"]."</td>"."<td>". $row["interest"]."</td>"."<td>". $row["balance"]."</td>"."<td>". $row["status"]."</td>"."<td>". $row["date"]."</td>";
          echo "</tr>";
      }
      echo "</table>";
  } else {
      echo "0 results";
  }
if(isset($_POST['change'])){

   $serial_no = mysqli_real_escape_string($conn, $_POST['serial_no']);
   $loan_action = mysqli_real_escape_string($conn, $_POST['loan_action']);

   $insert = mysqli_query($conn, "UPDATE loans SET status='$loan_action' WHERE id='$serial_no'") or die('query failed');
   header("Refresh:0");

}
  $conn->close();

   
?>
<div class="form-container">

<form action="" method="post" enctype="multipart/form-data">
   <h3>Approve or Reject Loan</h3>
   <?php
   if(isset($message)){
      foreach($message as $message){
         echo '<div class="message">'.$message.'</div>';
      }
   }
   ?>
        <input type="number" name="serial_no" placeholder="Enter loan serial no" class="box" required>
   <select name="loan_action" class="box">
         <option value="Approved">Approve loan</option>
         <option value="Denied">Deny loan</option>
     </select>
   <input type="submit" name="change" value="Complete action" class="btn">
</form>
</div>
</body>
</html>