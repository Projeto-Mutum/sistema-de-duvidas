<?php

$host= "localhost";
$db  = "form_duvidas";
$user = "root";
$pass = "";

$mysqli = new mysqli($host, $user, $pass, $db);
mysqli_set_charset($mysqli, "utf8");
  if($mysqli->connect_errno){
    die("Erro ao acesar o banco de dados.");
  }
