<?php
session_start();
// Include configuration file 
require_once './util/conexao.php';

    $session_id = $_GET['session_id'];   
    
        // Include Stripe PHP library 
        require_once 'stripe-php/init.php';
        
        // Set API key
        \Stripe\Stripe::setApiKey('sk_test_51LfOQfE7cOap8gRqh7Nq1Vjv9xUKOBC7FF0ZIDib9WuEH09iV2VjY0EPZ5SOgtXjvcwela8mkw90UTBzrhqTexsw00Izbxpx06');
        
        // Fetch the Checkout Session to display the JSON result on the success page
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
echo $quantidade;
echo "<hr>";

echo "<hr>";


require './util/enviaremail.php';
//Fecha a conexão.
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<title>Pagamento</title>
<meta charset="utf-8">
<!-- Stylesheet file -->
<link href="css/style.css" rel="stylesheet">
</head>
<body class="App">
	<h1></h1>
	<div class="wrapper">
		
	</div>
</body>
</html>