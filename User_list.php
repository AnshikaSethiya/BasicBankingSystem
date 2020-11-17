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
	  <link rel="stylesheet" href="index.css?v=<?php echo time();?>">
	 </head>
  <body>
  <nav>
    <ul>
	  <li><a href= "Home.php">Home</a></li>
      <li><a href = "TransferCredits.php">Transfer Credit </a></li>
      <li><a href="TransferHistory.php">Transfer History</a></li>
	  <li><a href = "About.php">About</a></li>
	  </ul>
   </nav>
<?php
	 $conn = mysqli_connect("localhost", "root", "", "banking");
	  if($conn -> connect_error){
		  die("connection failed:". $conn-> connect_error);
      }
      $sqlget = 'SELECT * FROM bankusers';
      $sqldata = mysqli_query($conn,$sqlget) or die('Error Getting the data');
      echo "<table border='1'>
      <caption></caption>";
      echo "<tr>
          <th>Customer ID</th>
          <th>Customer Name</th>
          <th>Email</th>
          <th>Branch Number</th>
          <th>Available Balance</th>
          <th></th>
          </tr>";
  
      while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
          echo "<tr><td>";
              echo $row['CustomerID'];
          echo "</td><td>";
              echo $row['CustomerName'];
          echo "</td><td>";
              echo $row['Email'];
          echo "</td><td>";
              echo $row['BranchName'];
          echo "</td><td>";
              echo $row['AvailableBalance'];
          echo "</td><td class='view'>";
              echo "<button><a href='Detail.php?id=$row[CustomerID]'>View</a></button>";
          echo "</td></tr>";  
      }
  
      echo "</table>";
      $conn-> close();
  ?>
  </div>
  </body>

</html>