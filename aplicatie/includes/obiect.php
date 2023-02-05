<?php
  session_start();
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
		     <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
		     <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> Profil</a></li>';
	}
?>

       </ul>
	 </div>
	</div>
  </nav>


<!-- Modal -->
<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="Modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Modal">Inregistrare</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form action="signup.php" method="POST">
    <input type="text" name ="nume" placeholder="Nume" ><br>
	<input type="text" name ="prenume" placeholder="Prenume"><br>
	<input type="text" name ="username" placeholder="username" ><br>
    <input type="password" name="password" placeholder="parola">
	<input type="submit" value="Autentificare" class="btn btn-primary float-right">
	
	<?php
	if(isset($_GET['info'])&& $_GET['info'] == 'ok')
	{
		echo '<p style="text-align: center; color: blue ">Contul a fost creat cu succes</p>';
	}
	else if(isset($_GET['info'])&& $_GET['info'] == 'eroare')
	{
		echo '<p style="text-align: center; color: red ">Completati toate campurile</p>';
	}
	else if(isset($_GET['info'])&& $_GET['info'] == 'exista'){
		echo '<p style="text-align: center; color: red ">Username-ul exista deja</p>';
	}
	?>
	</form>
	
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="Modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Modal">Logare</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	   <form action="login.php" method="POST">
	<input type="text" name ="username" placeholder="username" ><br>
    <input type="password" name="password" placeholder="parola">
	<input type="submit" value="Autentificare" class="btn btn-primary float-right">
	
	<?php
 if(isset($_GET['info'])&& $_GET['info'] == 'gresit'){
	echo '<p style="text-align: center; color: red ">Parola este gresita</p>';
 }else if(isset($_GET['info'])&& $_GET['info'] == 'eroare')
	{
		echo '<p style="text-align: center; color: red ">Completati toate campurile</p>';
	}
?>
      </form>
	  </div>
    </div>
  </div>
</div>



<?php
include 'slideshow.php';
$x = $_GET['prod'];


echo'<div class="container text-center ultimele_adaugate">
         <div class="border2">
		 <h3 class="denumire">'.produs ($x, "tip").' '.produs ($x, "brand").' '.produs ($x, "model").'<h3>
         </div>
		 </div>';
?>

<div class="container">
<div class="row">

<div class="col-sm-6 "><img width="300px" src="../imagini/<?php echo produs ($x, "imagine") ?>">
</div>
<div class="col-sm-6 ">

<?php
if(!isset($_SESSION["id"])){
	
	

	     echo'
		 <div class="container">
		 <div class="row">
		 <div class="col-sm-6">
		 <a class="obiecte"  href="obiect.php?prod= '.$x.'"> <img src="../imagini/shopping-cart.png"></a>
		 </div>
		 <div class="col-sm-6">
		 <p style="    color: #ff6666; float: left; padding: 0 10px 5px 0; "><b>'.produs ($x, "pret").' lei</b></p>
         <p class ="mesaj1" id = "connectMsg" style="color: red ">NU SUNTETI CONECTAT: </p>
		 </div>
		 </div>
		 </div>
		 
		 
		 ';
}else{ 
       	     echo' 
		 <div class="row">
		 <div class="col-sm-6">
		 <a class="obiecte"  href="side_b.php?cos= '.$x.'"> <img src="../imagini/shopping-cart.png"></a>
		 </div>
		 <div class="col-sm-6">
		 <p style="color:#ff6666; float: left; padding: 130px 0 5px 0; font-size: 30px;"><b>'.produs ($x, "pret").' lei</b></p>
		 </div>
		 
		 </div>';
		 
}

echo'
</div>
</div>
</div>

<div style="margin:20px;"></div>


<div class="container" style="  box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.20); ">

