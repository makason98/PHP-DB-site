<?php
  session_start();
  require 'connect.php';
  
  $id = $_GET['prod'];
  
  $sql = "DELETE FROM produse WHERE id='$id'";
  $result = mysqli_query($conectare, $sql);

  header("Location: ../index.php");