<?PHP

// faz conexao com o servidor MySQL
$local_serve = "localhost"; 	 // local do servidor
$usuario_serve = "root";		 // nome do usuario
$senha_serve = "";			 	 // senha
$banco_de_dados = "aprovacoes"; 	 // nome do banco de dados
$tabela_usuarios = "clientes";		//Tabela de usuarios

$con = @mysqli_connect($local_serve,$usuario_serve,$senha_serve) or die ("O servidor não responde!");

mysqli_select_db($con, $banco_de_dados);
mysqli_set_charset($con, 'UTF8');




?>
