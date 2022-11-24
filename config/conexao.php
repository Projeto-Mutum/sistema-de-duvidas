<?php

$host= "localhost";
$db  = "info_docentes";
$user = "root";
$pass = "";

$mysqli = new mysqli($host, $user, $pass, $db);
  if($mysqli->connect_errno){
    die("Erro ao acesar o banco de dados.");
  }
