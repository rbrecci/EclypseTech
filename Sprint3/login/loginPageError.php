<?php

include "connection.php";

$sqlLogin = "CREATE TABLE IF NOT EXISTS usuario(
    id_usuario int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome_usuario varchar(50) NOT NULL,
    senha VARCHAR(50) NOT NULL
)";

$conn->query($sqlLogin);

$sqlLogin = "SELECT * FROM usuario";
$resultLogin = $conn->query($sqlLogin);

?>

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
        <img src="img/logo.png" alt="logo">
    </header>
    <main class="bg-body-tertiary w-100">
        <div class="w-100 form-container">
            <form action="login.php" method="POST">
                <h1 class="mb-4 p-3 text-center bg-dark" id="teste">Identificação</h1>
                <h2 class="h3 fw-normal fs-5 text-center">Acesse com seu login ou cadastre-se!</h2>
                <div class="alert alert-danger" role="alert">Login ou senha incorretos</div>
                <div class="form-floating mb-3 mt-3">
                    <input type="text" name="nome_usuario" class="form-control" id="floatingInput" placeholder="Digite seu usuário" required>
                    <label for="floatingInput">Usuário</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="senha" class="form-control" id="floatingInput" placeholder="Digite sua senha" required>
                    <label for="floatingInput">Senha</label>
                </div>
                <div class="buttons mt-4">
                    <button type="submit" class="btn btn-primary py-2 mb-3">Entrar</button>
                    <a href="cadastro.php"><button type="button" class="btn btn-primary py-2">Cadastre-se</button></a>
                </div>
            </form>
        </div>
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