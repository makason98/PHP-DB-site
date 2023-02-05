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
		echo'
		     <li><a href="cos.php"><span class="glyphicon glyphicon-shopping-cart"></span> <div class="numberCircle">'.$row["max"].'</div></a></li>
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
         <div class="border">
         </div>
		 </div>
		 
		 
		 
<?php
include 'slideshow.php';
require 'connect.php';
if (!empty($_GET['cos'])) {$x = $_GET['cos'];}


$sql = "SELECT  c.id, t.tipul as tipp ,b.brand as brandd, p.model, p.pret
        FROM cos c 
		JOIN produse p ON c.id_produs = p.id
		JOIN tip t ON t.id = p.tip
		JOIN brand b ON b.id = p.brand
		ORDER BY data ";
$result = mysqli_query($conectare, $sql);


echo'
<div class="container de_cos">
<div class="row cos_cumparaturi">COS CUMPARATURI</div>
';

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
		
		echo '
	
        <div class="container_cos">
		<div class="one"><p>'.$row["tipp"].'   '.$row["brandd"].'   '.$row["model"].' </p></div>
		<div class="two"><a class="glyphicon glyphicon-remove" href="sterge.php?sterge='.$row["id"].'"></a></div>
		<div class="three"><p>   '.$row["pret"].' lei </p></div>
		
		</div>


		';
    }
} else {
    echo " <p>COSUL ESTE GOL</p>";
}

$sql = "SELECT SUM(p.pret) AS value_sum FROM cos c JOIN produse p ON c.id_produs = p.id";
$result = mysqli_query($conectare, $sql);
$row = $result->fetch_assoc();

if (empty($_GET['cos'])) {
     echo'<a style="float:left; margin:0 0 0 -15px;" class="glyphicon glyphicon-arrow-left" href="../index.php">  </a>
   <p style="float:left;"><b>CONTINUA CUMPARATURILE</b></p>';
}else{
	
	echo'<a style="float:left; margin:0 0 0 -15px;" class="glyphicon glyphicon-arrow-left" href="obiect.php?prod='.$x.'">  </a>
 <p style="float:left;"><b>CONTINUA CUMPARATURILE</b></p>';
 
 }

echo'
 <p style="float:right; color: #ff6666; margin: 0 34px 0 0;"><b>SUB TOTAL : '.$row["value_sum"].' lei</b></p>
</div>
';
$total = $row["value_sum"];
?>


<div class="container text-center ultimele_adaugate">
         <div class="border">
           <h1>Plata si facturare</h1>
         </div>
		 </div>
		 
		 
<div class="container cumpara">
<form action="trimite.php?total=<?php echo $total; ?>" id="f_facturare" method="POST">

<div class="row">

<div class="col-sm-4">
<div class="col-sm-12 optiuni">
  <h4>Modalitati de plata</h4>
  <input type="radio" name="plata" value="ramburs"> Plata la livrare<br>
  <input type="radio" name="plata" value="online"> Plata online cu cardul - mai multe <a href="#">AICI</a><br>
</div>
</div>

<div class="col-sm-4">
<div class="col-sm-12 optiuni date">
<h4>Date de facturare</h4>
  <p>Email*</p>
  <input type="email" name="emailaddress"><br>
  <p>Judet*</p>
  <input type="text" name ="judet"><br>
  <p>Localitate/Sector*</p>
  <input type="text" name ="localitate"><br>
   <p>Strada*</p>
  <input type="text" name ="strada"><br>
   <p>Nr*</p>
  <input type="text" name ="nr"><br>
  <p>Bloc</p>
  <input type="text" name ="bloc"><br>
  <p>Cod postal*</p>
  <input type="text" name ="cod_postal"><br>
  <p>Numar de telefon*</p>
  <input type="text" name ="numar_de_telefon"><br>
</div>
</div>


<div class="col-sm-4">
<div class="col-sm-12 optiuni">
  <h4>Termeni si conditii</h4>
  <p>Observatii</p>
  <textarea style="width:100%;" name="observatii" form="f_facturare"></textarea> 
  <input type="checkbox" name="termeni" value="de_acord">Sunt de acord cu <a>Termenii si Conditiile*</a><br>
  <input type="checkbox" name="termenii" value="de_acord">Sunt de acord  sa fiu contactat telefonic si prin posta pentru a fi informat despre promotiile Audio Fila<br>
  <?php echo '<p style="color: red "><b>TOTAL '.$total.' lei</b></p>'; ?>
  <input type="submit" value="Trimite">
 
</div>
</div>

</div>
</form>
</div>
<?php
if(isset($_GET['info'])&& $_GET['info'] == 'eroare')
	{
		echo '<p id="connectMsg" style="text-align: center; color: red ">Completati toate campurile</p>';
	}
	
	?>

<br><br>
		  
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