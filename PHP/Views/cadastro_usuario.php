<?php

    require_once "../Models/Conexao.php";
    require_once "../Models/Pessoa.class.php";
    require_once "../Models/PessoaDAO.php";
    require_once "../Models/Usuario.class.php";
    require_once "../Models/UsuarioDAO.php";
    require_once "../Models/Telefone.class.php";
    require_once "../Models/TelefoneDAO.php";
    require_once "../Models/Endereco.class.php";
    require_once "../Models/EnderecoDAO.php";


    $msgerro = array("","","","","","","","");
    $erro = false;

    if ($_POST) {
        if (empty($_POST[""])) {
            $msgerro[0] = "O título está vazio, preencha por favor!";
            $erro = true;
        }
        if (empty($_POST[""])) {
            $msgerro[1] = "O ISBN está vazio, preencha por favor!";
            $erro = true;
        }
        if (empty($_POST[""])) {
            $msgerro[2] = "O editora está vazio, preencha por favor!";
            $erro = true;
        }
        if (empty($_POST[""])) {
            $msgerro[3] = "O idioma está vazio, preencha por favor!";
            $erro = true;
        }
        if (empty($_POST[""])) {
            $msgerro[4] = "O formato está vazio, preencha por favor!";
            $erro = true;
        }
        if (empty($_POST[""])) {
            $msgerro[5] = "O gênero está vazio, preencha por favor!";
            $erro = true;
        }
        if (empty($_POST[""])) {
            $msgerro[6] = "O resumo está vazio, preencha por favor!";
            $erro = true;
        }
        if (empty($_POST[""])) {
            $msgerro[7] = "O número de páginas está vazio, preencha por favor!";
            $erro = true;
        }

        $editora = $_POST["editora"];

        if (!$erro) {

            $usuario = new Usuario(
                0,
                "Ativo",
                "",
                $_POST["datanasc"],
                $_POST["email"],
                $_POST["senha"],
                $_POST["tipo"],
                $_POST["cpf"]
            );

            $UsuarioDAO = new UsuarioDAO();
            $UsuarioDAO->inserir($usuario);

            $telefone = new Telefone(
                0,
                $_POST['telefone'],
                $_POST['ddd']
            );

            $TelefoneDAO = new TelfoneDAO();
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
                        <h1 class="card-title text-center">Cadastro de Livro</h1>

                        <form action="#" method="POST">
                            <div class="mb-3">
                                <label for="titulo" class="form-label">Título</label>
                                <input type="text" name="titulo" class="form-control" id="titulo" placeholder="Digite o título do livro" value="<?php echo isset($_POST['titulo']) ? $_POST['titulo'] : '' ?>">
                                <div><?php echo $msgerro[0]; ?></div>
                            </div>

                            <div class="mb-3">
                                <label for="ISBN" class="form-label">ISBN do Livro</label>
                                <input type="text" name="ISBN" class="form-control" id="ISBN" placeholder="Digite o ISBN do livro" value="<?php echo isset($_POST['ISBN']) ? $_POST['ISBN'] : '' ?>">
                                <div><?php echo $msgerro[1]; ?></div>
                            </div>

                            <div class="mb-3">
                                <label for="editora" class="form-label">Editora</label>
                                <select id="editora" name="editora" class="form-select">
                                    <option value="0">Escolha uma editora</option>
                                    <?php
                                    $editora = new Editora(edi_status:"Ativo");
                                    $editoraDAO = new EditoraDAO();
                                    $ret = $editoraDAO->buscar_editoras_ativas($editora);
                                    foreach ($ret as $dado) {
                                        $selected = isset($_POST["editora"]) && $_POST["editora"] == $dado->edi_id ? 'selected' : '';
                                        echo "<option value='{$dado->edi_id}' $selected>{$dado->edi_nome}</option>";
                                    }
                                    ?>
                                </select>
                                <div><?php echo $msgerro[2]; ?></div>
                            </div>

                            <div class="mb-3">
                                <label for="idioma" class="form-label">Idioma</label>
                                <input type="text" name="idioma" class="form-control" id="idioma" placeholder="Digite o idioma do livro" value="<?php echo isset($_POST['idioma']) ? $_POST['idioma'] : '' ?>">
                                <div><?php echo $msgerro[3]; ?></div>
                            </div>

                            <div class="mb-3">
                                <label for="formato" class="form-label">Formato</label>
                                <input type="text" name="formato" class="form-control" id="formato" placeholder="Digite o formato do livro" value="<?php echo isset($_POST['formato']) ? $_POST['formato'] : '' ?>">
                                <div><?php echo $msgerro[4]; ?></div>
                            </div>

                            <div class="mb-3">
                                <label for="genero" class="form-label">Gênero</label>
                                <input type="text" name="genero" class="form-control" id="genero" placeholder="Digite o gênero do livro" value="<?php echo isset($_POST['genero']) ? $_POST['genero'] : '' ?>">
                                <div><?php echo $msgerro[5]; ?></div>
                            </div>

                            <div class="mb-3">
                                <label for="resumo" class="form-label">Resumo</label>
                                <input type="text" name="resumo" class="form-control" id="resumo" placeholder="Digite o resumo do livro" value="<?php echo isset($_POST['resumo']) ? $_POST['resumo'] : '' ?>">
                                <div><?php echo $msgerro[6]; ?></div>
                            </div>

                            <div class="mb-3">
                                <label for="npaginas" class="form-label">Número de Páginas</label>
                                <input type="number" name="npaginas" class="form-control" id="npaginas" placeholder="Digite o número de páginas do livro" value="<?php echo isset($_POST['npaginas']) ? $_POST['npaginas'] : '' ?>">
                                <div><?php echo $msgerro[7]; ?></div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Cadastrar Livro</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>