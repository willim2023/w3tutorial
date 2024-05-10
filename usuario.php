<?php 
session_start();

$conn = new mysqli("localhost", "root", "", "w3tutorial");

if($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Função para gerar um token
function generateToken() {
    return bin2hex(random_bytes(25));
}

// Cadastro de usuário
if($_POST['cadastrar']) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $token = generateToken(); // gera um token único

    $sql = "INSERT INTO usuarios (nome, email, senha, token) VALUES
             ('$nome', '$email', '$senha', '$token')";
            
    if($conn->query($sql) === TRUE) {
        echo "Usuário cadastrado com sucesso";
    } else {
        echo "Erro ao cadastrar o usuário";
    }
}

if($_POST['login']) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
 
    $sql = "SELECT * FROM usuarios WHERE email = '$email' ";
    $result = $conn->query($sql);
 
    if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    if(password_verify($senha, $row['senha'])){
        // Gerar um novo token no registro do usuárioi
        $token = generateToken();

        //Salvar esse novo token no registro do usuário
        $sql_update = "UPDATE usuarios SET token='$token' WHERE email='$email'";

        if($conn->query($sql_update) === TRUE) {
            $_SESSION['token'] = $row['token']; //Salva o token na sessão
            echo "Login bem sucedido!";
        } else {
            echo "Erro ao atualizar o token: " . $conn->error;
        }
       
    } else {
        echo "Login invalido";
    }
}
}