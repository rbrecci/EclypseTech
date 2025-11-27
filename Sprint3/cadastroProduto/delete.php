<?php

include "connection.php";

if(isset($_GET['id_produto'])){
    $id_produto = $_GET['id_produto'];
    $sql = "DELETE FROM produto WHERE id_produto=$id_produto";

    if($conn->query($sql) === TRUE){
        header("location: cadastroProduto.php");
    } else{
        echo "Erro: " . $conn->error;
    }
}