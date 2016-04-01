<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title>table booking system</title>
<link href='http://fonts.googleapis.com/css?family=Trocchi' rel='stylesheet' type='text/css' />
<link href="css/styles.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="wrapper">
  <div class="logo">RESERVATION FOR WEDDING</div>
  <div class="menu">
    <ul>
      <li><a href="index.php" class="active">Home</a></li>
    </ul>
  </div>
  </div>
  
   <?php
		$ROOT_DIR = $_SERVER["DOCUMENT_ROOT"];
	 	$failCase = "";
		require('connect.php'); 
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$createTbl = "CREATE TABLE IF NOT EXISTS wedreserve (ID INT(30) primary key AUTO_INCREMENT,date date,session INT(3),name VARCHAR(30),no INT(20),email VARCHAR(30),tblDetail INT(3) )";
			mysqli_query($conn,$createTbl) or die ('Error in creating the table');
			
			// Get details from the form
			$session=$_POST['session'];
			$date=$_POST['date'];
			$no=$_POST['no'];
			$name=$_POST['name'];
			$email=$_POST['email'];
			$table=$_POST['table'];
			
			// To check if already booked at specific time! If so, dont permit to reserve again!
			$check = "SELECT * FROM wedreserve WHERE date='".$date."' AND session=".$session." AND tblDetail=".$table;
			//echo $check;
			
			$res=mysqli_query($conn,$check) or die('Error');
			
			if($res)
			{
			  $count=mysqli_num_rows($res);
			}
			
			if($count == 0)
			{
			// Insert Details to the form! 
			//date session name no email tblDetail
			$sqlQuery="INSERT INTO wedreserve (date,session,name,no,email,tblDetail) VALUES ('".$date."',".$session.",'".$name."',".$no.",'".$email."',".$table.")";
			//echo $sqlQuery;
			$result=mysqli_query($conn,$sqlQuery) or die('Error');
			
			 if($result)
		     {
				$failCase =  "<br><center><h1>Thanks! You've successfully reserved the table ! </h1></center>";
			 }
			}
			else
			 {
				$failCase = "<br><center><h1>Sorry! This table is already reserved! <a href='wed2.php'>Check reserved table status!</a></h1></center>";
			 }	
			
		}
       ?>
    <center>
	<?php echo $failCase; ?>
	<br>
	<img src="images/wedding.jpg" alt="wedding"/>
	<br><br><br>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
       <table>
        <tr>
          <td>Date</td>
         <td></td><td><input type="date" name="date"></td>
        </tr>
       <tr>
          <td>Session</td>
         <td></td><td>
					<select name="session">
						<option value="1">Session 1 (9 to 12)</option>
						<option value="2">Session 2 (12 to 3)</option>
						<option value="3">Session 3 (3 to 6)</option>
						<option value="4">Session 4 (6 to 9)</option>	
					</select>
		 </td>
        </tr>
		<tr>
          <td>Name</td>
         <td></td><td><input type="text" name="name" placeholder="enter full name"></td>
        </tr>
       <tr>
          <td>Contact Number</td>
         <td></td><td><input type="text" name="no" placeholder="mobile no."></td>
        </tr>
       <tr>
          <td>Email_id</td>
         <td></td><td><input type="text" name="email" placeholder="              @gmail.com" autocomplete="off"> </td>
        </tr>
	<tr>
		<td>Select Your Tables</BR></td><td>
             <td>
					<select name="table" >
						<option value="1">Main Table</option>
						<option value="2">Table 1</option>
						<option value="3">Table 2</option>
						<option value="4">Table 3</option>	
					</select>
			 </td>
    </tr>
			 <tr>
             <td> </td><td></td> <td><input type="submit" name="sub" value="Reserve Table"></tr>			 
		</table>
	</form>
 </center>

<div class="footer">
  <div class="copy-rights">Copyright (c) Untitled. Design by www.alltemplateneeds.com,  Photos by www.photorack.net</div>
</div>
</body>
</html>
