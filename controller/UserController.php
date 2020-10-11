<?php
# SCRIPT DAS OPERAÇÕES COM O USUARIO NO SISTEMA: tudo certo!

// TUDO escrito corretamente!
require('../model/entidades/Usuario.php'); 
require('../model/dao/UserDao.php');
require_once('../model/dao/Conexao.php');

session_start();
$_SESSION['usuarioLogado'] = null;

// Recuperando valores do metodo GET
$emailLogin = $_POST['email'];
$senhaLogin = $_POST["senha"];

// Variavel de controle de validacao
$var = false;
// Usuario
$array_users = null;
$user_logado = null;

// Iniciar a funcao de conexao
try{
    $conexao = conectar();
    $array_users = buscarTodosUsuarios($conexao);
}
catch(PDOException $e){
    echo "Erro: ".$e->getCode();
    echo "<br>Messagem: ".$e->getMessage();
}

// Validando o usuario: FUNCIONANDO NORMALMENTE!.
foreach($array_users as $user){
    if((strcasecmp($emailLogin, $user['email']) == 0) and ($senhaLogin == $user['senha'])){
        $_SESSION['validacao'] = true;
        $var = true;
        # Instanciar isso direito:
        $userLogado = new Usuario($user['IDUsuario'], $user['nome'], $user['email'], $user['senha']);
        //Passando o objeto!
        $_SESSION['usuario'] = $userLogado;
        $_SESSION['id_user'] = $user['IDUsuario']; // para nao ter que passar um objeto de usuario para o dao.
    }
    
}

// Logica de redirecionamento:
if($var){
    header('Location: ../menu.php?login=logado');
}else{
    $_SESSION['validacao'] = false;
    header('Location: ../index.php?login=erro1');
}

// *Faltou fechar a conexao!
?>


