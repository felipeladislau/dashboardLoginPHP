<?PHP

require('credenciais.php');

//  Configurações do Script
// ==============================
$_SG['conectaServidor'] = true;    // Abre uma conexão com o servidor MySQL?
$_SG['abreSessao'] = true;         // Inicia a sessão com um session_start()?

$_SG['caseSensitive'] = false;     // Usar case-sensitive? Onde 'thiago' é diferente de 'THIAGO'

$_SG['validaSempre'] = true;       // Deseja validar o usuário e a senha a cada carregamento de página?
// Evita que, ao mudar os dados do usuário no banco de dado o mesmo contiue logado.

$_SG['servidor'] = $local_serve;    // Servidor MySQL
$_SG['usuario'] = $usuario_serve;          // Usuário MySQL
$_SG['senha'] = $senha_serve;                // Senha MySQL
$_SG['banco'] = $banco_de_dados;            // Banco de dados MySQL

$_SG['paginaLogin'] = 'bloqueio/index.php'; // Página de login

$_SG['tabela'] = 'empresas';       // Nome da tabela onde os usuários são salvos


// ==============================

// ======================================
//   ~ Não edite a partir deste ponto ~
// ======================================

// Verifica se precisa fazer a conexão com o MySQL
if ($_SG['conectaServidor'] == true) {
        
        $_SG['link'] = mysqli_connect($_SG['servidor'], $_SG['usuario'], $_SG['senha']) or die("MySQL: Não foi possível conectar-se ao servidor [".$_SG['servidor']."].");

        mysqli_select_db($_SG['link'], $_SG['banco']) or die("MySQL: Não foi possível conectar-se ao banco de dados [".$_SG['banco']."].");

}

// Verifica se precisa iniciar a sessão
if ($_SG['abreSessao'] == true) {

    ob_start();
    session_start();
    //session_cache_expire(60); Tempo em que a sessão irá expirar
    
}








/**
* Função que valida um usuário e senha
*
* @param string $usuario - O usuário a ser validado
* @param string $senha - A senha a ser validada
*
* @return bool - Se o usuário foi validado ou não (true/false)
*/
function validaUsuario($usuario, $senha) {

        global $_SG;

        $cS = ($_SG['caseSensitive']) ? 'BINARY' : '';

        // Usa a função addslashes para escapar as aspas
        $nusuario = addslashes($usuario);
        $nsenha = addslashes($senha);

        // Monta uma consulta SQL (query) para procurar um usuário
        $sql = "SELECT `empresa_id`, `nome`, `responsavel` FROM `".$_SG['tabela']."` WHERE ".$cS." `usuario` = '".$nusuario."' AND ".$cS." `senha` = '".$nsenha."' LIMIT 1";
        $query = mysqli_query($_SG['link'], $sql);
        $resultado = mysqli_fetch_assoc($query);


        // Verifica se encontrou algum registro
        if (empty($resultado)) {

                // Nenhum registro foi encontrado => o usuário é inválido
                return false;

        } else {
                // O registro foi encontrado => o usuário é valido

                // Definimos dois valores na sessão com os dados do usuário
                $_SESSION['usuarioID'] = $resultado['empresa_id']; // Pega o valor da coluna 'id do registro encontrado no MySQL
                $_SESSION['usuarioNome'] = $resultado['responsavel']; // Pega o valor da coluna 'nome' do registro encontrado no MySQL
                $_SESSION['usuarioEmpresa'] = $resultado['nome']; // Pega o valor da coluna 'empresa' do registro encontrado no MySQL

                // Verifica a opção se sempre validar o login
                if ($_SG['validaSempre'] == true) {
                        // Definimos dois valores na sessão com os dados do login
                        $_SESSION['usuarioLogin'] = $usuario;
                        $_SESSION['usuarioSenha'] = $senha;
                }

                return true;
        }
}









/**
* Função que protege uma página
*/
function protegePagina() {
        global $_SG;

        if (!isset($_SESSION['usuarioID']) OR !isset($_SESSION['usuarioNome'])) {
                // Não há usuário logado, manda pra página de login
                expulsaVisitante();
        } else if (!isset($_SESSION['usuarioID']) OR !isset($_SESSION['usuarioNome'])) {
                // Há usuário logado, verifica se precisa validar o login novamente
                if ($_SG['validaSempre'] == true) {
                        // Verifica se os dados salvos na sessão batem com os dados do banco de dados
                        if (!validaUsuario($_SESSION['usuarioLogin'], $_SESSION['usuarioSenha'])) {
                                // Os dados não batem, manda pra tela de login
                                echo "<script>alert('Usuário e/ou senha inválidos, tente novamente.\nCaso tenha criado sua conta com o Facebook, realize seu primeiro acesso com sua senha que foi enviada por e-mail.');</script>";
                                expulsaVisitante();
                        }
                }
        }
        return true;
}








/**
* Função para expulsar um visitante
*/
function expulsaVisitante() {
            global $_SG;

            // Remove as variáveis da sessão (caso elas existam)
            unset($_SESSION['usuarioID'], $_SESSION['usuarioNome'], $_SESSION['usuarioLogin'], $_SESSION['usuarioSenha']);

            // Manda pra tela de login
            header("Location: ".$_SG['paginaLogin']);
            // echo '<script type="text/javascript">
            // <!--
            // window.location = "bloqueio/index.php"
            // -->
            // </script>';

}









/**
* Função para expulsar um visitante
*/
function expulsaVisitante2() {
        global $_SG;

        // Remove as variáveis da sessão (caso elas existam)
        unset($_SESSION['usuarioID'], $_SESSION['usuarioNome'], $_SESSION['usuarioLogin'], $_SESSION['usuarioSenha']);

        // Manda pra tela de login
        //header("Location: ".$_SG['paginaLogin']);
        echo '<script type="text/javascript">
        <!--
        window.location = "../bloqueio/index.php"
        //-->
        </script>';

}

?>
