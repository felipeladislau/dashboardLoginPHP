<?PHP
include("../bloqueio/seguranca.php");
session_start(); //iniciamos a sess�o que foi aberta

session_destroy(); //pei!!! destruimos a sess�o ;)
session_unset(); //limpamos as variaveis globais das sess�es


echo "<script type='text/javascript'>
<!--
window.location = '../bloqueio/index.php'
//-->
</script>";

// header("Location: ../bloqueio/login.php");

?>