<?php
    session_start();
    require 'conexao.php';
    //Checa se foi recebido o id do material e se o mesmo é um numero
    if(isset($_GET['id_material']) && is_numeric(($_GET['id_material']))){
        $id_material = $_GET['id_material'];

        //Busca as informações do material adicionado
        $sql = "SELECT * FROM material WHERE id = " . $id_material;
        $resultado = $conn->query($sql);

        //Checa se a consulta trouxe resultados
        if($resultado->num_rows > 0) {
            $row = $resultado->fetch_assoc();
            //Checando se o carrinho ja existe
            if(isset($_SESSION['carrinho']) && is_array($_SESSION['carrinho'])){
                //Checando se o produto já foi adicionado ao carrinho anteriormente
                if(array_key_exists($id_material, $_SESSION['carrinho'])){
                    echo '<h1> Produto já adicionado ao carrinho </h1>';
                } else {
                    //adicionando produto ao carrinho
                    $_SESSION['carrinho'][$id_material] = $id_material;
                    header('location: compra.php');
                }
            } else {
                //adicionando o primeiro item ao carrinho
                $_SESSION['carrinho'] = array($id_material => $id_material);
                header('location: compra.php');
            }
        } else {
            echo "<h1>Esse material não existe</h1>";
        }

    } else {
        echo "<h1>Nenhum material selecionado</h1>";
    }
