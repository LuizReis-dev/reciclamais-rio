<?php
session_start();
// Include configuration file 
require_once 'conexao.php';

    $session_id = $_GET['session_id'];   

        // Include Stripe PHP library 
        require_once 'stripe-php/init.php';
        
        // Set API key
        \Stripe\Stripe::setApiKey('sk_test_51LHzhDJ6IibYh1aVzRXYMhZFq2wd7avqQvlzWiqP0y2J9meDJP1znvE8L8M3PFjZ2Mv9l0OYle4hOoD6FVyN70j300Dgdg7zFU');
        
        // Fetch the Checkout Session to display the JSON result on the success page
        try {
            $checkout_session = \Stripe\Checkout\Session::retrieve($session_id);
        }catch(Exception $e) { 
            $api_error = $e->getMessage(); 
        }

        echo "<hr>" . $checkout_session;


// Retrieves the details of customer
            try {
                // Create the PaymentIntent
                $customer = \Stripe\Customer::retrieve($checkout_session->customer);
            } catch (\Stripe\Exception\ApiErrorException $e) {
                $api_error = $e->getMessage();
            }

echo "<hr>" . $customer;


      
            // Retrieve the details of a PaymentIntent
            try {
                $intent = \Stripe\PaymentIntent::retrieve($checkout_session->payment_intent);
            } catch (\Stripe\Exception\ApiErrorException $e) {
                $api_error = $e->getMessage();
            }

echo "<hr>" . $intent;


echo "<hr>";

$id_cliente = $checkout_session->metadata->id_cliente;
$id_plano = $checkout_session->metadata->id_plano;
$valor = $checkout_session->amount_total;

echo "Id: $id_cliente Valor: $valor";

echo "<hr>";

$sql = "INSERT INTO pagamento(ID_cliente, ID_plano, Valor, Status) VALUES($id_cliente, $id_plano, $valor, 'realizado')"; 

//Executa o SQL e faz tratamento de erros
if ($conn->query($sql) === TRUE) {
  echo "Gravado com sucesso.";
} else { 
  echo "Error: " . $sql . "<br>" . $conn->error;
}

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