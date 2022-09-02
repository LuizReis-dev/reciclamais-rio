<?php
session_start();
if(!isset ($_SESSION['acesso']))
{
  unset($_SESSION['acesso']);
  header('location:index.php');
  exit;
}else{
	if($_SESSION['acesso']!="admin"){
		    header('location:index.php'); 
			exit; 
	}
}
?>