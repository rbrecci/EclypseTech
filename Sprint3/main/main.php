<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../login/loginPage.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main page Peça Rara</title>
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
                        <li class="nav-item"> <a class="nav-link" href="#sec1">Fornecedores</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="#sec2">Produtos</a> </li>
                    </ul>
                </div>
            </div>
        </nav>
        <img src="img/logo.png" alt="logo">
        <a href="../login/loginPage.php" class="logout"><i class="fa-solid fa-arrow-right-from-bracket"></i>Sair</a>
    </header>
    <main class="w-100">
        <section id="sec1">
            <div class="text">
                <h1>Cadastro de Fornecedores</h1>
                <p>Registre e gerencie as informações dos fornecedores que abastecem o Peça Rara Brechó. Cadastre dados essenciais como nome, contato e CNPJ, garantindo um controle organizado e atualizado das parcerias comerciais.</p>
                <a href="/definitivo/cadastroFornecedor/cadastroFornecedor.php">Acesse</a>
            </div>
        </section>
        <section id="sec2">
            <div class="text">
                <h1>Cadastro de Produtos</h1>
                <p>Inclua novos itens no catálogo do brechó, vinculando cada produto ao seu respectivo fornecedor. Registre detalhes como nome, categoria, preço e quantidade em estoque, mantendo o inventário sempre completo e preciso.</p>
                <a href="/definitivo/cadastroProduto/cadastroProduto.php">Acesse</a>
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