<?php

session_start();
require 'connect.php';

if (isset($_POST['plata']) && !empty($_POST['plata'])&& 
    isset($_POST['emailaddress']) && !empty($_POST['emailaddress'])&& 
    isset($_POST['judet']) && !empty($_POST['judet'])&& 
    isset($_POST['localitate']) && !empty($_POST['localitate'])&& 
	isset($_POST['strada']) && !empty($_POST['strada'])&& 
	isset($_POST['nr']) && !empty($_POST['nr'])&& 
	isset($_POST['cod_postal']) && !empty($_POST['cod_postal'])&& 
	isset($_POST['numar_de_telefon']) && !empty($_POST['numar_de_telefon'])&& 
	isset($_POST['termeni']) && !empty($_POST['termeni']))
	{
		
		
$plata = $_POST['plata'];
$emailaddress = $_POST['emailaddress'];
$judet = $_POST['judet'];
$localitate = $_POST['localitate'];
$strada = $_POST['strada'];
$nr = $_POST['nr'];
$bloc = $_POST['bloc'];
$cod_postal = $_POST['cod_postal'];
$numar_de_telefon = $_POST['numar_de_telefon'];
$termeni = $_POST['termeni'];
$termenii = $_POST['termenii'];
$total = $_GET['total'];	
		
		$sql = "INSERT INTO istoric (plata, email , judet , localitate, strada, nr , bloc, cod_postal , numar_de_telefon, termeni , termenii,data, total) 
        VALUES ('$plata','$emailaddress','$judet','$localitate', '$strada', '$nr', '$bloc', '$cod_postal', '$numar_de_telefon', '$termeni', '$termenii', NOW(), '$total')";
		$result = mysqli_query($conectare, $sql);
        
		
		$sql = "SELECT MAX(id) as max FROM istoric";
		$result = mysqli_query($conectare, $sql);
		$row = $result->fetch_assoc();
		$d = $row["max"];
		
		
   
   $sql = "INSERT INTO arhiva (id_comanda,id_produs, id_user, data)
           SELECT '$d', id_produs, id_user, data FROM cos";
		$result = mysqli_query($conectare, $sql);
		
		
		$sql = "DELETE FROM cos";
		$result = mysqli_query($conectare, $sql);
		header("Location: profile.php?info=merge");
		
		
	}else{
header("Location: cos.php?info=eroare");
}
  
