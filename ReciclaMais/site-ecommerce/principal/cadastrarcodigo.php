<?php
session_start();
require '../util/conexao.php';
$campoNome = filter_input(INPUT_POST, 'nome');
$campoTelefone = filter_input(INPUT_POST, 'telefone', FILTER_VALIDATE_INT);
$campoCnpj = filter_input(INPUT_POST, 'cnpj');
$campoEmail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$campoRamo = filter_input(INPUT_POST, 'ramo');
$campoEndereco = filter_input(INPUT_POST, 'endereco');
$campoSenha = password_hash($_POST["senha"], PASSWORD_BCRYPT);

$filtroCNPJ = "SELECT * FROM empresa where cnpj = '$campoCnpj'";
$retornoCNPJ = $conn->query($filtroCNPJ);
$rowCNPJ = $retornoCNPJ->fetch_assoc();
if ($rowCNPJ["cnpj"]) {
    header("refresh:2 ;url=cadastrar.html");
    echo " <script>
  window.alert('Este CNPJ já consta em nossos servidores')
  
  </script>";
} else {
    $validador = rand(10000000,99999999);
    $sql = "INSERT INTO usuario(login, senha, acesso, status, validador) VALUES ('$campoCnpj', '$campoSenha', 'empresa','aguardando','$validador')";
    $conn->query($sql);
    require '../util/enviaremail.php';  
    $texto = "Clique <a href='https://reciclamaisrio.000webhostapp.com/util/usuariovalidaremail.php?id=" . $campoCnpj . "&validador=" . $validador . "'>aqui</a>.";
    enviaremail($campoNome, $campoEmail, 'Validar conta', $texto);

    $id_usuario = $conn->insert_id;
    $sql2 = "INSERT INTO empresa(nome, telefone, email, cnpj, ramo, endereco, id_usuario) VALUES ('$campoNome', '$campoTelefone', '$campoEmail','$campoCnpj' ,'$campoRamo', '$campoEndereco', '$id_usuario')";
    
    $conn->query($sql2);
    
    header('location: login.html');
}
