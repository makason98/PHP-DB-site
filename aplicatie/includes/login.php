<?php

session_start();
require 'connect.php';

if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password']))
{
	$username = strtolower($_POST['username']);
	$password = $_POST['password'];


	$sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conectare, $sql);
	
	$row = $result->fetch_assoc();
	$hash = $row['password'];

	$check = password_verify($password, $hash);
	
		if ($check == 0) {
		header("Location: ../index.php?info=gresit");
		die();
	} else {

		$sql = "SELECT * FROM users WHERE username='$username' AND password='$hash'";
		$result = mysqli_query($conectare, $sql);

		if (!$row = $result->fetch_assoc()) {
			echo 'Parola sau usernameul nu se potriveste.';
		} else {
			$_SESSION['id'] = $row['id'];
			$_SESSION['nume'] = ucfirst($row['nume']);
			$_SESSION['prenume'] = ucfirst($row['prenume']);
			$_SESSION['username'] = $row['username'];
			$_SESSION['user_type'] = $row['user_type'];
		}

		header("Location: ../index.php");

	}
}else{
header("Location: ../index.php?info=eroare");
}