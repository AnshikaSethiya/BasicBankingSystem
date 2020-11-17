<!DOCTYPE html>
<html>
	<head>
	  <title>
	  Transfer Credits
	  </title>
      <!-- Required meta tags -->
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- CSS file -->
      <link rel="stylesheet" href="TransferCredits.css?v=<?php echo time();?>">
      <!-- Google font -->
      <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
	 </head>
  <body>
  <nav>
    <ul>
	  <li><a href= "Home.php">Home</a></li>
      <li><a href= "User_list.php">View Users</a></li>
	  <li><a href = "TransferHistory.php">Transfer History</a></li>
	  <li><a href = "About.php">About</a></li>
	  </ul>
   </nav>
</body>
  <?php
    $conn = mysqli_connect("localhost", "root", "", "banking");
    if($conn-> connect_error){
        die("connection failed:". $conn-> connect_error);
    }
    $result = mysqli_query($conn,"SELECT CustomerName  FROM bankusers");
    $resul1 = mysqli_query($conn,"SELECT CustomerName  FROM bankusers");
    ?>

<h1> Transfer Money </h1>
<div class ="form"> 
<form action="" method="GET" class = "form">
		<select  class= TransfererName type="text"  name="u1" required value="">
		<option value ="">From User</option>
		<?php
                        while($tname = mysqli_fetch_array($result)) {
                            echo "<option value='" . $tname['CustomerName'] . "'>" . $tname['CustomerName'] . "</option>";
                        }
                ?>

        </select><br><br>
		<select  class = ReceiverName  type="text" name="u2" value=""><br><br>
	     <option value ="">To User</option>
		<?php
                        while($tname = mysqli_fetch_array($resul1)) {
                            echo "<option value='" . $tname['CustomerName'] . "'>" . $tname['CustomerName'] . "</option>";
                        }
                ?>
        </select><br><br>
    	<input type="text" id="amount" name="amt" placeholder="Enter amount"><br><br>
		
		<input type="submit" id="submit" name="submit" value="Transfer"><br><br>
		
	</form>
</div>
<?php
	
    if(isset($_GET['submit'])){
    $u1=$_GET['u1'];
    $u2=$_GET['u2'];
    $amt=$_GET['amt'];


    if($u1!="" && $u2!="" && $amt!="")
    {
        //update transaction changes in database
        $query1= "UPDATE bankusers SET AvailableBalance = AvailableBalance + '$amt' WHERE CustomerName = '$u2' ";
        $data1= mysqli_query($conn, $query1);
        $query2= "UPDATE bankusers SET AvailableBalance = AvailableBalance  - '$amt' WHERE CustomerName = '$u1' ";
        $data2= mysqli_query($conn, $query2);
        
        //insert into transaction_history
            $query1 = "INSERT INTO transaction_history (TransfererName,ReceiverName,CashTransfer) VALUES('$u1','$u2','$amt')";
                            $res2 = mysqli_query($conn,$query1);
        
                                  if($res2){
                                $user1 = "SELECT * FROM bankusers WHERE  CustomerName='$u1' ";
                                         $res=mysqli_query($conn,$user1);
                                         $row_count=mysqli_num_rows($res);
                          }
        
    

             if ($data1 && $data2)
             {
            $message="Successful transfer";
                                echo "<script type='text/javascript'>alert('$message');
                                </script>";
        }
        else
        {
            $message="Error While Commiting Transaction ";
            echo "<script type='text/javascript'>alert('$message');
                                </script>";
        }

    }

    else
    {
        $message="All Fields are Mandatory";
        echo "<script type='text/javascript'>alert('$message');
            </script>";
    }
}


?>

 </html>