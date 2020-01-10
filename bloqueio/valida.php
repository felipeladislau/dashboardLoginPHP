<?PHP

// Inclui o arquivo com o sistema de segurança
include("seguranca.php");

// Verifica se um formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Salva duas variáveis com o que foi digitado no formulário
	// Detalhe: faz uma verificação com isset() pra saber se o campo foi preenchido
	$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
	$senha = (isset($_POST['senha'])) ? $_POST['senha'] : '';

	// Utiliza uma função criada no seguranca.php pra validar os dados digitados
	if (validaUsuario($usuario, $senha) == true) {
		// O usuário e a senha digitados foram validados, manda pra página interna
		// checaLogado($_SESSION['logado']);

		if(isset($_POST['logado']))
		{
			$hash = base64_encode('a1s2d3'.$usuario.'a1s2d3'.$senha);
			$hashh = base64_encode($hash);
			setcookie('dindinLogado', $hash, (time() + (3 * 24 * 3600)), "/" );
		}

		echo '<script type="text/javascript">
		<!--
		window.location = "../index.php"
		//-->
		</script>';
		
	} else {
	// O usuário e/ou a senha são inválidos, manda de volta pro form de login
	// Para alterar o endereço da página de login, verifique o arquivo seguranca.php
	echo "<script>alert('Usuário e/ou senha inválidos, tente novamente.');</script>";

	expulsaVisitante2();
	echo '<script LANGUAGE="JavaScript" TYPE="text/javascript">alert("Usuário e/ou senha inválidos. Tente novamente.");</script>'; 
	}
}else{

	$usuario = $_GET['usuario'];
	$senha = $_GET['senha'];


	if (validaUsuario($usuario, $senha) == true) {
		// O usuário e a senha digitados foram validados, manda pra página interna
		// checaLogado($_SESSION['logado']);

		if(isset($_POST['logado']))
		{
			$hash = base64_encode('a1s2d3'.$usuario.'a1s2d3'.$senha);
			$hashh = base64_encode($hash);
			setcookie('dindinLogado', $hash, (time() + (3 * 24 * 3600)), "/" );
		}

		echo '<script type="text/javascript">
		<!--
		window.location = "../index.php"
		//-->
		</script>';
	} elseif( empty($usuario) && empty($senha) ) {
		
	echo "<script>alert('Você ainda não atualizou sua conta com seu Facebook, por favor realize o login com seu e-mail e sua senha e atualize sua conta com seu Facebook no menu inicial.');</script>";
	expulsaVisitante2();
	// echo '<script LANGUAGE="JavaScript" TYPE="text/javascript">alert("Você ainda não atualizou sua conta com seu Facebook, por favor realize o login com seu e-mail e sua senha e atualize sua conta com seu Facebook no menu inicial.");</script>'; 

	}else{
		echo "<script>alert('Usuário e/ou senha inválidos, tente novamente.');</script>";
		expulsaVisitante2();
		// echo '<script LANGUAGE="JavaScript" TYPE="text/javascript">alert("Usuário e/ou senha inválidos. Tente novamente.");</script>'; 

	}

}

?>