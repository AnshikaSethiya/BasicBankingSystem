<!DOCTYPE html>
<html>
	<head>
	  <title>
	  View Users
	  </title>
	  <!-- Required meta tags -->
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <!-- CSS file -->
      <link rel="stylesheet" href="transfer.css?v=<?php echo time();?>">
        <!-- Google font -->
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
	 </head>
  <body>
  <nav>
    <ul>
	  <li><a href= "Home.php">Home</a></li>
	  <li><a href = "User_list.php">User List</a></li>
	  <li><a href = "About.php">About</a></li>
	  </ul>
   </nav>

     
   <?php
  
  $conn = mysqli_connect("localhost", "root", "", "banking");
  if($conn -> connect_error){
	  die("connection failed:". $conn-> connect_error);
  }

$customerid = $_GET['id'];
$sqlget = "SELECT * FROM bankusers WHERE CustomerID = '$customerid'";
$sqldata = mysqli_query($conn,$sqlget) or die('Error Getting the data');
while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
	$name = $row['CustomerName'];
}    

echo "<table border='1' id='table_view'>";
echo "<caption>Welcome ".$name."</caption>";
echo "<tr>
	<th>Customer ID</th>
	<th>Account Number</th>
	<th>Customer Name</th>
	<th>Email</th>
	<th>Branch Number</th>
	<th>Available Balance</th>
	</tr>";

	$sqlget = "SELECT * FROM bankusers WHERE CustomerID = '$customerid'";
	$sqldata = mysqli_query($conn,$sqlget) or die('Error Getting the data');
while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
	echo "<tr><td>";
		echo $row['CustomerID'];
	echo "</td><td>";
		echo $row['AccountNumber'];
	echo "</td><td>";
		echo $row['CustomerName'];
	echo "</td><td>";
		echo $row['Email'];
	echo "</td><td>";
		echo $row['BranchName'];
	echo "</td><td>";
		echo $row['AvailableBalance'];

	echo "</td></tr>";
   
}

  echo "</table>";

$conn-> close();
?>
<button><a href = "TransferCredits.php">Transfer Money </a></button>

      </body>
      </html>