<table class="table table-striped">
  <tr>
    <th>SPECIFICATII</th>
	  <th></th>
	    <th></th>
		  <th></th>
  
  </tr>
  <tr>
    <td>TIP PRODUS</td>
    <td>'.produs ($x, "tip").'</td>
	<td>BRAND</td>
    <td>'.produs ($x, "brand").'</td>
  </tr>
  
  <tr>
    <td>MODEL</td>
    <td>'.produs ($x, "model").'</td>
	<td>DESIGN</td>
    <td>'.produs ($x, "design").'</td>
  </tr>
  
  <tr>
        <td>TEHNOLOGIE</td>
    <td>'.produs ($x, "tehnologie").'</td>
	    <td>CONECTARE</td>
    <td>'.produs ($x, "conectare").'</td>
  </tr>
  
  <tr>
      <td>DIAMETRU</td>
    <td>'.produs ($x, "diametru").'</td>
	    <td>IMPEDANTA</td>
    <td>'.produs ($x, "impedanta").'</td>
  </tr>
  
  <tr>
      <td>FRECVENTA</td>
    <td>'.produs ($x, "frecventa").'</td>
	    <td>GREUTATE</td>
    <td>'.produs ($x, "greutate").'</td>
  </tr>
  <tr>
      <td>EXTRA</td>
    <td>'.produs ($x, "altele").'</td>
	 <td></td>
	  <td></td>
  </tr>
</table>
</div>









';	

 
 if (isset($_SESSION['id']) && $_SESSION['user_type'] == 1) {
	 
	 
	 
 echo'
<div class="container">
<div class="row">
<div class="col-sm-6">
<a style="cursor:pointer; "data-toggle="collapse" data-target="#demo" >ACTUALIZEAZA PRODUSUL</a>

<div id="demo" class="collapse">
<form action="update.php?prod='.$x.'"method="POST">
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
	<input type="submit" value="Trimite" class="btn btn-primary float-right">
    </form>
</div>
</div>

<div class="col-sm-6">
 <a href="sterge_produsul.php?prod='.$x.'"> STERGE PRODUSUL</a>
</div>


</div>
</div>
 ';}
  ?>
  
  
<?php	
/*

$_SESSION['de_id'] = $x ;
echo ' 
<script>
function stergel(p){
'.sterge().';
}
</script>
'; 
*/
?>	 
		 
		 
		 
		 <footer class="container-fluid padding">
    <div class="row">
      <div class="col-sm-4 text-center">
		<h4 style="padding:20px 10px 10px 10px">Încă de la înființare din 2008, 
		AUDIO FILA a fost dedicat utilizatorilor,
        oferind cele mai înalte standarde</h4>
	
	  </div>
	  
	   <div class="col-sm-4 text-center social">
	     <h3>Rămâi conectat</h3>
		 <a href="#" class="fa fa-facebook"></a>
		 <a href="#" class="fa fa-twitter"></a>
		 <a href="#" class="fa fa-google-plus"></a>
		 <a href="#" class="fa fa-imdb"></a>
		 <a href="#" class="fa fa-youtube"></a>
	   </div>
	   
	    <div class="col-sm-4 text-center contact">
	    <h3>Date de contact</h3>
		<a href="#" class="fa fa-home"> AUDIO FILA com Sighișoarei nr. 23</a><br>
		<a href="#" class="fa fa-phone"> 0756-599-566</a><br>
		<a href="mailto:sebi.paul121@gmail.com" class="fa fa-envelope"> sebi.paul121@gmail.com</a>
	  </div>
    </div>
	<div class="row footer_jos">
	   <div class="col-sm-6 text-center">
	    <h5>Copyright © 2019. Toate drepturile rezervate AudioFila.com</h5>
	  </div>
	  <div class="col-sm-6 text-center">
	    <h5>Termeni și condiții | Politica de confidențialitate</h5>
	  </div>
	</div>
	
</footer>
		 
		 
		 
<script>
function hideMessage() {
  document.getElementById("connectMsg").style.display = "none"
};
setTimeout(hideMessage,2000);




</script>

</body>
</html>