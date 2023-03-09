<?php
include_once 'conexao.php';

if(isset($_POST['submit'])){
    $nome = $_POST['nome'];

    $sql = "INSERT INTO tb_projetos (nome) VALUES (?)";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "s", $nome);
    mysqli_stmt_execute($stmt);

    $id_projeto = mysqli_insert_id($conexao); // obter o ID do último registro inserido

    $sql_projeto = "SELECT nome FROM tb_projetos WHERE id=?";
    $stmt_projeto = mysqli_prepare($conexao, $sql_projeto);
    mysqli_stmt_bind_param($stmt_projeto, "i", $id_projeto);
    mysqli_stmt_execute($stmt_projeto);
    $resultado_projeto = mysqli_stmt_get_result($stmt_projeto);
    mysqli_stmt_close($stmt_projeto);

    if (!$resultado_projeto) {
      echo "Erro ao executar a consulta: " . mysqli_error($conexao);
      exit();
    }

    $projeto = mysqli_fetch_array($resultado_projeto);
    $nome_projeto = $projeto['nome'];
    $texto = "ID: $id_projeto - Nome do projeto: $nome_projeto";

    mysqli_stmt_close($stmt);

    header("Location: read.php?id=$id_projeto&nome=$nome_projeto");
    exit();
}
?>

<form method="post" action="">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome">
    <br>
    <input type="submit" name="submit" value="Salvar">
</form>