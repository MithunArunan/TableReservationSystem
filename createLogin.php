<?php
		$ROOT_DIR = $_SERVER["DOCUMENT_ROOT"];
	 	$failCase = "";
		require('connect.php'); 
			echo "helooooooooooo";
			$createTbl = "CREATE TABLE IF NOT EXISTS admin (ID INT(30) primary key AUTO_INCREMENT, NAME VARCHAR(30), PASSWORD VARCHAR(30) )";
			mysqli_query($conn,$createTbl) or die ('Error in creating the table');
			
			// To insert a login for admin
			$check = "INSERT INTO admin (NAME,PASSWORD) VALUES ('admin','p@ssw0rd')";
			echo $check;
			
			$res=mysqli_query($conn,$check) or die('Error in INserting the row');
?>