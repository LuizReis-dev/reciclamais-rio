<?php
session_start();
// Include configuration file 
require_once '../util/conexao.php';

    $session_id = $_GET['session_id'];   
    
        require_once '../stripe-php/init.php';
        
        // Set API key
        \Stripe\Stripe::setApiKey('sk_test_51LfOQfE7cOap8gRqh7Nq1Vjv9xUKOBC7FF0ZIDib9WuEH09iV2VjY0EPZ5SOgtXjvcwela8mkw90UTBzrhqTexsw00Izbxpx06');
        
        try {
            $checkout_session = \Stripe\Checkout\Session::retrieve($session_id);
        }catch(Exception $e) { 
            $api_error = $e->getMessage(); 
        }
// Retrieves the details of customer
$teste = "0";
$id_cliente = $checkout_session->metadata->id_cliente;
$quantidade = $checkout_session->metadata->$teste;

$valor = $checkout_session->amount_total;
$emailcliente = $checkout_session->customer_details->email;
$nomecliente = $checkout_session->customer_details->name;
$texto = "Olá ". $nomecliente . " informamos que sua compra no valor de " .$valor. " foi registrada e seu pedido será entregue em menos de 3 dias";
require '../util/enviaremail.php';
enviaremail($nomecliente, $emailcliente, "Compra Realizada", $texto);

header('location :index.php');
//Fecha a conexão.
$conn->close();
?>