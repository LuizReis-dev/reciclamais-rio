<?php
    session_start();
    require 'acessocomum.php';
    require 'conexao.php';
    if(isset($_GET['id_material']) && is_numeric(($_GET['id_material']))){
        $id_material = $_GET['id_material'];

        $sql = "SELECT * FROM material WHERE id = " . $id_material;
        $resultado = $conn->query($sql);

        if($resultado->num_rows > 0) {
            $row = $resultado->fetch_assoc();
            if(isset($_SESSION['carrinho']) && is_array($_SESSION['carrinho'])){
                if(array_key_exists($id_material, $_SESSION['carrinho'])){
                    echo '<h1> Produto já adicionado ao carrinho </h1>';
                } else {
                    $_SESSION['carrinho'][$id_material] = $id_material;
                    header('location: compra.php');
                }
            } else {
                $_SESSION['carrinho'] = array($id_material => $id_material);
                header('location: compra.php');
            }
        } else {
            echo "<h1>Esse material não existe</h1>";
        }

    } else {
        echo "<h1>Nenhum material selecionado</h1>";
    }
