<?php
$statusLembrar = false;
$correto[1] = "";
$correto[2] = "";
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Cartão fidelidade - Login</title>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(
hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link rel="stylesheet" href="../css/style.css" media="all" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Tulpen+One' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="../js/jquery.js"></script>
</head>
<body>
<div class="wrap">
<div class="header">
  <div class="logo">
	<span><img src="../images/logo.png" width="100%" /></span>
</div>
  <div class="clear"></div>
   <div class="slider"></div>
<div class="clear"></div>
</div>
<div class="main top">
<div class="section group">
	<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h2>Insira seus dados para acessar seus cartões</h2>
					    <form method="post" action="valida.php" id="formularios">
				    	  <div>
						    	<span>
						    	<label>E-mail</label></span>
						    	<span><input name="usuario" maxlength="50" type="text" value="<?php echo $correto[1]; ?>"></span>
						    </div>
                            
                            <div>
						    	<span>
						    	<label>Senha</label></span>
						    	<span><input name="senha" maxlength="50" type="password" value="<?php echo $correto[2]; ?>"></span>
						    </div>
							
							<div>
						    	<span><input name="logado" maxlength="50" <?php echo $statusLembrar ?> type="checkbox" >Lembre meus dados</span>
							</div>
                            
				    	  <div>
				   		    <span><input type="submit" value="Entrar">
                            <input type="reset" value="Limpar"></span>
						  </div>
					    </form>
				  </div>
  				</div>
            <br />
            <a href="../cria-conta.php"><span>Criar conta</span></a><br />
			
			<?php echo '<a href="'.$loginUrl.'"><span>Login com Facebook</span></a></br>'; ?>
			<!-- <a href="../facebook/"><span>Entrar com Facebook</span></a><br /> -->
			
			<a href="../recupera-senha.php"><span>Esqueci minha senha</span></a>
</div>
</div>
</div>

<br />
<br />
<br />

<!-- <div class="ftr-top">
  <div class="footer">
	<p class="w3-link">&nbsp;</p>
  </div>
</div> -->
</body>
</html>