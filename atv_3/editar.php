<?php
include 'conexao.php';

if(!isset($_GET['id'])){
    echo "Usuário não informado";
    exit();
}

$id = $_GET['id'];
$q = "SELECT * FROM contato WHERE id='$id'";
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
    $subjecto = $_POST['subjecto'];
    $message1 = $_POST['message1'];
    $data_atualizacao = date("Y-m-d H:i:s");

    $q = "UPDATE contato SET nome='$nome', email='$email', subjecto='$subjecto', message1='$message1', data_atualizacao='$data_atualizacao' WHERE id='$id'";
    if($conn->query($q)==TRUE){
        echo "Cadastro realizado com sucesso";
    }else{
    echo "Erro ao editar";
    }
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>editar</h2>
    <form method="post">
        Nome: <input type="text" name="nome" value="<?php echo $linha['nome']; ?>"><br>
        email: <input type="text" name="email" value="<?php echo $linha['email']; ?>"><br>
        subjecto: <input type="text" name="subjecto"value="<?php echo $linha['subjecto']; ?>"><br>
        CPF: <input type="text" name="message1"value="<?php echo $linha['message1']; ?>"><br>
    <input type="submit" value="inserir">
    </form>
    <br>
    <a href="form4.php">Voltar a lista</a>
    
</body>
</html>