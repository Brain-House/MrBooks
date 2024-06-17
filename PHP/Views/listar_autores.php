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
            <th style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>Ações</th>
        </tr>
    </thead>
    <tbody>";

    foreach ($autores as $dado) {
        echo "<tr>
        <td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>{$dado->aut_id}</td>
        <td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>{$dado->aut_nome}</td>
        <td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>{$dado->aut_status}</td>
        <td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>";
        if($dado->aut_status == "Ativo") {
            echo "<a href='alterar_status.php?aut_id={$dado -> aut_id}&aut_status=Inativo'>Inativar</a>";
        } else {
            echo "<a href='alterar_status.php?aut_id={$dado -> aut_id}&aut_status=Ativo'>Ativar</a>";
        }
        echo "
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