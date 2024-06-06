<!-- Atividade 4 -->
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
include 'conexao.php';
$nome = $_POST['nome'];
$email = $_POST['email'];
$subjecto = $_POST['subjecto'];
$message1 = $_POST['message1'];
$data_cadastro = date("Y-m-d H:i:s");
$data_atualizacao = date("Y-m-d H:i:s");
$status = 0;

$sql = "INSERT INTO usuario (nome, email, subjecto, message1, data_cadastro, data_atualização, status) VALUES ('$nome', '$email', '$subjecto', '$message1' ,'$data_cadastro' , '$data_atualizacao' , '$status')";
    if($conn->query($sql) ==TRUE){
        echo "Cadastro feito com sucesso !";
    }else{
        echo "Erro ao inserir registro" . $conn->erro;
    }
}    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Formulário de Contato</title>
</head>
<body>
    <h2>Entre em Contato</h2>
    <form id="formulario-contanto" method="post">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="email">E-mail:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="subjecto">Assunto:</label><br>
        <input type="text" id="subjecto" name="subjecto" required><br><br>

        <label for="message1">Mensagem:</label><br>
        <textarea id="message1" name="message1" rows="4" required></textarea><br><br>

        <input type="submit" value="Enviar">
    </form>

    <div id="armazenamento"></div>

    <script>
        $(document).ready(function() {
            $('#formulario-contanto').submit(function(event) {
                event.preventDefault(); // Evita a submissão padrão do formulário
			

                var name = $('#name').val();
                var email = $('#email').val();
                var subject = $('#subject').val();
                var message = $('#message').val();
                

                // Requisição AJAX para calcular.php
                $.ajax({
                    type: 'POST',
                    url: 'process_contact_form.php',
                    data: {
                        name: name,
                        email: email,
                        subject: subject,
                        message: message
                    },
                    success: function(fabio) {
                        $('#armazenamento').html(fabio);
                    },
                    error: function(xhr, status, error) {
                        $('#armazenamento').html('Erro: ' + error);
                    }
                });
            });
        });
    </script>
</body>
</html>