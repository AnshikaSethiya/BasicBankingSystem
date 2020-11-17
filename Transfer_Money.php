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
	  <li><a href = "TransferCredits.php">Transfer Credits</a></li>
	  <li><a href = "TransferHistory.php">Transfer History</a></li>
	  <li><a href = "#">Contact Us</a></li>
	  </ul>
   </nav>
<?php
	 $conn = mysqli_connect("localhost", "root", "", "banking");
	  if($conn -> connect_error){
		  die("connection failed:". $conn-> connect_error);
      }



      $sqlget = "SELECT * FROM bankusers;
      $sqldata = mysqli_query($conn,$sqlget) or die('Error Getting the data');
      while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
          $name = $row['CustomerName'];
      } 
      echo"
      <form action='transaction_all.php'>
        
      <input type='hidden' name='tn' value=''>
      <button type='button' class='button'><a href='transfer_me.php?'>View My Transaction</a></button><br/>
      <label>Transfer From:  </label>
      <select name='rn' required>
          <option disabled selected>-- Select Sender Name --</option>";
      $query = "SELECT * FROM bankusers WHERE NOT CustomerID = '$customerid'";
      $sqldataa = mysqli_query($conn,$query) or die('Error Getting the data');
      while($row = mysqli_fetch_array($sqldataa, MYSQLI_ASSOC)){
          echo "<option value='". $row['CustomerName'] ."'>" .$row['CustomerName'] ."</option>";   
      }
      echo "</select>";
      echo "<br>";
      echo"
      <input type='hidden' name='tn' value=''>
     <br/>
       <label>Transfer To:  </label>
      <select name='rn' required>
          <option disabled selected>-- Select Receiver Name --</option>";
      $query = "SELECT * FROM bankusers";
      $sqldataa = mysqli_query($conn,$query) or die('Error Getting the data');
      while($row = mysqli_fetch_array($sqldataa, MYSQLI_ASSOC)){
          echo "<option value='". $row['CustomerName'] ."'>" .$row['CustomerName'] ."</option>";   
      }

      echo "</select><br>";
      echo"<br>";
      

        

        echo '<label>Amount:  </label><input type="number" name="cashtransfer" id="cashtransfer" placeholder="Enter the amount" value="" required="required"><br/><br/>
        <label>A Message For the Receiver: </label><br/>
        <textarea name="msg" rows="5" cols="40"></textarea>
        
        <button type="submit">Transfer</button>
        
        </form>';
       
        ?>
        </body>
        </html>