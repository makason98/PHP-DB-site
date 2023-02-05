<?php
require 'connect.php';
$x = $_GET['sterge'];

$sql = "DELETE FROM cos WHERE id = '$x'";
		$result = mysqli_query($conectare, $sql);
		
		
		
		$sql = "SELECT id_produs FROM cos WHERE data= ( SELECT MAX(data) FROM cos)";
		$result = mysqli_query($conectare, $sql);
		$row = $result->fetch_assoc();
		$d=$row["id_produs"];
		if($d != 0){header("Location: cos.php?cos=$d");}
		else {header("Location: ../index.php");}
		
