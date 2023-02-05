<?php
session_start();
require 'connect.php';


if(!empty($_FILES['imagine']['name'])){
	$nume = $_FILES['imagine']['name'];
	$tmp_name = $_FILES['imagine']['tmp_name'];
	$size = $_FILES['imagine']['size'];
	if($size <= 6000000){
		move_uploaded_file($tmp_name,'../imagini/'.$nume);
	}else{
		echo 'Imaginea este prea mare';
	}
 }


if (isset($_POST['tip']) && !empty($_POST['tip'])&&
    isset($_POST['brand']) && !empty($_POST['brand'])&&
    isset($_POST['model']) && !empty($_POST['model'])&&
    isset($_POST['design']) && !empty($_POST['design'])&&
    isset($_POST['tehnologie']) && !empty($_POST['tehnologie'])&& 
	isset($_POST['conectare']) && !empty($_POST['conectare'])&&
	isset($_POST['diametru']) && !empty($_POST['diametru'])&& 
	isset($_POST['impedanta']) && !empty($_POST['impedanta'])&&
	isset($_POST['frecventa']) && !empty($_POST['frecventa'])&&
	isset($_POST['greutate']) && !empty($_POST['greutate'])&& 
	isset($_POST['altele']) && !empty($_POST['altele']) &&
	isset($_POST['pret']) && !empty($_POST['pret'])&& !empty($nume))
{
  
  $tip        = $_POST['tip'];
  $brand      = $_POST['brand'];
  $model      = $_POST['model'];
  $design     = $_POST['design'];
  $tehnologie = $_POST['tehnologie'];
  $connectare = $_POST['conectare'];
  $diametru   = $_POST['diametru'];
  $impedanta  = $_POST['impedanta'];
  $frecventa  = $_POST['frecventa'];
  $greutate   = $_POST['greutate'];
  $altele     = $_POST['altele'];
  $pret       = $_POST['pret'];
  $link_poza  = $nume;
		
		
		$sql = "INSERT INTO produse (tip, brand, model, design, tehnologie, conectare, diametru, impedanta, frecventa, greutate, altele, pret, pic_link) 
        VALUES ('$tip','$brand','$model','$design', '$tehnologie', '$connectare', '$diametru', '$impedanta', '$frecventa', '$greutate', '$altele', '$pret','$link_poza')";

		$result = mysqli_query($conectare, $sql);

		header("Location: profile.php?info=ok_produs");

	
}else{
header("Location: profile.php?info=produs_error");
}

?>