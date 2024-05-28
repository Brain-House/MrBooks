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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Editora</title>
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
        <a href="listar_autores.php">Listar Autores</a>
        <a href="listar_editoras.php">Listar Editoras</a>
    </div>
    <form action = "#" method = "post">
        <label>Nome Editora</label>
        <input type="text" name="nome" id="nome" value = "<?php echo isset($_POST['nome'])?$_POST['nome']:''?>">
        <div><?php echo $msgerro; ?></div>
        <button type="submit" value="cadastrar">Cadastrar</button>

        <br><br><br>

        <a href = 'listar_editoras.php'>Lista de editoras</a>
    </form>
</body>
</html>