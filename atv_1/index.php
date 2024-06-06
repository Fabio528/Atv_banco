<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
include 'conexao.php';
$nome = $_POST['nome'];
$email = $_POST['email'];
$idade = $_POST['idade'];
$data_cadastro = date("Y-m-d H:i:s");
$data_atualizacao = date("Y-m-d H:i:s");
$status = 0;

$sql = "INSERT INTO usuario (nome, email, idade, data_cadastro, data_atualização, status) VALUES ('$nome', '$email', '$idade', '$data_cadastro' , '$data_atualizacao' , '$status')";
    if($conn->query($sql) ==TRUE){
        echo "Cadastro feito com sucesso !";
    }else{
        echo "Erro ao inserir registro" . $conn->erro;
    }
}    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Formulario post</title>
</head>
<body>
    <h1>Formulario de cadastro</h1>
    <form  id='formulario-cadastro' action="process_post.php" method="post">

    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" required><br><br>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required><br><br>

    <label for="idade">Idade:</label>
    <input type="number" name="idade" id="idade" required><br><br>

    <input type="submit" value="Enviar">


    <?php
        $i=0;
        $a=1;
        $b=6;

        while($a <= $b){
            $i++;

            echo "<h$i>Ola</h$i>";

            if($i==$b){
                break;
            }
        }
    
    ?>

    </form>
        <a href="listar.php">Voltar a lista</a>

        <div id="armazenamento"></div>

        #armazazemaneot{
            font:si
        }

    <script>
        $(document).ready(function() {
            $('#formulario-cadastro').submit(function(event) {
                event.preventDefault(); // Evita a submissão padrão do formulário
			

                var nome = $('#nome').val();
                var email = $('#email').val();
                var idade = $('#idade').val();
                

                // Requisição AJAX para calcular.php
                $.ajax({
                    type: 'POST',
                    url: 'process_post.php',
                    data: {
                        nome: nome,
                        email: email,
                        idade: idade
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