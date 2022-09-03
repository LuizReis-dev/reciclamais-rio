<?php
  session_start();
  unset($_SESSION['id_usuario']);
  unset($_SESSION['acesso']);
  header('location: ../principal/login.html');
?>