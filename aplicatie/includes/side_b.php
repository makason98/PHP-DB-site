<?php
session_start();
include 'slideshow.php';
$x = $_GET['cos'];
cos_cump($x, $_SESSION["id"]);