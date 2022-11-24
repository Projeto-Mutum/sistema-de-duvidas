<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id'])) {
    die('
        <!DOCTYPE html>
            <html">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="../style/style.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

                
            </head>
            <body>
            <div class="login-area">
                <div class="login">
                    <div>
                        <i class="fa-solid fa-circle-xmark error"></i>
                    </div>
                <h1><span>Erro!</span></h1>    
                <p>Para evitar futuros problemas de segurança, você só poderá acessar o painel se estiver logado! 
                <form action="../index.php">
                  <input type="submit" value="Logar"/>
                </form>
                </div>
            </div>
            </body>
            </html>');
}
?>