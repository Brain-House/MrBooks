<?php

$msgerro = "";

if($_POST){
    if(empty($_POST["nome"])){
        $msgerro = "O nome está vazio preencha por favor!";
    }
    else{
        require_once "../Models/Autor.class.php";
        require_once "../Models/Conexao.php";
        require_once "../Models/AutorDAO.php";

        $autor = new Autor(0, "Ativo", $_POST["nome"]);

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
</head>
<body>
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