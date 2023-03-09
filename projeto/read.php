<?php
include_once 'conexao.php';

$id_projeto = $_GET['id'];
$nome_do_projeto = $_GET['nome'];
$texto = "ID: $id_projeto - Nome: $nome_do_projeto";

$sql = "SELECT * FROM tb_requisitos WHERE id_projeto=?";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, "i", $id_projeto);
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);
mysqli_stmt_close($stmt);

if (!$resultado) {
  echo "Erro ao executar a consulta: " . mysqli_error($conexao);
  exit();
}

?>
<h1><?php echo $texto; ?></h1>
<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Projeto</th>
        <th>Ações</th>
    </tr>
    <?php while($row = mysqli_fetch_array($resultado)){ ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nome']; ?></td>
            <td><?php echo $row['descricao']; ?></td>
            <td><?php echo $row['id_projeto']; ?></td>
            <td>
                <a href="update.php?id=<?php echo $row['id']; ?>">Editar</a>
                <a href="delete.php?id=<?php echo $row['id']; ?>">Excluir</a>
            </td>
        </tr>
    <?php } ?>
</table>
<a href="./../requisito/create.php?id_projeto=<?php echo $id_projeto;?>&nome=<?php echo $nome_do_projeto;?>" >Adicionar Novo</a>