<?php
include_once 'conexao.php';

if(isset($_POST['submit'])){
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];

    $sql = "INSERT INTO tb_task (nome, descricao) VALUES (?,?)";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $nome, $descricao);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("Location: read.php");
    exit();
}
?>

<form method="post" action="">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome">
    <br>
    <label for="descricao">Descrição:</label>
    <textarea name="descricao" id="descricao"></textarea>
    <br>
    <input type="submit" name="submit" value="Salvar">
</form>