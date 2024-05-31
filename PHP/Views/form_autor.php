<?php

$msgerro = "";

if($_POST){
    if(empty($_POST["nome"])){
        $msgerro = "O nome está vazio preencha por favor!";
    }
    else{
		require_once "../Models/Conexao.php";
		require_once "../Models/pessoa.class.php";
        require_once "../Models/Autor.class.php";
        require_once "../Models/AutorDAO.php";

        $autor = new Autor(0, "", $_POST["nome"]);

        $autorDAO = new AutorDAO();

        $autorDAO->inserir($autor);

        header("location:listar_autores.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Autor</title>
    <style>
        .navbar {
            background-color: #333;
            overflow: hidden;
        }
        
        .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
    </style>
</head>
<body>
<div class="navbar">
        <a href="index.php">Home</a>
        <a href="form_editora.php">Cadastro Editoras</a>
        <a href="form_autor.php">Cadastro Autores</a>
        <a href="form_livro.php">Cadastro Livro</a>
        <a href="listar_autores.php">Listar Autores</a>
        <a href="listar_editoras.php">Listar Editoras</a>
        <a href="listar_livros.php">Listar Livros</a>
    </div>
    <br><br><br>
    <form action = "#" method = "post">
        <label>Nome Autor</label>
        <input type="text" name="nome" id="nome" value = "<?php echo isset($_POST['nome'])?$_POST['nome']:''?>">
        <div><?php echo $msgerro; ?></div>
        <button type="submit" value="cadastrar">Cadastrar</button>

        <br><br><br>

        <a href = 'listar_autores.php'>Lista de autores</a>
    </form>
</body>
</html>