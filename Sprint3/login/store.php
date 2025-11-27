<?php
session_start();

include "connection.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome_usuario = $_POST['nome_usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $verify = "SELECT * FROM usuario WHERE nome_usuario = '$nome_usuario'";
    $result = $conn->query($verify);

    if($nome_usuario === '' || $senha === ''){
        header("location: cadastroNull.php");
        exit;
    } else if($result && $result->num_rows > 0){
        header("location: cadastroError.php");
        exit;
    } else {
        $sqlCadastro = "INSERT INTO usuario (nome_usuario, senha) VALUES ('$nome_usuario', '$senha')";

        if($conn->query($sqlCadastro) === TRUE){
            header("location: loginPage.php");
        } else{
            echo "Erro: " . $conn->error;
        }
    }
}

$conn->close();