<?php

include "connection.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $nome = $_POST['nome'];
    $cnpj = $_POST['cnpj'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $observacao = $_POST['observacao'];

    $sql = "INSERT INTO fornecedor (nome, cnpj, endereco, telefone, email, observacao) VALUES ('$nome', '$cnpj', '$endereco', '$telefone', '$email', '$observacao')";

    if($conn->query($sql) === TRUE){
        header("location: cadastroFornecedor.php");
    } else{
        echo "Erro: " . $conn->error;
    }
}