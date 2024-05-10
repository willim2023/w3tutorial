<?php
session_start();

// Verifica se o usuário está autenticado
if(!$_SESSION['token']) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Protegida</title>
</head>
<body>
    <h1>bem vindo a pagina protegida!!!!!!</h1>
</body>
</html>