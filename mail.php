<?PHP

require_once('requires/class.phpmailer.php');
	 
$mailer = new PHPMailer();
$mailer->IsSMTP();
$mailer->SMTPDebug = 1;
$mailer->Port = 25; //Indica a porta de conexão para a saída de e-mails. Utilize obrigatoriamente a porta 587.
	 
$mailer->Host = 'localhost'; //Onde em 'servidor_de_saida' deve ser alterado por um dos hosts abaixo:
//Para cPanel: 'localhost';
//Para Plesk 11 / 11.5: 'smtp.dominio.com.br';

/************************************************************************/
//Parametros iniciais

$assunto = $_POST['assunto'];

$mensagem = $_POST['mensagem'];
        
$destino = $_POST['destino'];

	 
//Descomente a linha abaixo caso revenda seja 'Plesk 11.5 Linux'
//$mailer->SMTPSecure = 'tls';
	 
$mailer->SMTPAuth = true; //Define se haverá ou não autenticação no SMTP
$mailer->Username = 'nao-responda@seudominio.com.br'; //Informe o e-mai o completo
$mailer->Password = '123mudar.'; //Senha da caixa postal
$mailer->FromName = 'SUA EMPRESA - Não responda'; //Nome que será exibido para o destinatário
$mailer->From = 'nao-responda@seudominio.com.br'; //Obrigatório ser a mesma caixa postal indicada em "username"
$mailer->AddAddress($destino); //Destinatários
$mailer->Subject = $assunto;
$mailer->Body = $mensagem;



if(!$mailer->Send())
	{
	
	?>
	<script type='text/javascript'>
	var usuario = "<?php echo $email; ?>";
	var senha = "<?php echo $senha; ?>";
	
	alert('Sua senha temporária não pode ser enviada por e-mail, seu login será efetuado, solicite seus dados pelo e-mail suporte@4steps.com.br.\nObrigado.');
	location.href = "../app/bloqueio/valida.php?usuario=" + usuario + "&senha=" + senha +"";
	</SCRIPT>
	<?php
	}else{

		// Sua senha temporária foi enviada por e-mail, faça seu primeiro login e a altere.\nCaso tenha criado sua conta com o Facebook, faça seu login clicando em "Entrar com o Facebook" sem a sua senha.\nObrigado.
		?>
		<script type='text/javascript'>
		var usuario = "<?php echo $email; ?>";
		var senha = "<?php echo $senha; ?>";
		
		alert('Sua senha temporária foi enviada por e-mail, seu login será efetuado, altere sua senha assim que possível.\nObrigado.');
		location.href = "../app/bloqueio/valida.php?usuario=" + usuario + "&senha=" + senha +"";
		</SCRIPT>
		<?php

	}
   	


?>