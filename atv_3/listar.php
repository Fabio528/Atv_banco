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

$sql = "SELECT * FROM contato ORDER BY nome ASC  ";
$resultado = $conn->query($sql);

?>





<table border='1' width='50%'>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>email</th>
        <th>subjecto</th>
        <th>message1</th>
        <th>editar</th>
        <th>remover</th>
    </tr>

    <?php
        while($linha = $resultado->fetch_assoc()){
            echo "<tr>
            <td>".$linha['id']."</td>
                <td>".$linha['nome']."</td>
                <td>".$linha['email']."</td>
                <td>".$linha['subjecto']."</td>
                <td>".$linha['message1']."</td>
                <td><a href='editar.php?id=".$linha['id']."'>editar</td>
                <td> <a href='remover.php?id=".$linha['id']."'>Remover</a></td>
            </tr>";
        }
    ?>
</table>    