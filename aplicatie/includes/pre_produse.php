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

  
    <!--<nav class="navbar navbar-inverse">
     <div class="container-fluid">
      <div class="navbar-header">
       <a href="index.php" class="navbar-brand" href="#">WebSiteName</a>
      </div>
    <ul class="nav navbar-nav">
	 <li><a href="#">Produse</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
	
    </ul>
  </div>
</nav>-->

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



<div class="container text-center ultimele_adaugate">
<div class="row">
         
           <h1>Casti audio</h1>
        
		 </div>
		 </div>
		 
		 
		 
		 
		 
		 
		 
<?php

include 'slideshow.php';
require 'connect.php';

?>


 
 <div class="container produsele">
 <div class="row">
 
  <div class="col-md-4">
 <div class="col-sm-12 produs1">   
 <h4>ORDONEAZA DUPA </h4>

 <a href="pre_produse.php?tip= <?php echo "brandd" ?>" class="col-sm-12 ordoneaza"> BRAND</a>
 <a href="pre_produse.php?tip= <?php echo "prett" ?>" class="col-sm-12 ordoneaza"> PRET</a>
</div>

<div class="col-sm-12 produs1">   
 <h4>FILTREAZA DUPA BRAND </h4>
 
 <a href="pre_produse.php?tip= <?php echo "1" ?>" class="col-sm-12 ordoneaza"> SONNY</a>
 <a href="pre_produse.php?tip= <?php echo "2" ?>" class="col-sm-12 ordoneaza"> AUDIO- TEHNICA</a>
 <a href="pre_produse.php?tip= <?php echo "3" ?>" class="col-sm-12 ordoneaza"> SENNHEISER</a>
</div>


  </div>
 <div class="col-md-8 no_padding">
 
<?php
if (!isset($_GET['tip'])){
$_GET['tip'] = 1;
$x = "greutate";}
else {
$x = $_GET['tip'];}


if($x != 1 && $x != 2 && $x != 3 ){
$sql = "SELECT p.id as idul, t.tipul as tipp ,b.brand as brandd, p.model, p.pret as prett, p.pic_link 
FROM produse p 
JOIN tip t ON t.id = p.tip 
JOIN brand b ON b.id = p.brand 
WHERE tip = 1 
ORDER BY $x ";
} else {
$sql = "SELECT p.id as idul, t.tipul as tipp ,b.brand as brandd, p.model, p.pret as prett, p.pic_link 
FROM produse p 
JOIN tip t ON t.id = p.tip 
JOIN brand b ON b.id = p.brand 
WHERE p.brand = $x AND tip = 1";
}
		
$result = mysqli_query($conectare, $sql);


if ($result->num_rows > 0) {
  
    while($row = $result->fetch_assoc()) {
		
		echo '
		
		<div class="col-sm-3 col-sm-4 col-xs-6 col-xs-12 ">
          <div class="col-sm-12 produs2">   
		 
		<a href="obiect.php?prod= '.$row["idul"].'">
		<img width="100%" src="../imagini/'.$row["pic_link"].'"> <p>'. $row["tipp"]. ' '. $row["brandd"]. ' ' . $row["model"] . '</p>
		<p style="    color: #ff6666; float: right; bottom: 0; right: 0; padding: 0 10px 5px 0; position: absolute;"><b>'.$row["prett"].' lei</b></p>
		</a>
		</div></div>
		
		';
    }
} else {
    echo "0 results";
}
 ?>
 </div>
 </div>
  </div>

 
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