<?php
    session_start();
    unset($_SESSION['id_usuario']);
    unset($_SESSION['id_empresa']);
    unset($_SESSION['carrinho']);
    unset($_SESSION['acesso']);
    header('location: ../principal/login.html');
?>