<?php

    require_once "../Models/Conexao.php";
    require_once "../Models/Livro.class.php";
    require_once "../Models/LivroDAO.php";
    require_once "../Models/Editora.class.php";
    require_once "../Models/EditoraDAO.php";

$msgerro = array("","","","","","","");
$erro = false;

if($_POST){
    if(empty($_POST["titulo"])){
        $msgerro[0] = "O titulo está vazio preencha por favor!";
        $erro = true;
    }
    if(empty($_POST["ISBN"])){
        $msgerro[1] = "O  está vazio preencha por favor!";
        $erro = true;
    }
    if(empty($_POST["idioma"])){
        $msgerro[2] = "O  está vazio preencha por favor!";
        $erro = true;
    }
    if(empty($_POST["formato"])){
        $msgerro[3] = "O  está vazio preencha por favor!";
        $erro = true;
    }
    if(empty($_POST["genero"])){
        $msgerro[4] = "O  está vazio preencha por favor!";
        $erro = true;
    }
    if(empty($_POST["resumo"])){
        $msgerro[5] = "O  está vazio preencha por favor!";
        $erro = true;
    }
    if(empty($_POST["npaginas"])){
        $msgerro[6] = "O  está vazio preencha por favor!";
        $erro = true;
    }

    $editora = $_POST["editora"];
    
    if(!$erro){

        $livro = new Livro(
            0,
            $_POST["npaginas"],
            "Ativo",
            $_POST["titulo"],
            $_POST["ISBN"],
            $_POST["idioma"],
            $_POST["formato"],
            $_POST["genero"],
            $_POST["resumo"],
            $editora);

        $LivroDAO = new LivroDAO();

        $LivroDAO->inserir($livro);

        header("location:listar_livros.php");
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
        <a href="form_livro.php">Cadastro Livro</a>
        <a href="listar_autores.php">Listar Autores</a>
        <a href="listar_editoras.php">Listar Editoras</a>
        <a href="listar_livros.php">Listar Livros</a>
    </div>

    <br><br><br>

    <form action = "#" method = "post">

        <label>Titulo</label>
        <input type="text" name="titulo" id="titulo" value = "<?php echo isset($_POST['titulo'])?$_POST['titulo']:''?>">
        <div><?php echo $msgerro[0]; ?></div>

        <label>ISBN do Livro</label>
        <input type="text" name="ISBN" id="ISBN" value = "<?php echo isset($_POST['ISBN'])?$_POST['ISBN']:''?>">
        <div><?php echo $msgerro[1]; ?></div>

        <select name="editora" id="editora">
			<option value="0">Escolha uma editora</option>

			    <?php
                
				    $editora = new Editora(edi_status:"Ativo");
						
					$editoraDAO = new EditoraDAO();
						
	                $ret = $editoraDAO->buscar_editoras_ativas($editora);
	
                    foreach($ret as $dado)
                    {
                        if(isset($_POST["editora"]) && $_POST["editora"] == $dado->edi_id){
                            echo "<option value='{$dado->edi_id}' selected>{$dado->edi_nome}</option>";
                        }
                        else{
                            echo "<option value='{$dado->edi_id}'>{$dado->edi_nome}</option>";
                        }
                    } 
				?>
		</select>

        <label>Idioma</label>
        <input type="text" name="idioma" id="idioma" value = "<?php echo isset($_POST['idioma'])?$_POST['idioma']:''?>">
        <div><?php echo $msgerro[2]; ?></div>

        <label>Formato</label>
        <input type="text" name="formato" id="formato" value = "<?php echo isset($_POST['formato'])?$_POST['formato']:''?>">
        <div><?php echo $msgerro[3]; ?></div>

        <label>Gênero</label>
        <input type="text" name="genero" id="genero" value = "<?php echo isset($_POST['genero'])?$_POST['genero']:''?>">
        <div><?php echo $msgerro[4]; ?></div>

        <label>Resumo</label>
        <input type="text" name="resumo" id="resumo" value = "<?php echo isset($_POST['resumo'])?$_POST['resumo']:''?>">
        <div><?php echo $msgerro[5]; ?></div>

        <label>Número de Paginas</label>
        <input type="text" name="npaginas" id="npaginas" value = "<?php echo isset($_POST['npaginas'])?$_POST['npaginas']:''?>">
        <div><?php echo $msgerro[6]; ?></div>

        <button type="submit" value="cadastrar">Cadastrar Livro</button>

        <br><br><br>

        <a href = 'listar_editoras.php'>Lista de editoras</a>
    </form>
</body>
</html>