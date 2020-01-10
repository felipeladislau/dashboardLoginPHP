<?PHP
include("bloqueio/seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página
?>



<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="images/logo.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form method="post">
                        <div class="form-group">
                            <label>Nova senha</label>
                            <input name="novaSenha" type="password" class="form-control" placeholder="Nova senha">
                        </div>
                        <div class="form-group">
                            <label>Confirmação do senha</label>
                            <input name="novaSenha2" type="password" class="form-control" placeholder="Confirmação">
                        </div>

						<div class="checkbox">
                            <label class="pull-right">
                                <a href="index.php">Voltar ao início</a>
                            </label>

						</div>
						
						<button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Alterar senha</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>






<?php
if(isset($_POST['novaSenha']) || isset($_POST['novaSenha2'])) { 
	
  $novaSenha = $_POST['novaSenha'];
  $novaSenha2 = $_POST['novaSenha2'];
  
  if($novaSenha == $novaSenha2){
	require("conectar.php");
	$id_user = $_SESSION['usuarioID'];
	
	mysql_query("UPDATE ".$tabela_usuarios." SET senha='".$novaSenha."' WHERE user_id='".$id_user."'");
	
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
