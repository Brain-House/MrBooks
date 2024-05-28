<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Autores</title>
    <style>
        .btn-ativar {
            background-color: green;
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            border-radius: 4px;
        }

        .btn-inativar {
            background-color: red;
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            border-radius: 4px;
        }
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
<?php

require_once "../Models/Conexao.php";
require_once "../Models/AutorDAO.php";

        
$autorDAO = new AutorDAO();

$autores = $autorDAO->buscar_todos();

echo "<h1 style='text-align: center;'>Tabela Autores</h1>";

echo "<table style='border-collapse: collapse; width: 100%; border: 1px solid #dddddd;'>
    <thead>
        <tr style='background-color: #f2f2f2;'>
            <th style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>ID</th>
            <th style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>Nome</th>
            <th style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>Status</th>
            <th style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>Ações</th> <!-- Coluna para os botões -->
        </tr>
    </thead>
    <tbody>";

    foreach ($autores as $dado) {
        $classe_botao = ($dado->status == "Ativo") ? "btn-inativar" : "btn-ativar";
        echo "<tr>
        <td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>{$dado->aut_id}</td>
        <td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>{$dado->aut_nome}</td>
        <td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>{$dado->status}</td>
        <td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>
            <form action='ativar_inativar_autor.php' method='post'>
                <input type='hidden' name='autor_id' value='{$dado->aut_id}'>";
        if($dado->status == "Ativo") {
            echo "<a href='#?id={$dado->aut_id}&status=Inativo' class='btn btn-warning'>Inativar</a>";
        } else {
            echo "<a href='#?id={$dado->aut_id}&status=Ativo' class='btn btn-warning'>Ativar</a>";
        }
        echo "</form>
        </td>
      </tr>";
    }
    echo "</tbody>
    </table>";

    echo "<br><br><br>";

    echo "<a href = 'form_autor.php'>Cadastrar autor Novamente</a>";
    

?>

</body>
</html>