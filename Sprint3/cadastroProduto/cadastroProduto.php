<?php
session_start();

include "connection.php";

$sqlProdutos = "CREATE TABLE IF NOT EXISTS produto(
    id_produto int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome varchar(50) NOT NULL,
    descricao text,
    fornecedor int NOT NULL,
    preco_unit decimal(10,2) NOT NULL,
    qtd_estoque int DEFAULT NULL,
    foto_produto LONGBLOB,

    FOREIGN KEY (fornecedor) REFERENCES fornecedor(id_fornecedor) ON DELETE CASCADE
)";

$conn->query($sqlProdutos);

$sqlProdutos = "SELECT * FROM produto";
$resultProdutos = $conn->query($sqlProdutos);

$sqlFornecedores = "SELECT * FROM fornecedor";
$resultFornecedores = $conn->query($sqlFornecedores);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Fornecedores</title>
    <link rel="icon" type="image/x-icon" href="img/icone.jpg">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"> <a class="nav-link" href="#sec1">Cadastro</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="#sec2">Listagem</a> </li>
                    </ul>
                </div>
            </div>
        </nav>
        <img src="img/logo.png" alt="logo">
        <a href="../main/main.php" class="logout"><i class="fa-solid fa-arrow-right-from-bracket"></i>Voltar</a>
    </header>
    <main>
        <section id="sec1">
            <div class="w-100 form-container">
                <form action="store.php" method="POST" enctype="multipart/form-data">
                    <h1 class="mb-4 p-3 text-center bg-dark" id="teste">Cadastro de Produtos</h1>
                    <div class="nomeCpf mb-3">
                        <div class="form-floating">
                            <input type="text" name="nome" class="form-control" id="floatingInput" placeholder="Digite o nome" required>
                            <label for="floatingInput">Nome</label>
                        </div>
                        <select name="fornecedor" id="fornecedor" class="form-floating">
                            <option value="">Selecione um fornecedor</option>
                            <?php while($row = $resultFornecedores->fetch_assoc()): ?>
                                <option value="<?= $row["id_fornecedor"] ?>">
                                    <?= $row["nome"] ?>
                                </option>
                            <?php endwhile ?>
                        </select>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="descricao" class="form-control" id="floatingInput" placeholder="Digite a Descrição" required>
                        <label for="floatingInput">Descrição</label>
                    </div>
                    <div class="telEmail mb-3">
                        <div class="form-floating">
                            <input type="number" name="qtd_estoque" class="form-control" id="floatingInput" placeholder="Digite a quantidade em estoque" required>
                            <label for="floatingInput">Qtd. Estoque</label>
                        </div>
                        <div class="form-floating" id="input2">
                            <input type="number" step="0.01" min="0.01" max="99999999.99" name="preco_unit" class="form-control" id="floatingInput" placeholder="Digite o email" required>
                            <label for="floatingInput">Preço Unit.</label>
                        </div>
                    </div>
                    <div class="imageArea mt-3">
                        <input type="file" id="foto_produto" name="foto_produto" accept="image/*" required>
                    </div>
                    <div class="buttonContainer mt-3">
                        <button type="submit" class="btn py-2 mb-3">Cadastrar</button>
                    </div>
                </form>
            </div>
        </section>
        <section id="sec2">
            <h2 class="mb-4 mt-5">Listagem de Produtos</h2>
            <div class="tableContainer">
                <table class="table">
                    <thead class="table-dark">
                        <th>Nome</th>
                        <th>Código</th>
                        <th>Descrição</th>
                        <th>Fornecedor</th>
                        <th>Preço Unit.</th>
                        <th>Qtd. Estoque</th>
                        <th>Imagem</th>
                        <th>Ações</th>
                    </thead>
                    <tbody class="table-light">
                        <?php while($row = $resultProdutos->fetch_assoc()): ?>
                            <tr>
                                <td><?= $row["nome"] ?></td>
                                <td><?= $row["id_produto"] ?></td>
                                <td><?= $row["descricao"] ?></td>
                                <td><?= $row["fornecedor"] ?></td>
                                <td><?= $row["preco_unit"] ?></td>
                                <td><?= $row["qtd_estoque"] ?></td>
                                <td><img src="uploads/<?= $row['foto_produto'] ?>"></td>
                                <td>
                                    <a href="update.php?id_produto=<?= $row['id_produto'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="delete.php?id_produto=<?= $row['id_produto'] ?>"><i class="fa-solid fa-trash" style="color: #f50000;"></i></a>
                                </td>
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
    <footer>
        <div class="footerContainer">
            <div class="socialIcons">
                <a href="https://www.facebook.com/pecararabsb"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://www.instagram.com/pecararabr"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://x.com/pecararabrecho"><i class="fa-brands fa-twitter"></i></a>
            </div>
            <div class="footerNav">
                <ul>
                    <li><a href="https://site.pecararabrecho.com.br/sobre-nos">Sobre Nós</a></li>
                    <li><a href="https://site.pecararabrecho.com.br/fornecedores">Fornecedores</a></li>
                    <li><a href="https://sejafranqueado.pecararabr.com.br/sejafranqueado">Franquias</a></li>
                </ul>
            </div>
            <div class="footerBottom"><p>Copyright &copy;2025 EclypseTech</p></div>
        </div>
    </footer>
</body>
</html>