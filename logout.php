<?PHP

session_start(); //iniciamos a sessão que foi aberta

	
	require("conectar.php");
	$estado = 0;
	$id_user = $_SESSION['usuarioID'];
	//mysql_query("UPDATE extrator_users SET logado='".$estado."' WHERE id='".$id_user."'");
	/*echo "<script>alert('Senha atualizada com sucesso!');</script>";
	echo "<script type='text/javascript'>
	<!--
	window.location = 'index.php'
	//-->
	</script>"; */

session_destroy(); //pei!!! destruimos a sessão ;)
session_unset(); //limpamos as variaveis globais das sessões
unset($_COOKIE['dindinLogado']);


echo '<script LANGUAGE="JavaScript" TYPE="text/javascript">alert("Logout efetuado com sucesso!");</script>'; 

echo "<script type='text/javascript'>
<!--
window.location = 'index.php'
//-->
</script>";

?>