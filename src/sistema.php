<?php
include('honey.php');
include('../config/conexaoalunos.php');

$sql_code = "SELECT * FROM duvidas_alunos ";

if (isset($_POST['pesquisar'])) {
    $materiaPesquisada = $mysqli->real_escape_string($_POST['caixaPesquisa']);
    $sql_code .= "WHERE materia = '{$materiaPesquisada}'";

}

$sql_query = $mysqli->query($sql_code) or die("Falha na execução" . $mysqli->error);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/styleSistema.css">
    <title>Painel das dúvidas</title>
</head>

<body>
    <div class="login-area">
        <div class="login">
            <h1>Bem-vindo,
                <?php echo $_SESSION['user']; ?>
            </h1>
            <form action="" method="POST">
                <input type="text" name="caixaPesquisa" placeholder="Procure uma matéria" value="" />
                <input type="submit" name="pesquisar" value="Pesquisar" />
            </form>
            <table width="100%" cellpadding="5" cellspace="5">
                <tr>
                    <td><strong>Nome</strong></td>
                    <td><strong>Sala</strong></td>
                    <td><strong>Materia</strong></td>
                    <td><strong>Duvida<strong></td>
                </tr>
                <tr>
                    <?php while ($row = $sql_query->fetch_array()) { ?>
                    <td>
                        <?php echo $row['nome']; ?>
                    </td>
                    <td>
                        <?php echo $row['sala']; ?>
                    </td>
                    <td>
                        <?php echo $row['materia']; ?>
                    </td>
                    <td>
                        <?php echo $row['duvida']; ?>
                    </td>
                <tr>
                    <?php } ?>
            </table>
            <p>
                <a href="../logout.php">Sair</a>
            </p>
        </div>

    </div>

</body>

</html>