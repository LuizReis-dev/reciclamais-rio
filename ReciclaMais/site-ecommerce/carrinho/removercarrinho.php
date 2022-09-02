<?php 
session_start();
require 'acessocomum.php';

require 'conexao.php';
//Checa se foi recebido o id do material, se o mesmo é um numero, se existe um carrinho e se o produto está no carrinho
if(isset($_GET['id_material']) && is_numeric(($_GET['id_material'])) && isset($_SESSION['carrinho']) && isset($_SESSION['carrinho'][$_GET['id_material']])){
    unset($_SESSION['carrinho'][$_GET['id_material']]);
    header('location: carrinho.php');
}
?>