<?php

$conectare = mysqli_connect('localhost', 'root', '', 'autentificare' );
if(!$conectare){
	die(mysqli_connect_error()) ;
}