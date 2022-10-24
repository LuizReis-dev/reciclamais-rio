<?php 
    require '../util/conexao.php';
    
    $id = $_GET["id"];
    $sql = "UPDATE operacao_comercial set status = 'entregue' WHERE id= $id ";
    
    if ($conn->query($sql) === TRUE) {
        header('location: vendas.php?pag=1');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }   
?>