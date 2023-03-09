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
?>