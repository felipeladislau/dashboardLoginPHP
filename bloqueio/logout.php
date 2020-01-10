<?PHP
include("../bloqueio/seguranca.php");
session_start(); //iniciamos a sessão que foi aberta

session_destroy(); //pei!!! destruimos a sessão ;)
session_unset(); //limpamos as variaveis globais das sessões


echo "<script type='text/javascript'>
<!--
window.location = '../bloqueio/index.php'
//-->
</script>";

// header("Location: ../bloqueio/login.php");

?>