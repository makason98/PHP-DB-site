<?php



function slide ($id, $verif){
require 'connect.php';


$sql = "
        SELECT t.tipul as tipp, b.brand as brandd, p.pic_link, p.model,  p.pret
        FROM produse p 
		JOIN tip t ON t.id = p.tip
		JOIN brand b ON b.id = p.brand
		WHERE p.id = '$id'";
$result = mysqli_query($conectare, $sql);
    $row = $result->fetch_assoc();

		    /*$_SESSION['tip'] = $row['tip'];
			$_SESSION['brand'] = $row['brand'];
			$_SESSION['model'] = $row['model'];*/
			//$_SESSION['pic_link'] = $row['pic_link'];
			
			if ($verif == 'imagine'){return $row['pic_link'];}
	   else if($verif == 'tip'){return $row['tipp'];}
	   else if($verif == 'brand'){return $row['brandd'];}
	   else if($verif == 'model'){return $row['model'];}
	   else if($verif == 'pret'){return $row['pret'];}
			
}

function random (){
require 'connect.php';
$cont = 1;


$sql = "SELECT MAX(id) FROM produse";
$result = mysqli_query($conectare, $sql);
$row = $result->fetch_assoc();
$num_rows = max($row);


  do{
  $x = rand(1,$num_rows);
  $sql = "SELECT * FROM produse WHERE id = '$x'";
  $result = mysqli_query($conectare, $sql);
  if (mysqli_num_rows($result)==0) {$cont = 0;}
  else 
  return $x;
}while($cont == 0);
}


function produs ($id, $verif){
require 'connect.php';
$sql = "
        SELECT t.tipul as tipp, b.brand as brandd, p.pic_link, p.model,  p.design,  p.tehnologie,  p.conectare,  p.diametru,  p.impedanta,   p.frecventa , p.greutate , p.altele,  p.pret
        FROM produse p 
		JOIN tip t ON t.id = p.tip
		JOIN brand b ON b.id = p.brand
		WHERE p.id = '$id'



";

$result = mysqli_query($conectare, $sql);

    $row = $result->fetch_assoc();
		
			
			if ($verif == 'imagine'){return $row['pic_link'];}
	   else if($verif == 'tip'){return $row['tipp'];}
	   else if($verif == 'brand'){return $row['brandd'];}
	   else if($verif == 'model'){return $row['model'];}
	   else if($verif == 'design'){return $row['design'];}
	   else if($verif == 'tehnologie'){return $row['tehnologie'];}
	   else if($verif == 'conectare'){return $row['conectare'];}
	   else if($verif == 'diametru'){return $row['diametru'];}
	   else if($verif == 'impedanta'){return $row['impedanta'];}
	   else if($verif == 'frecventa'){return $row['frecventa'];}
	   else if($verif == 'greutate'){return $row['greutate'];}
	   else if($verif == 'altele'){return $row['altele'];}
	   else if($verif == 'pret'){return $row['pret'];}
			
}

function cos_cump($x, $y){
	require 'connect.php';
	$sql = "INSERT INTO cos (id_user, id_produs, data) 
        VALUES ('$y', '$x',  NOW())";

    $result = mysqli_query($conectare, $sql);
	header("Location: cos.php?cos=$x");
	
}


function sterge (){
require 'connect.php';
$x = $_SESSION['de_id'];
$sql = "DELETE FROM produse WHERE id = '$x'";
$result = mysqli_query($conectare, $sql);
}


?>