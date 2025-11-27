<?php
session_start();

include "connection.php";

$sql = "CREATE TABLE IF NOT EXISTS fornecedor(
    id_fornecedor int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome varchar(50) NOT NULL,
    cnpj varchar(20) DEFAULT NULL,
    endereco varchar(200) NOT NULL,
    telefone varchar(20) DEFAULT NULL,
    email varchar(100) NOT NULL,
    observacao text
)";

$conn->query($sql);

$sql = "SELECT * FROM fornecedor";
$result = $conn->query($sql);

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
                <form action="store.php" method="post">
                    <h1 class="mb-4 p-3 text-center bg-dark" id="teste">Cadastro de Fornecedores</h1>
                    <div class="nomeCpf mb-3">
                        <div class="form-floating">
                            <input type="text" name="nome" class="form-control" id="floatingInput" placeholder="Digite o nome" maxlength="50" required>
                            <label for="floatingInput">Nome</label>
                        </div>
                        <div class="form-floating" id="input2">
                            <input type="text" name="cnpj" class="form-control" id="floatingInput" placeholder="Digite o CNPJ" maxlength="11" required>
                            <label for="floatingInput">CNPJ</label>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="endereco" class="form-control" id="floatingInput" placeholder="Digite o Endereço" maxlength="200" required>
                        <label for="floatingInput">Endereço</label>
                    </div>
                    <div class="telEmail mb-3">
                        <div class="form-floating">
                            <input type="text" name="telefone" class="form-control" id="floatingInput" placeholder="Digite o telefone" maxlength="11" required>
                            <label for="floatingInput">Telefone</label>
                        </div>
                        <div class="form-floating" id="input2">
                            <input type="text" name="email" class="form-control" id="floatingInput" placeholder="Digite o email" maxlength="100" required>
                            <label for="floatingInput">E-mail</label>
                        </div>
                    </div>
                    <div class="areaContainer form-floating">
                        <input type="text" name="observacao" class="form-control" id="floatingInput" placeholder="Digite as observacoes" required>
                        <label for="floatingInput">Observações</label>
                    </div>
                    <div class="buttonContainer mt-3">
                        <button type="submit" class="btn py-2 mb-3">Cadastrar</button>
                    </div>
                </form>
            </div>
        </section>
        <section id="sec2">
            <h2 class="mb-4 mt-5">Listagem de Fornecedores</h2>
            <div class="tableContainer">
                <table class="table">
                    <thead class="table-dark">
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Cnpj</th>
                        <th>Endereço</th>
                        <th>E-mail</th>
                        <th>Telefone</th>
                        <th>Observações</th>
                        <th>Ações</th>
                    </thead>
                    <tbody class="table-light">
                        <?php while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= $row["id_fornecedor"] ?></td>
                                <td><?= $row["nome"] ?></td>
                                <td><?= $row["cnpj"] ?></td>
                                <td><?= $row["endereco"] ?></td>
                                <td><?= $row["email"] ?></td>
                                <td><?= $row["telefone"] ?></td>
                                <td><?= $row["observacao"] ?></td>
                                <td>
                                    <a href="update.php?id_fornecedor=<?= $row['id_fornecedor'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="delete.php?id_fornecedor=<?= $row['id_fornecedor'] ?>"><i class="fa-solid fa-trash" style="color: #f50000;"></i></a>
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