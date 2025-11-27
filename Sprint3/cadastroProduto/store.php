<?php

include "connection.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $nome = $_POST['nome'];
    $fornecedor = $_POST['fornecedor'];
    $preco_unit = $_POST['preco_unit'];
    $qtd_estoque = $_POST['qtd_estoque'];
    $descricao = $_POST['descricao'];
    $foto_produto = $_FILES['foto_produto'];

    $nomeArquivo = uniqid() . "_" . basename($foto_produto["name"]);
    $diretorio = "uploads/";
    $caminho = $diretorio . $nomeArquivo;

    if (!is_dir($diretorio)) {
        mkdir($diretorio, 0777, true);
    }

    if (!move_uploaded_file($foto_produto["tmp_name"], $caminho)) {
        die("Erro ao salvar a imagem.");
    }

    $sqlProduto = "INSERT INTO produto (nome, fornecedor, preco_unit, qtd_estoque, descricao, foto_produto) 
    VALUES ('$nome', '$fornecedor', '$preco_unit', '$qtd_estoque', '$descricao', '$nomeArquivo')";

    if($conn->query($sqlProduto) === TRUE){
        header("location: cadastroProduto.php");
    } else{
        echo "Erro: " . $conn->error;
    }
}