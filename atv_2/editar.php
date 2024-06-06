<?php
include 'conexao.php';

if(!isset($_GET['id'])){
    echo "Usuário não informado";
    exit();
}

$id = $_GET['id'];
$q = "SELECT * FROM evento WHERE id='$id'";
$resultado = $conn->query($q);



if($resultado->num_rows <=0) {
    echo "Usuário não encontrado";
    exit();
}

$linha = $resultado->fetch_assoc();

//Segunda parte (Salvando dados)
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $idade = $_POST['idade'];
    $data_atualizacao = date("Y-m-d H:i:s");

    $q = "UPDATE evento SET nome='$nome', email='$email', event_of_interest='$event_of_interest', data_atualizacao='$data_atualizacao' WHERE id='$id'";
    if($conn->query($q)==TRUE){
        echo "Cadastro realizado com sucesso";
    }else{
    echo "Erro ao editar";
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
    <form method="post">
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
</body>
</html>