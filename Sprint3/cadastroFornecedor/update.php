<?php
session_start();

include "connection.php";

if(isset($_GET['id_fornecedor'])){
    $id_fornecedor = $_GET['id_fornecedor'];
    $sql = "SELECT * FROM fornecedor WHERE id_fornecedor=$id_fornecedor";

    $result = $conn->query($sql);
    $fornecedor = $result->fetch_assoc();
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST['nome'];
    $cnpj = $_POST['cnpj'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $observacao = $_POST['observacao'];
    $sql = "UPDATE fornecedor SET nome='$nome', cnpj='$cnpj', endereco='$endereco', telefone='$telefone', email='$email', observacao='$observacao' WHERE id_fornecedor=$id_fornecedor";

    if ($conn->query($sql) === TRUE){
        header("Location: cadastroFornecedor.php");
    } else{
        echo "Erro: " . $conn->error;
    }
}

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
        <span></span>
        <img src="img/logo.png" alt="logo" class="updImg">
        <a href="cadastroFornecedor.php" class="logout"><i class="fa-solid fa-arrow-right-from-bracket"></i>Voltar</a>
    </header>
    <main>
        <section id="sec1update">
            <div class="w-100 form-container">
                <form action="" method="post">
                    <h1 class="mb-4 p-3 text-center bg-dark" id="teste">Editar Fornecedor</h1>
                    <div class="nomeCpf mb-3">
                        <div class="form-floating">
                            <input type="text" name="nome" class="form-control" id="floatingInput" placeholder="Digite o nome" maxlength="50" required value="<?= $fornecedor['nome']; ?>">
                            <label for="floatingInput">Nome</label>
                        </div>
                        <div class="form-floating" id="input2">
                            <input type="text" name="cnpj" class="form-control" id="floatingInput" placeholder="Digite o CNPJ" maxlength="11" required value="<?= $fornecedor['cnpj']; ?>">
                            <label for="floatingInput">CNPJ</label>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="endereco" class="form-control" id="floatingInput" placeholder="Digite o Endereço" maxlength="200" required value="<?= $fornecedor['endereco']; ?>">
                        <label for="floatingInput">Endereço</label>
                    </div>
                    <div class="telEmail mb-3">
                        <div class="form-floating">
                            <input type="text" name="telefone" class="form-control" id="floatingInput" placeholder="Digite o telefone" maxlength="11" required value="<?= $fornecedor['telefone']; ?>">
                            <label for="floatingInput">Telefone</label>
                        </div>
                        <div class="form-floating" id="input2">
                            <input type="text" name="email" class="form-control" id="floatingInput" placeholder="Digite o email" maxlength="100" required value="<?= $fornecedor['email']; ?>">
                            <label for="floatingInput">E-mail</label>
                        </div>
                    </div>
                    <div class="areaContainer form-floating">
                        <input type="text" name="observacao" class="form-control" id="floatingInput" placeholder="Digite as observacoes" required value="<?= $fornecedor['observacao']; ?>">
                        <label for="floatingInput">Observações</label>
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
                    <li><a href="">Fornecedores</a></li>
                    <li><a href="">Franquias</a></li>
                </ul>
            </div>
            <div class="footerBottom"><p>Copyright &copy;2025 EclypseTech</p></div>
        </div>
    </footer>
</body>
</html>