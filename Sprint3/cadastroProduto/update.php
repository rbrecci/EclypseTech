<?php
session_start();

include "connection.php";

if(isset($_GET['id_produto'])){
    $id_produto = $_GET['id_produto'];
    $sqlProduto = "SELECT * FROM produto WHERE id_produto = $id_produto";

    $result = $conn->query($sqlProduto);
    $produto = $result->fetch_assoc();
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $nome = $_POST['nome'];
    $fornecedor = $_POST['fornecedor'];
    $preco_unit = $_POST['preco_unit'];
    $qtd_estoque = $_POST['qtd_estoque'];
    $descricao = $_POST['descricao'];
    $foto_produto = $_FILES['foto_produto'];
    $sqlProduto = "UPDATE produto SET nome='$nome', fornecedor='$fornecedor', preco_unit='$preco_unit', qtd_estoque='$qtd_estoque', descricao='$descricao', foto_produto='$foto_produto' WHERE id_produto=$id_produto";

    if ($conn->query($sqlProduto) === TRUE){
        header("Location: cadastroProduto.php");
    } else{
        echo "Erro: " . $conn->error;
    }
}

$sqlFornecedores = "SELECT * FROM fornecedor";
$resultFornecedores = $conn->query($sqlFornecedores);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro produtoes</title>
    <link rel="icon" type="image/x-icon" href="img/icone.jpg">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <span></span>
        <img src="img/logo.png" alt="logo" class="updImg">
        <a href="cadastroProduto.php" class="logout"><i class="fa-solid fa-arrow-right-from-bracket"></i>Voltar</a>
    </header>
    <main>
        <section id="sec1" class="sec1Update">
            <div class="w-100 form-container">
                <form action="" method="POST" enctype="multipart/form-data">
                    <h1 class="mb-4 p-3 text-center bg-dark" id="teste">Editar Produto</h1>
                    <div class="nomeCpf mb-3">
                        <div class="form-floating">
                            <input type="text" name="nome" class="form-control" id="floatingInput" placeholder="Digite o nome" required value="<?= $produto['nome']; ?>">
                            <label for="floatingInput">Nome</label>
                        </div>
                        <select name="fornecedor" id="fornecedor" class="form-floating">
                            <option value="">Selecione um fornecedor</option>
                            <?php while($row = $resultFornecedores->fetch_assoc()): ?>
                                <option value="<?= $row["id_fornecedor"] ?>" selected>
                                    <?= $row["nome"] ?>
                                </option>
                            <?php endwhile ?>
                        </select>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="descricao" class="form-control" id="floatingInput" placeholder="Digite a Descrição" required value="<?= $produto['descricao']; ?>">
                        <label for="floatingInput">Descrição</label>
                    </div>
                    <div class="telEmail mb-3">
                        <div class="form-floating">
                            <input type="number" name="qtd_estoque" class="form-control" id="floatingInput" placeholder="Digite a quantidade em estoque" required value="<?= $produto['qtd_estoque']; ?>">
                            <label for="floatingInput">Qtd. Estoque</label>
                        </div>
                        <div class="form-floating" id="input2">
                            <input type="number" step="0.01" min="0.01" max="99999999.99" name="preco_unit" class="form-control" id="floatingInput" placeholder="Digite o email" required value="<?= $produto['preco_unit']; ?>">
                            <label for="floatingInput">Preço Unit.</label>
                        </div>
                    </div>
                    <div class="imageArea mt-3">
                        <input type="file" id="foto_produto" name="foto_produto" accept="image/*">
                    </div>
                    <div class="buttonContainer mt-3">
                        <button type="submit" class="btn py-2 mb-3">Atualizar</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <footer>
        <div class="footerContainer py-2">
            <div class="socialIcons">
                <a href=""><i class="fa-brands fa-facebook"></i></a>
                <a href=""><i class="fa-brands fa-instagram"></i></a>
                <a href=""><i class="fa-brands fa-twitter"></i></a>
            </div>
            <div class="footerNav">
                <ul>
                    <li><a href="">Sobre Nós</a></li>
                    <li><a href="">produtoes</a></li>
                    <li><a href="">Franquias</a></li>
                </ul>
            </div>
            <div class="footerBottom"><p>Copyright &copy;2025 EclypseTech</p></div>
        </div>
    </footer>
</body>
</html>