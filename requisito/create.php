<?php
include_once 'conexao.php';

$nome_projeto = $_GET['nome'];

if(isset($_POST['submit'])){
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $id_projeto = $_POST['id_projeto'];

    $sql = "INSERT INTO tb_requisitos (nome, descricao, id_projeto) VALUES (?,?,?)";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "ssi", $nome, $descricao,  $id_projeto);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("Location: ./../projeto/read.php?id=".$id_projeto."&nome=".$nome_projeto);
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
    <input type="hidden" name="id_projeto" value="<?php echo isset($_GET['id_projeto']) ? $_GET['id_projeto'] : ''; ?>">
    <br>
    <input type="submit" name="submit" value="Salvar">
</form>