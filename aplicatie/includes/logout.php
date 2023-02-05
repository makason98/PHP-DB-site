<?php

session_start();

require 'connect.php';
$sql = "DELETE FROM cos";
		$result = mysqli_query($conectare, $sql);
session_destroy();
header("Location: ../index.php");

