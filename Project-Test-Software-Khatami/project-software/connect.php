<?php

	session_start();

	$connect = mysqli_connect("localhost", "root", "", "test");

	if($connect === FALSE) {
		echo "FAILED TO CONNECT DATABASE";
		die();
	}
?>