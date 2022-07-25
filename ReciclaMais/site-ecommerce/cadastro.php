<?php 
session_start();
require 'conexao.php';
$campoNome = filter_input(INPUT_POST, 'nome');
$campoTelefone = filter_input(INPUT_POST, 'telefone', FILTER_VALIDATE_INT);
$campoCnpj = filter_input(INPUT_POST, 'cnpj', FILTER_VALIDATE_INT);
$campoEmail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$campoRamo = filter_input(INPUT_POST, 'ramo');
$campoEndereco = filter_input(INPUT_POST, 'endereco');
$campoSenha = password_hash($_POST["senha"], PASSWORD_BCRYPT);


$sql = "INSERT INTO usuario(login, senha, acesso) VALUES ('$campoCnpj', '$campoSenha', 'empresa')";
if ($conn->query($sql) === TRUE) {	
    echo "Gravado com sucesso.";
}  
$id_usuario = $conn->insert_id;
echo $id_usuario;
$sql2 = "INSERT INTO empresa(nome, telefone, cnpj, email, ramo, endereco, id_usuario) VALUES ('$campoNome', '$campoTelefone', '$campoEmail','$campoCnpj' ,'$campoRamo', '$campoEndereco', '$id_usuario')";
if ($conn->query($sql2) === TRUE) {	
    echo "Empresa gravada.";
}  else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }