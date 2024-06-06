<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Contato</title>
</head>
<body>
    <h2>Mensagem Recebida</h2>
    <?php
    // Verifica se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtém os dados do formulário
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        // Exibe os dados recebidos
        echo "<p><strong>Nome:</strong> $name</p>";
        echo "<p><strong>E-mail:</strong> $email</p>";
        echo "<p><strong>Assunto:</strong> $subject</p>";
        echo "<p><strong>Mensagem:</strong> $message</p>";
    } else {
        echo "Erro ao processar o formulário.";
    }
    ?>
</body>
</html>