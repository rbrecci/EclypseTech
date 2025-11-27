<?php
session_start();

include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_usuario = $_POST['nome_usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $sqlLogin = "SELECT * FROM usuario WHERE nome_usuario = '$nome_usuario' AND senha = '$senha'";
    $resultado = $conn->query($sqlLogin);

    if ($resultado && $resultado->num_rows > 0) {
        $_SESSION['usuario'] = $nome_usuario;
        header("Location: ../main/main.php");
        exit;
    } else {
        header("Location: ../login/loginPageError.php");
        exit;
    }
}

$conn->close();