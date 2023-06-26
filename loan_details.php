
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

<?php
session_start();
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
  $query = "SELECT * FROM `loans` where email='$email';";
  // FETCHING DATA FROM DATABASE
  $result = mysqli_query($conn, $query);
  
  if (mysqli_num_rows($result) > 0) {
      // OUTPUT DATA OF EACH ROW
      echo "<table>
      <tr>
      <th>Loan serial no</th>
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
          echo "<td>". $row["id"]."</td>"."<td>". $row["loan_type"]."</td>"."<td>". $row["loan_plan"]."</td>"."<td>". $row["loan_amount"]."</td>"."<td>". $row["interest"]."</td>"."<td>". $row["balance"]."</td>"."<td>". $row["status"]."</td>"."<td>". $row["date"]."</td>";
          echo "</tr>";
      }
      echo "</table>";
  } else {
      echo "0 results";
  }
  
  $conn->close();

   
?>
</body>
</html>