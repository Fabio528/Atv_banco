<!-- Atividade 7 -->
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
include 'conexao.php';
$nome = $_POST['nome'];
$email = $_POST['email'];
$event_of_interest = $_POST['event_of_interest'];
$data_cadastro = date("Y-m-d H:i:s");
$data_atualizacao = date("Y-m-d H:i:s");
$status = 0;

$sql = "INSERT INTO evento (nome, email, event_of_interest, data_cadastro, data_atualizacao, status) VALUES ('$nome', '$email', '$event_of_interest', '$data_cadastro' , '$data_atualizacao' , '$status')";
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
    <title>Registro de Eventos</title>
</head>
<body>
    <h2>Registro de Eventos</h2>
    <form  method="post">
        <label for="name">Nome:</label><br>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="email">E-mail:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="event_of_interest">Evento de Interesse:</label><br>
        <select id="event_of_interest" name="event_of_interest" required>
            <option value="workshop">Workshop</option>
            <option value="palestra">Palestra</option>
            <option value="conferencia">Conferência</option>
            <option value="curso">Curso</option>
        </select><br><br>

        <input type="submit" value="Registrar">
    </form>
    <button><a href="listar.php">Editar banco</a></button>
</body>
</html>
