<?php

//Recebe Código de erro
$cod_erro = $_GET['cod_erro'];

//Códigos dos erros.
if($cod_erro==1)
{//Estabelecimento inválido
	$mensagem = "Ops, parece que o código do estabelecimento é inválido ou este cartão pertence à outra empresa, tente novamente.";
}
elseif($cod_erro==2)
{//Erro ao gerar código de verificação
	$mensagem = "Ops, ocorreu um erro ao gerar seu código, por favor informa ao suporte imediatamente pelo e-mail suporte@4steps.com.br.";
}
elseif($cod_erro==3)
{//Erro com código errado
	$mensagem = "O código digitado não confere com o código correto, por favor procure um colaborador para realizar a verificação.";
}
elseif($cod_erro==4)
{//Erro com código errado
	$mensagem = "Parece que houve algum problema na sua autenticação, verifique sua conexão e tente novamente.";
}
elseif($cod_erro==5)
{//Erro com código usado
	$mensagem = "Parece que este código já foi utilizado, para maior segurança faça o seu check-in diretamente com o caixa.";
}
elseif($cod_erro==6)
{//Não consta nenhum cartão ativo
	$mensagem = "Parece que por enquanto não temos nenhum cartão ativo, tente novamente em breve.";
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Insira o código</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(
hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link rel="stylesheet" href="css/style.css" media="all" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Tulpen+One' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
<div class="wrap">
<div class="header">
  <div class="logo">
	<h1><a href="index.html">Ops... Algo errado aqui!<span></span></a></h1>
</div>

	<div class="clear"></div>
   <div class="slider"></div>
<div class="clear"></div>
</div>
<div class="main top">
<div class="section group">
	<div class="col span_2_of_3">
				  <div class="contact-form">

					    <form>
				    	  <div>
						    	<h2><?php echo $mensagem; ?></h2>
						    </div><br/>
				    	  <div>
				   		    <a href="index.php"><span>Voltar ao começo</span></a>
						  </div>
					    </form>
				  </div>
  				</div>
</div>
</div>
<!-- <div class="ftr-top">
  <div class="footer">
	<p class="w3-link">&nbsp;</p>
  </div>
</div> -->
</body>
</html>

