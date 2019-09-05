<?php 
//Iniciar a sessão
session_start();
//Conectando com o banco de dados
require_once 'configDB.php';

if(insert($_SESSION['nomeUsuario'])){
    //echo "usuario logado!";
    $esuario = $_SESSION['nomeUsuario'];
    $sql = $conecta->prepare("SELECT * FROM usuario WHERE nomeUsuario = ?");
    $sql->bind_param("s", $usuario);
    $sql->execute();
    $resultado = $sql->get_result();
    $linha = $resultado->fetch_array(MYSQL_ASSOC);
    
    $nome = $linha['nome'];
    $email = $linha['email'];
    $dataCriacao = $linha['dataCriacao'];
}else{
    //kick
    header("location: index.php");
}