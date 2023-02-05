<?php
  session_start();
  require 'connect.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../style.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
</head>
<body>

  
 <nav id="blacker" class="navbar navbar-inverse navbar-fixed-top">
    <div class="conteiner-fluid">
	 <div class="navbar-header">
	   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#Navigatie">
	     <span class="icon-bar"></span>
		 <span class="icon-bar"></span>
		 <span class="icon-bar"></span>
	   </button>
	    <a class="navbar-brand" href="../index.php"><img src="../imagini/logo.png"></a>
	 </div>
	 <div class="collapse navbar-collapse" id="Navigatie">
	   <ul class="nav navbar-nav navbar-left">
	     <li><a class="menu" href="pre_produse.php"><b>PRODUSE</b></a></li>
	   </ul>
	    <ul class="nav navbar-nav navbar-right">
		
          <?php
		  
		  require 'connect.php';
          $sql = "SELECT COUNT(id) AS max FROM cos";
          $result = mysqli_query($conectare, $sql);
          $row = $result->fetch_assoc();

		  
 if(!isset($_SESSION['id'])){
  echo'<li><a data-toggle="modal" data-target="#signup"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';
  echo'<li><a data-toggle="modal" data-target="#login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
	}else if(isset($_SESSION['id'])){

		echo'<li><a href="cos.php"><span class="glyphicon glyphicon-shopping-cart"></span> <div class="numberCircle">'.$row["max"].'</div></a></li>
		     <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
	}
?>

       </ul>
	 </div>
	</div>
  </nav>


<div class="container text-center ultimele_adaugate">
         <div class="border">
         </div>
		 </div>

		 
<div class="container">

  <div class="row optiuni">
     <div class="col-sm-6">
	
<?php
		echo '<p>Salut! <br> Sunteti conectat ca: ' .$_SESSION["nume"].' '.$_SESSION["prenume"];
?>
    
     </div>
</div>







<br><br>

 <?php
 
  if (isset($_SESSION['id']) && $_SESSION['user_type'] == 1) {
	  echo'<div class="row">
      <div class="col-sm-4 optiuni">';
	  
 echo'
 <a style="cursor:pointer; "data-toggle="collapse" data-target="#demo" >ADAUGA UN PRODUS </a>

<div id="demo" class="collapse">
 
<form action="produse.php" method="POST" enctype="multipart/form-data">

 <select name="tip">
    <option value="1">Casti audio</option>
    <option value="2">Accesorii</option>
  </select><br> 
 <select name="brand">
    <option value="1">SONY</option>
    <option value="2">Audio-Tehnica</option>
	<option value="3">Sennheiser</option>
  </select><br> 
    <input type="text" name ="model" placeholder="Model" ><br>
	<input type="text" name ="design" placeholder="Design" ><br>
    <input type="text" name="tehnologie" placeholder="Tehnologie"><br>
	<input type="text" name ="conectare" placeholder="conectare" ><br>
	<input type="text" name ="diametru" placeholder="Diametru" ><br>
	<input type="text" name ="impedanta" placeholder="Impedanta" ><br>
	<input type="text" name ="frecventa" placeholder="Frecventa" ><br>
	<input type="text" name ="greutate" placeholder="Greutate" ><br>
	<input type="text" name ="altele" placeholder="Altele" ><br>
	<input type="text" name ="pret" placeholder="Pret" ><br>
	<input type="file" name="imagine" >
	<input type="submit" value="Trimite" class="btn btn-primary float-right">';
 
 
 echo'
 </form>
      </div>
 
 
 
 ';

 
 if(isset($_GET['info'])&& $_GET['info'] == 'ok_produs'){
	echo '<p id="connectMsg" style="color: blue ">Produsul a fost a adaugat</p>';
 }else if(isset($_GET['info'])&& $_GET['info'] == 'produs_error')
	{
		echo '<p id="connectMsg" style="color: red ">Nu s-a putut insera </p>';
	}
 
 echo'</div>
      </div>';
  }
  
  
?>



 </div>
 
 <?php
 if(isset($_GET['info'])&& $_GET['info'] == 'merge'){ echo '<p id="connectMsg" style="color: blue ">Comanda a fost trimisa</p>'; }
 ?>
  <br><br>

 <?php
$user = $_SESSION['id'];
 
 
$sql = "SELECT ist.id as numar_comanda,ist.data as data_comanda, ist.total FROM istoric ist JOIN arhiva arh ON arh.id_comanda = ist.id where arh.id_user = '$user' GROUP BY ist.id";
$result = mysqli_query($conectare, $sql);

echo'
<div class="container de_cos">
<div class="row cos_cumparaturi">ISTORIC COMENZI</div>
';



if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
		
		echo '
	
        <div class="container_cos">
		
		
		<div class="one"><a href="profile.php?var='.$row["numar_comanda"].'">Comanda: cu numarul <b style="color:blue;">'.$row["numar_comanda"].'</b> din data: '.$row["data_comanda"].' </a></div>
		
		
		<div class="three"><p>'.$row["total"].'lei </p></div>
		</div>


		
		';
    }
} else {
    echo ' <p>NU AVETI COMENZI</p>';
}

echo '</div>';


 ?>
 
 
 
 <br><br>
 
 
 <?php
 
if (!isset($_GET['var'])){
$_GET['var'] = 1;
$x = $_GET['var'];}
else {
$x = $_GET['var'];
 

$sql = "SELECT t.tipul as tipp,b.brand as brandd, prod.model, prod.pret, ist.plata ,  prod.pret
  FROM arhiva arh 
  JOIN produse prod ON prod.id=arh.id_produs 
  JOIN istoric ist  ON ist.id=arh.id_comanda
  JOIN tip t ON t.id = prod.tip
  JOIN brand b ON b.id = prod.brand
  WHERE arh.id_comanda = '$x'";
$result = mysqli_query($conectare, $sql);
	


echo'
<div class="container de_cos">
<div class="row cos_cumparaturi">COMANDA</div>
';

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
		
		echo '
	
        <div class="container_cos">
		<div class="one"><p>'.$row["tipp"].'   '.$row["brandd"].'   '.$row["model"].' '.$row["plata"].'  </p></div>
		<div class="three"><p>  '.$row["pret"].'  lei </p></div>
		</div>


		
		';
    }
} else 

echo '</div>';
}

 ?>
 
<script>
function hideMessage() {
  document.getElementById("connectMsg").style.display = "none"
};
setTimeout(hideMessage,2000);
</script>
</body>
</html>