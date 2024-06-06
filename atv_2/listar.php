<?php
include 'conexao.php';

$sql= "SELECT * FROM evento";
$resultado = $conn->query($sql);

?>

<table border='1' width='50%'>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Evento</th>
        <th>editar</th>
        <th>remover</th>
    </tr>

    <?php
        while($linha = $resultado->fetch_assoc()){
            echo "<tr>
            <td>".$linha['id']."</td>
                <td>".$linha['nome']."</td>
                <td>".$linha['email']."</td>
                <td>".$linha['event_of_interest']."</td>
                <td><a href='editar.php?id=".$linha['id']."'>editar</td>
                <td> <a href='remover.php?id=".$linha['id']."'>Remover</a></td>
            </tr>";
        }
    ?>
</table>  