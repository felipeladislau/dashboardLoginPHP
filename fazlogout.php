<?PHP

session_start(); //iniciamos a sessão que foi aberta

//require("conectar.php");
$estado = 0;
$id_user = $_SESSION['usuarioID'];
// mysql_query("UPDATE extrator_users SET logado='".$estado."' WHERE id='".$id_user."'");


session_destroy(); //pei!!! destruimos a sessão ;)
session_unset(); //limpamos as variaveis globais das sessões
setcookie('dindinLogado', "", (time() + (3600)), "/" );

unset($_SESSION["fb_user_details"]);

//echo '<script LANGUAGE="JavaScript" TYPE="text/javascript">alert("Logout efetuado com sucesso!");</script>'; 
echo "<script type='text/javascript'>
<!--
window.location = 'index.php'
//-->
</script>";


?>