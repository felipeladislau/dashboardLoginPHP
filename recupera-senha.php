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
                            <label>E-mail</label>
                            <input name="email" type="email" class="form-control" placeholder="E-mail">
                        </div>
                        <div class="form-group">
                            <label>Confirmação do e-mail</label>
                            <input name="email2" type="email" class="form-control" placeholder="Confirmação">
                        </div>

						<div class="checkbox">
                            <label class="pull-right">
                                <a href="index.php">Voltar ao início</a>
                            </label>

						</div>
						
						<button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Enviar senha</button>
                        
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

if(isset($_POST['email']) || isset($_POST['email2'])) { 
	
  $email = $_POST['email'];
  $email2 = $_POST['email2'];

  if($email == $email2){
	 
	  
	require("conectar.php");
	
	
	// Monta uma consulta SQL (query) para procurar um usuário
	$sql = "SELECT `nome`, `usuario`, `senha`, `email` FROM `".$tabela_usuarios."` WHERE `email`='".$email."'";
	$query = mysql_query($sql);
	$resultado = mysql_fetch_assoc($query);
	
	if(empty($resultado)){
		
		echo "<script type='text/javascript'>";
	 	echo "alert('Este email não consta na nossa base de dados =( \nEntre em contato com o nosso suporte.');";
	 	echo "</script>";

	}else{

$mensagem = "Olá ".$resultado['nome'].", aqui estão seus dados.
			Aqui estão seus dados para acessar o app DinDin Vivo, utilize eles no seu acesso e altere sua senha caso prefira.
	
			Usuário: ".$resultado['usuario']."
			Senha: ".$resultado['senha']."					
		
			Obrigado e ótimo dia!";



	require_once('requires/class.phpmailer.php');
	 
	$mailer = new PHPMailer();
	$mailer->IsSMTP();
	$mailer->SMTPDebug = 1;
	$mailer->Port = 25; //Indica a porta de conexão para a saída de e-mails. Utilize obrigatoriamente a porta 587.
		 
	$mailer->Host = 'localhost'; //Onde em 'servidor_de_saida' deve ser alterado por um dos hosts abaixo:
	//Para cPanel: 'localhost';
	//Para Plesk 11 / 11.5: 'smtp.dominio.com.br';
		 
	//Descomente a linha abaixo caso revenda seja 'Plesk 11.5 Linux'
	//$mailer->SMTPSecure = 'tls';
	
	$mailer->IsHtml = true;
	$mailer->SMTPAuth = true; //Define se haverá ou não autenticação no SMTP
	$mailer->Username = 'nao-responda@4steps.com.br'; //Informe o e-mai o completo
	$mailer->Password = 'Epilef381771.,'; //Senha da caixa postal
	$mailer->FromName = '4 Steps - Não responda'; //Nome que será exibido para o destinatário
	$mailer->From = 'nao-responda@4steps.com.br'; //Obrigatório ser a mesma caixa postal indicada em "username"
	$mailer->AddAddress($email); //Destinatários
	$mailer->Subject = "Recuperação de senha App 4 Steps";
	$mailer->Body = $mensagem;
	$mailer->CharSet = 'UTF-8';



	if(!$mailer->Send()){

	?>
	<script type='text/javascript'>
	var usuario = "<?php echo $email; ?>";
	var senha = "<?php echo $senha; ?>";
	
	alert('Sua senha temporária não pode ser enviada por e-mail, seu login será efetuado, solicite seus dados pelo e-mail suporte@4steps.com.br.\nObrigado.');
	location.href = "index.php";
	</SCRIPT>
	<?php

	}else{
	// Mail error
	?>
	<script type='text/javascript'>
	var usuario = "<?php echo $email; ?>";
	var senha = "<?php echo $senha; ?>";
	
	alert('Prontinho, acabamos de te enviar um e-mail com sua senha, caso não tenha recebido entre em contato pelo e-mail suporte@4steps.com.br');
	location.href = "index.php";
	</SCRIPT>
	<?php

	}

		
	}
	
	$email = $_SESSION['usuarioID'];
	
  }
  else{
	 echo "<script type='text/javascript'>";
	 echo "alert('Os emails não conferam! \n Tente novamente.');";
	 echo "</script>";

  }
	  
}
?>