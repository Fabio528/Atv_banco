<?php
// Arquivo de conexão com o banco de dados
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "banco_fabio";

// Criando uma conexão com o banco de dados
$conn = new mysqli($servidor, $usuario, $senha, $banco);

// Verificando a conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "DELETE FROM contato WHERE id='$id'";
$resultado = $conn->query($sql);

header('Location: listar.php')

?>