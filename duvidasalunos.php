<?php
  include('config/conexaoalunos.php');
  $erro = false;
  if(count($_POST) > 0){
    $nome = $_POST['nomeDoAluno'];
    $salaDeAula = $_POST['salaDeAula'];
    $materia = $_POST['materia'];
    $textoDuvida = $_POST['textoDuvida'];

    if(empty($salaDeAula)){
      $erro = "Por favor, identifique sua sala";
    }

    if(empty($materia)){
      $erro = "Por favor, diga de qual matéria é sua dúvida";
    }
    
    if(strlen($textoDuvida) < 10){
        $erro = "Escreva com mais detalhes sua dúvida";
    }

  if($erro){
    echo "<p><b>$erro</b></p>";
  }else{
    $codigo_sql = "INSERT INTO duvidas_alunos (nome, sala, materia, duvida) VALUES('$nome', '$salaDeAula', '$materia', '$textoDuvida')";
    $conectado = $mysqli->query($codigo_sql) or die($mysqli);
    if($conectado){
      echo "Sua dúvida foi enviada";
      unset($_POST);
    }
  }
}  
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="./style/styleAlunos.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <title></title>
</head>
<body>
  <div class="login-area"> 
    <div class="login">
        <div>
            <i class="fa-solid fa-clipboard-question"></i>
        </div>
    <h1>Deixe sua dúvida</h1>
    <form method="POST" action="">
        <input name="nomeDoAluno" type="text" placeholder="Fulano Alberto" value="<?php if(isset($_POST['nomeDoAluno'])) echo $_POST['nomeDoAluno'] ?>">
        <input name="salaDeAula" type="text" placeholder="2A" value="<?php if(isset($_POST['salaDeaula'])) echo $_POST['salaDeAula'] ?>">
        <input name="materia" type="text" placeholder="Matemática" value="<?php if(isset($_POST['materia'])) echo $_POST['materia'] ?>">
        <input name="textoDuvida" type="text" placeholder="Escreva aqui sua dúvida" value="<?php if(isset($_POST['textoDuvida'])) echo $_POST['textoDuvida'] ?>"</input>
        <input type="submit" value="Enviar"></input>
    </form>  
  </div>
</body>
</html>
