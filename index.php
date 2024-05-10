<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro e Login</title>
</head>
<body>
    <h2>Cadastrado de Usuário</h2>
    <form action="usuario.php" method="post">
        <input type="text" name="nome" placeholder="Nome" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="senha" placeholder="Password" required><br>
        <input type="submit" name="cadastrar" value="Cadastrar">
    </form>
    <form action="usuario.php" method="post">
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="senha" placeholder="Password" required><br>
        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>