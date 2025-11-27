<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Peça Rara</title>
    <link rel="icon" type="image/x-icon" href="img/icone.jpg">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <span></span>
        <img src="img/logo.png" alt="logo">
        <a href="loginPage.php" class="logout"><i class="fa-solid fa-arrow-right-from-bracket"></i>Voltar</a>
    </header>
    <main class="bg-body-tertiary w-100">
        <div class="w-100 form-container" id="container-cadastro">
            <form action="store.php" method="POST">
                <h1 class="mb-4 p-3 text-center bg-dark" id="teste">Cadastro</h1>
                <h2 class="h3 fw-normal fs-5 text-center">Insira suas informações abaixo</h2>
                <div class="alert alert-danger" role="alert">Preencha os dados corretamente</div>
                <div class="form-floating mb-3 mt-3">
                    <input type="text" name="nome_usuario" class="form-control" id="floatingInput" placeholder="Digite seu usuário" required>
                    <label for="floatingInput">Usuário</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="senha" class="form-control" id="floatingInput" placeholder="Digite sua senha" required>
                    <label for="floatingInput">Senha</label>
                </div>
                <div class="buttons">
                    <button type="submit" class="btn btn-primary py-2 mb-3">Cadastrar</button>
                </div>
            </form>
        </div>
    </main>
    <footer>
        <div class="footerContainer">
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