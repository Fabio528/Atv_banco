<?php
include 'conexao.php';

if(!isset($_GET['id'])){
    echo "Usuário não informado";
    exit();
}

$id = $_GET['id'];
$q = "SELECT * FROM clientes WHERE id='$id'";
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

    $q = "UPDATE clientes SET nome='$nome', email='$email', idade='$idade', data_atualizacao='$data_atualizacao' WHERE id='$id'";
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
        Email: <input type="text" name="email" value="<?php echo $linha['email']; ?>"><br>
        Idade: <input type="text" name="idade"value="<?php echo $linha['idade']; ?>"><br>
    <input type="submit" value="inserir">
    </form>
    <br>
    <a href="listar.php">Voltar a lista</a>
    
</body>
</html>