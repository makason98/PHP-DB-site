<?php
  session_start();
  require 'connect.php';
  
  $id = $_GET['prod'];
  
  $sql = "SELECT * FROM produse WHERE id='$id'";
  $result = mysqli_query($conectare, $sql);
  $row = $result->fetch_assoc();
 
  $tip        =  $row["tip"];
  $brand      =  $row["brand"];
  $model      =  $row["model"];
  $design     =  $row["design"];
  $tehnologie =  $row["tehnologie"];
  $connectare =  $row["conectare"];
  $diametru   =  $row["diametru"];
  $impedanta  =  $row["impedanta"];
  $frecventa  =  $row["frecventa"];
  $greutate   =  $row["greutate"];
  $altele     =  $row["altele"];
  $pret       =  $row["pret"];
  $pic_link   =  $row["pic_link"];
  
 
  if (!empty($_POST['tip'])){  $tip              = $_POST['tip'];}
  if (!empty($_POST['brand'])){  $brand          = $_POST['brand'];}
  if (!empty($_POST['model'])){ $model           = $_POST['model'];}
  if (!empty($_POST['design'])){ $design         = $_POST['design'];}
  if (!empty($_POST['tehnologie'])){ $tehnologie = $_POST['tehnologie'];}
  if (!empty($_POST['conectare'])){ $connectare  = $_POST['conectare'];}
  if (!empty($_POST['diametru'])){ $diametru     = $_POST['diametru'];}
  if (!empty($_POST['impedanta'])){ $impedanta   = $_POST['impedanta'];}
  if (!empty($_POST['frecventa'])){ $frecventa   = $_POST['frecventa'];}
  if (!empty($_POST['greutate'])){ $greutate     = $_POST['greutate'];}
  if (!empty($_POST['altele'])){ $altele         = $_POST['altele'];}
  if (!empty($_POST['pret'])){ $pret             = $_POST['pret'];}

				
  

		
		$sql = "UPDATE produse SET tip = '$tip',    
		                           brand = '$brand',                      
                                   model = '$model', 
                                   design = '$design', 
								   tehnologie = '$tehnologie', 
                                   conectare = '$connectare', 
                                   diametru = '$diametru', 		
                                   impedanta = '$impedanta',
                                   frecventa = '$frecventa', 
                                   greutate = '$greutate', 
                                   altele = '$altele', 
                                   pret = '$pret', 
								   pic_link = '$pic_link' 
                                   WHERE id = '$id'";
		$result = mysqli_query($conectare, $sql);

		header("Location: obiect.php?prod=$id");


?>