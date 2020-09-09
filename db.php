<?php
		$host='localhost';
		$database='testovoe';
		$user ='root';
		$password='root';
		$link = mysqli_connect($host, $user, $password) or die ('Error: can`t connect to the server'. mysqli_error($link));
		mysqli_select_db($link, 'testovoe') or die("Error: can`t find database!");
		mysqli_set_charset($link, 'utf8');

?>