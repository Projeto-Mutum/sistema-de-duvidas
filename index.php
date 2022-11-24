<?php
include('config/conexao.php');
if (isset($_POST['user']) || isset($_POST['senha'])) {
  $user = $_POST['user'];
  $senha = $_POST['senha'];
  if (empty($user) || empty($senha)) {
    echo "<p><b>Erro ao logar, tente novamente.</b></p>";
  } else {
    $user = $mysqli->real_escape_string($user);
    $senha = $mysqli->real_escape_String($senha);

    $sql_code = "SELECT * FROM dados_docentes WHERE user = '$user'";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução" . $mysqli->error);

    $quantidade = $sql_query->num_rows;

    if ($quantidade == 1) {
      $conta = $sql_query->fetch_assoc();

      if (!isset($_SESSION)) {
        session_start();
      }

      if (password_verify($senha, $conta['senha'])) {
        header("Location: src/sistema.php");
      }
      $_SESSION['id'] = $conta['id'];
      $_SESSION['user'] = $conta['user'];


    }
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="./style/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  
  <title></title>
</head>

<body>
  <div class="login-area">
    <div class="login">
      <div>
        <i class="fa-solid fa-user"></i>
      </div>
      <h1>Login de docentes</h1>
      <form method="POST" action="">
        <input name="user" type="text" placeholder="Nome de usuário" value="<?php if (isset($_POST['user'])) echo $_POST['user']?>"></input>
        <input name="senha" type="password" placeholder="Senha" value="<?php if (isset($_POST['senha'])) echo $_POST['senha']?>"></input>
        <input type="submit" value="Enviar"></input>
      </form>
      <p>Não possui uma conta? <a href="./public/cadastro.php">Cadastre-se</a><br></p>
    </div>
  </div>
</body>

</html>
