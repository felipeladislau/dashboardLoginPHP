<?PHP
include("bloqueio/seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Alteração de senha</title>
<link href="styles/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
</head>

<body>



<div class="logout">
	<br />
	<a href="index.php">Menu</a><br />
	<a href="bloqueio/logout.php">Logout</a>
</div>



<div class="content-bg">
  <div class="content">
		
        <p align="center"><h1>Mudança de senha.</h1></p>
		<br /><br />
        
		<form method="post" id="formularios">
        
      	<p><label>Nova senha:<input type="password" name="novaSenha" required="required" /></label><br /><br />
        <label>Digite novamente:<input type="password" name="novaSenha2" required="required" /></label>
        <br /><br />
        <input type="submit" class="botao" value="   Mudar" />       
        </form>
      </p>
        
      <?php
If(isset($_POST['novaSenha']) || isset($_POST['novaSenha2'])) { 
	
  $novaSenha = $_POST['novaSenha'];
  $novaSenha2 = $_POST['novaSenha2'];
  
  if($novaSenha == $novaSenha2){
	require("conectar.php");
	$id_user = $_SESSION['usuarioID'];
	
	mysql_query("UPDATE extrator_users SET senha='".$novaSenha."' WHERE id='".$id_user."'");
	mysql_query("UPDATE extrator_users SET logado='0' WHERE id='".$id_user."'");
	
	echo "<script>alert('Senha atualizada com sucesso!');</script>";
	echo "<script type='text/javascript'>
	<!--
	window.location = 'index.php'
	//-->
	</script>";
  }
  else{
	 echo "<br><br>As senhas não conferam! \n Tente novamente.";
  }
	  
}
?>
    </div>
</div>




</body>
</html>