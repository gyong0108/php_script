<?php
	//  replace mysqllogin and mysqlpassword with your own
	//  $conn = mysqli_connect("localhost", "root", "ezznWX8jD2J5ySUE", "oss-cw2");
	$conn = mysqli_connect("localhost", "root", "","php_student_script");

	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
	}

?>
