<?php
include('../config/conexao.php');
    
    $erro = false;
    if(count($_POST) > 0){
        $user = $_POST['user'];
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    if(empty($user)){
        $erro = "Coloque um nome de usuário!";
    }

  
    if(empty($senha)){
      $erro = "Insira uma senha válida!";
    }

    if($erro){
        echo "<p><b>$erro</b></p>";
    }else{
        $codigo_sql = "INSERT INTO dados_docentes(user, senha) VALUES('$user', '$senha')";
        $conectado = $mysqli->query($codigo_sql) or die($mysqli);
    if($conectado){
      unset($_POST);
    }
  }
}  
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../style/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <title></title>
</head>
<body>
    <div class="login-area">
        <div class="login">
            <div>
                <i class="fa-solid fa-id-card"></i>
            </div>
    <h1>Cadastro de docentes</h1>
    <form method="POST" action="">
        <input name="user" type="text" placeholder="Crie um nome de usuário" value="<?php if(isset($_POST['user'])) echo $_POST['user'] ?>">
        <input name="senha" type="password" placeholder="Crie uma senha segura" value="<?php if(isset($_POST['senha'])) echo $_POST['senha'] ?>">
        <input type=submit value="Enviar"></input>
    </form>  
        <p>Já possui uma conta? <a href="../index.php">Logar</a><br>
      </p>
  </div>
</body>
</html>
