<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Autores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <?php
            require_once "navbar.php";
        ?>
    </nav>
<?php

require_once "../Models/Conexao.php";
require_once "../Models/Livro.class.php";
require_once "../Models/LivroDAO.php";
require_once "../Models/Editora.class.php";
require_once "../Models/EditoraDAO.php";

$livroDAO = new LivroDAO();

$livro = $livroDAO->buscar_todos();

echo "<h1 style='text-align: center;'>Tabela Livros</h1>";

echo "<table style='border-collapse: collapse; width: 100%; border: 1px solid #dddddd;'>
    <thead>
        <tr style='background-color: #f2f2f2;'>
            <th style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>ID</th>
            <th style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>Título</th>
            <th style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>ISBN</th>
            <th style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>Idioma</th>
            <th style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>Formato</th>
            <th style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>Genero</th>
            <th style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>Resumo</th>
            <th style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>Páginas</th>
            <th style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>Categoria</th>
            <th style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>Status</th>
            <th style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>Ação</th>
        </tr>
    </thead>
    <tbody>";

    foreach ($livro as $livro) {
        echo "<tr>
        <td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>{$livro->liv_id}</td>
        <td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>{$livro->liv_titulo}</td>
        <td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>{$livro->liv_isbn}</td>
        <td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>{$livro->liv_idioma}</td>
        <td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>{$livro->liv_formato}</td>
        <td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>{$livro->liv_genero}</td>
        <td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>{$livro->liv_resumo}</td>
        <td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>{$livro->liv_numpagi}</td>
        <td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>{$livro->nome_editora}</td>
        <td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>{$livro->liv_status}</td>
        <td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>";
        if($livro->liv_status == "Ativo") {
            echo "<a href='alterar_status_livro.php?liv_id={$livro -> liv_id}&liv_status=Inativo'>Inativar</a>";
        } else {
            echo "<a href='alterar_status_livro.php?liv_id={$livro -> liv_id}&liv_status=Ativo'>Ativar</a>";
        }
        echo "
        </td>
      </tr>";
    }
    echo "</tbody>
    </table>";

    echo "<br><br><br>";

    echo "<a href = 'form_livro.php'>Cadastrar livro Novamente</a>";
    

?>

</body>
</html>