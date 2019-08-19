<?php
$conn=mysqli_connect('localhost','root','','mapp');
	if($conn){
		//echo "connected successfully";
	}
	else{
		echo $conn->error;
	}
	?>