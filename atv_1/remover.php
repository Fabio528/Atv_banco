<?php
include 'conexao.php';

$id = $_GET['id'];
$sql = "DELETE FROM usuario WHERE id='$id'";
$resultado = $conn->query($sql);

header('Location: listar.php')


?>