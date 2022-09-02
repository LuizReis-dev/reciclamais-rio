<?php
if(!isset ($_SESSION['acesso']))
{
  unset($_SESSION['acesso']);
  header('location: ../principal/index.php');
  exit;
}
?>