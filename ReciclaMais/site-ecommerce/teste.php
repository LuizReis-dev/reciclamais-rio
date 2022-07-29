<?php 
session_start();
$qtd_carrinho = isset($_SESSION['carrinho']) ? count($_SESSION['carrinho']) : 0;
echo $qtd_carrinho;
?>