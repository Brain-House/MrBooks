<?php

    $msgerro = "";

    if($_POST){
        if(empty($_POST["nome"])){
            $msgerro = "O nome está vazio preencha por favor!";
        }
        else{
            require_once "../Models/Editora.class.php";
            require_once "../Models/Conexao.php";
            require_once "../Models/EditoraDAO.php";

            $editora = new Editora(0, $_POST["nome"], "Ativo");

            $editoraDAO = new EditoraDAO();

            $editoraDAO->inserir($editora);

            header("location:listar_editoras.php");
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
                        <h1 class="card-title text-center">Cadastro de Editora</h1>

                        <form action="#" method="POST">
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome Editora</label>
                                <input type="text" name="nome" class="form-control" id="nome" placeholder="Digite o nome da editora" value="<?php echo isset($_POST['nome']) ? $_POST['nome'] : '' ?>">
                                <div><?php echo $msgerro; ?></div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Cadastrar Editora</button>
                            </div>

                            <a href = 'listar_editoras.php'>Lista de Editoras</a>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>