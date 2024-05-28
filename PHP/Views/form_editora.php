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
</head>
<body>
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