<?php 
    session_start();
    require '../util/conexao.php';
    $senha = filter_input(INPUT_POST, 'senha');
    $confirmacao = filter_input(INPUT_POST, 'confirmacao');
    if($senha == $confirmacao){
        $campoSenha = password_hash($senha, PASSWORD_BCRYPT);
        $id = $_SESSION["idrecuperar"];
        $sql = "UPDATE usuario SET senha = '$campoSenha' WHERE id = $id";
        
    if ($conn->query($sql) === TRUE) {
        header('location: login.html');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }        
    } else {
        $_SESSION["autorizacaorecuperar"] = true;
        echo "<script>window.location.replace('reescreversenha.php?senhaerrada=true');</script>";
    }
?>