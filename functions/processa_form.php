<?php
$host = "localhost";
$user = "root";
$senha = "";
$banco = "db_projeto";

$conexao = mysqli_connect($host, $user, $senha, $banco);
if(mysqli_connect_errno()){
    echo "Erro ao conectar com o banco de dados: " . mysqli_connect_error();
    exit();
}

// Obtém o valor do campo "Nome do projeto" enviado pelo formulário
$nome_projeto = $_POST["nome_projeto"];

// Insere os dados no banco de dados
$sql = "INSERT INTO tb_projetos (nome_projeto) VALUES (?)";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, "s", $nome_projeto);
mysqli_stmt_execute($stmt);

if (mysqli_query($conn, $sql)) {
  echo "Dados inseridos com sucesso!";
} else {
  echo "Erro ao inserir dados: " . mysqli_error($conn);
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);
?>