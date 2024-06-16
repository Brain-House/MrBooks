<?php

    require_once "../Models/Conexao.php";
    require_once "../Models/Pessoa.class.php";
    require_once "../Models/Usuario.class.php";
    require_once "../Models/UsuarioDAO.php";
    require_once "../Models/Telefone.class.php";
    require_once "../Models/TelefoneDAO.php";
    require_once "../Models/Endereco.class.php";
    require_once "../Models/EnderecoDAO.php";


    $msgerro = array("","","","","","","","","","","","","","");
    $erro = false;

    if ($_POST) {
        if (empty($_POST["datanasc"])) {
            $msgerro[0] = "A data de nascimento está vazia, preencha por favor!";
            $erro = true;
        }
        if (empty($_POST["email"])) {
            $msgerro[1] = "O e-mail está vazio, preencha por favor!";
            $erro = true;
        }
        if (empty($_POST["senha"])) {
            $msgerro[2] = "A senha está vazia, preencha por favor!";
            $erro = true;
        }
        if (empty($_POST["tipo"])) {
            $msgerro[3] = "O tipo de usuário está vazio, preencha por favor!";
            $erro = true;
        }
        if (empty($_POST["cpf"])) {
            $msgerro[4] = "O CPF está vazio, preencha por favor!";
            $erro = true;
        }
        if (empty($_POST["telefone"])) {
            $msgerro[5] = "O telefone está vazio, preencha por favor!";
            $erro = true;
        }
        if (empty($_POST["ddd"])) {
            $msgerro[6] = "O DDD está vazio, preencha por favor!";
            $erro = true;
        }
        if (empty($_POST["numerocasa"])) {
            $msgerro[7] = "O número da casa está vazio, preencha por favor!";
            $erro = true;
        }
        if (empty($_POST["bairro"])) {
            $msgerro[8] = "O bairro está vazio, preencha por favor!";
            $erro = true;
        }
        if (empty($_POST["uf"])) {
            $msgerro[9] = "A UF está vazia, preencha por favor!";
            $erro = true;
        }
        if (empty($_POST["cidade"])) {
            $msgerro[10] = "A cidade está vazia, preencha por favor!";
            $erro = true;
        }
        if (empty($_POST["cep"])) {
            $msgerro[11] = "O CEP está vazio, preencha por favor!";
            $erro = true;
        }
        if (empty($_POST["rua"])) {
            $msgerro[12] = "A rua está vazia, preencha por favor!";
            $erro = true;
        }
        if (empty($_POST["logradouro"])) {
            $msgerro[13] = "O logradouro está vazio, preencha por favor!";
            $erro = true;
        }

        if (!$erro) {

            $usuario = new Usuario(
                0,
                "Ativo",
                "",
                $_POST["datanasc"],
                $_POST["email"],
                $_POST["senha"],
                $_POST["tipo"],
                $_POST["cpf"],
                $_POST["nome"]
            );

            $UsuarioDAO = new UsuarioDAO();
            $UsuarioDAO->inserir($usuario);

            $telefone = new Telefone(
                0,
                $_POST['telefone'],
                $_POST['ddd']
            );

            $TelefoneDAO = new TelefoneDAO();
            $TelefoneDAO->inserir($telefone);

            $endereco = new Endereco(
                0,
                $_POST['numerocasa'],
                $_POST['bairro'],
                $_POST['uf'],
                $_POST['cidade'],
                $_POST['cep'],
                $_POST['rua'],
                $_POST['logradouro']
            );

            $EnderecoDAO = new EnderecoDAO();
            $EnderecoDAO->inserir($endereco);

            header("location:listar_usuarios.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Editora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">MrBooks</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Início</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Painel de ADM
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="form_editora.php">Cadastro Editoras</a></li>
                            <li><a class="dropdown-item" href="form_autor.php">Cadastro Autores</a></li>
                            <li><a class="dropdown-item" href="form_livro.php">Cadastro Livro</a></li>
                            <li><a class="dropdown-item" href="listar_editoras.php">Listar Editoras</a></li>
                            <li><a class="dropdown-item" href="listar_autores.php">Listar Autores</a></li>
                            <li><a class="dropdown-item" href="listar_livros.php">Listar Livros</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card mt-5">
                <div class="card-body">
                    <h1 class="card-title text-center">Cadastro de Usuário</h1>

                    <form action="#" method="POST">

                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" name="nome" class="form-control" id="nome" placeholder="Digite o nome" required>
                        </div>

                        <div class="mb-3">
                            <label for="datanasc" class="form-label">Data de Nascimento</label>
                            <input type="date" name="datanasc" class="form-control" id="datanasc" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Digite o e-mail" required>
                        </div>

                        <div class="mb-3">
                            <label for="senha" class="form-label">Senha</label>
                            <input type="password" name="senha" class="form-control" id="senha" placeholder="Digite a senha" required>
                        </div>

                        <div class="mb-3">
                            <label for="tipo" class="form-label">Tipo de Usuário</label>
                            <select id="tipo" name="tipo" class="form-select" required>
                                <option value="1">Administrador</option>
                                <option value="2">Usuário Comum</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="cpf" class="form-label">CPF</label>
                            <input type="text" name="cpf" class="form-control" id="cpf" placeholder="Digite o CPF" required>
                        </div>

                        <div class="mb-3">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="text" name="telefone" class="form-control" id="telefone" placeholder="Digite o telefone" required>
                        </div>

                        <div class="mb-3">
                            <label for="ddd" class="form-label">DDD</label>
                            <input type="text" name="ddd" class="form-control" id="ddd" placeholder="Digite o DDD" required>
                        </div>

                        <div class="mb-3">
                            <label for="numerocasa" class="form-label">Número da Casa</label>
                            <input type="text" name="numerocasa" class="form-control" id="numerocasa" placeholder="Digite o número da casa" required>
                        </div>

                        <div class="mb-3">
                            <label for="bairro" class="form-label">Bairro</label>
                            <input type="text" name="bairro" class="form-control" id="bairro" placeholder="Digite o bairro" required>
                        </div>

                        <div class="mb-3">
                            <label for="uf" class="form-label">UF</label>
                            <input type="text" name="uf" class="form-control" id="uf" placeholder="Digite a UF" required>
                        </div>

                        <div class="mb-3">
                            <label for="cidade" class="form-label">Cidade</label>
                            <input type="text" name="cidade" class="form-control" id="cidade" placeholder="Digite a cidade" required>
                        </div>

                        <div class="mb-3">
                            <label for="cep" class="form-label">CEP</label>
                            <input type="text" name="cep" class="form-control" id="cep" placeholder="Digite o CEP" required>
                        </div>

                        <div class="mb-3">
                            <label for="rua" class="form-label">Rua</label>
                            <input type="text" name="rua" class="form-control" id="rua" placeholder="Digite a rua" required>
                        </div>

                        <div class="mb-3">
                            <label for="logradouro" class="form-label">Logradouro</label>
                            <input type="text" name="logradouro" class="form-control" id="logradouro" placeholder="Digite o logradouro" required>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Cadastrar Usuário</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>