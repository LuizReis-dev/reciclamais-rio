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
} catch (Exception $e) {
    $api_error = $e->getMessage();
}

$teste = "0";
$id_cliente = $checkout_session->metadata->id_cliente;
$quantidade = $checkout_session->metadata->$teste;
$valor = $checkout_session->amount_total / 100;

$quantidadeMateriais = json_decode($quantidade);

$sqlOperacaoComercial = "INSERT INTO operacao_comercial(id_empresa, tipo,total_final, total_sugerido, status) VALUE($id_cliente, 'v', $valor, $valor, 'pendente')";
if ($conn->query($sqlOperacaoComercial) === TRUE) {
    $id_op = $conn->insert_id;
    foreach ($quantidadeMateriais as $material) {
        $sqlMatOp = "INSERT INTO materias_em_op(id_operacao_comercial, id_material, total_em_kg) VALUES($id_op,$material->material, $material->quantidade)";
        
        $sqlAtualizar = "UPDATE material set qtd_disponivel_venda = qtd_disponivel_venda - $material->quantidade WHERE id = $material->material";
        $conn->query($sqlAtualizar);
        if ($conn->query($sqlMatOp)) {
            $emailcliente = $checkout_session->customer_details->email;
            $nomecliente = $checkout_session->customer_details->name;
            $texto = "Olá " . $nomecliente . " informamos que sua compra no valor de R$" . $valor . " foi registrada e seu pedido será entregue em menos de 3 dias";
            require '../util/enviaremail.php';
            enviaremail($nomecliente, $emailcliente, "Compra Realizada", $texto);
            unset($_SESSION['carrinho']);
            header('location: index.php');
        }
    }
    }else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

//Fecha a conexão.
$conn->close();