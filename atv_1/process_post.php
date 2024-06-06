<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $idade = $_POST['idade'];

        
        echo"<h1>Cadastro realizado com sucesso</h1>
        <p>Nome: $nome</p>
       <p>Email: $email</p>
        <p>Idade: $idade</p>";

    } else{
        echo "<h1>Acesso Inválido</h1>";
        echo "<p>Por favor, envie o formulário corretamente.</p>";
    }
?>