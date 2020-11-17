<!DOCTYPE html>
<html>
	<head>
	  <title>
	  Transfer History
	  </title>
	  <!-- Required meta tags -->
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <!-- CSS file -->
	  <link rel="stylesheet" href="TransferHistory.css?v=<?php echo time();?>">
	   <!-- Google font -->
	   <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
	 </head>
  <body>
  <nav>
    <ul>
	  <li><a href= "Home.php">Home</a></li>
      <li><a href= "User_list.php">View Users</a></li>
	  <li><a href = "TransferCredits.php">Tranfer Credits</a></li>
	  <li><a href = "About.php">About</a></li>
	  </ul>
   </nav>

   <table class="viewusers">
	<h1>Transfer History</h1>
	<tr>
		<th>Sender</th>
		<th>Reciever</th>
		<th>Credit</th>
	</tr>
	<?php
	$conn = mysqli_connect("localhost", "root", "", "banking");
	if($conn-> connect_error){
		die("connection failed:". $conn-> connect_error);
	}

	$sql = "SELECT * FROM transaction_history";
	$result = $conn-> query($sql);
    
	if(mysqli_num_rows($result) > 0){

		while ( $row = $result -> fetch_assoc()) {
			echo "<tr><td>". $row["TransfererName"] ."</td><td>".  $row["ReceiverName"] ."</td><td>" . $row["CashTransfer"] ."</td></tr>";
		}
		echo "</table>";

	}
	else {
		echo "no result";
	}
    $conn-> close();
	?>
</table>

</body>
</html>