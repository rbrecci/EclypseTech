<?php

include "connection.php";

if(isset($_GET['id_fornecedor'])){
    $id_fornecedor = $_GET['id_fornecedor'];
    $sql = "DELETE FROM fornecedor WHERE id_fornecedor=$id_fornecedor";

    if($conn->query($sql) === TRUE){
        header("location: cadastroFornecedor.php");
    } else{
        echo "Erro: " . $conn->error;
    }
}