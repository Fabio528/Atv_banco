<?php
include 'conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Participantes Registrados</title>
</head>
<body>
    <h2>Lista de Participantes Registrados</h2>
    <?php
    // Verifica se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtém os dados do formulário
        $name = $_POST['nome'];
        $email = $_POST['email'];
        $event_of_interest = $_POST['event_of_interest'];

        

        // Exibe os dados do participante registrado
        echo "<p><strong>Nome:</strong> $name</p>";
        echo "<p><strong>E-mail:</strong> $email</p>";
        echo "<p><strong>Evento de Interesse:</strong> $event_of_interest</p>";
    } else {
        echo "Erro ao processar o formulário.";
    }
    ?>

    
</body>
<button><a href="listar.php">Editar banco</a></button>
</html>