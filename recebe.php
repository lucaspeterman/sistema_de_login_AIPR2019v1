<?php

require_once "configDB.php";

function verificar_entrada($entrada){
    $saida = trim($entrada);
    $saida = stripslashes($saida);
    $saida = htmlspecialchars($saida);
    return $saida;
}

if(isset($_POST['action']) && $_POST['action']== 'cadastro'){
    $nomeCompleto = verificar_entrada($_POST ['nomeCompleto']);
    $nomeUsuario = verificar_entrada($_POSt ['nomeUsuário']);
    $emailUsuario = verificar_entrada($_POST ['emailUsuário']);
    $senhaUsuario = verificar_entrada($_POST ['senhaUsuário']);
    $senhaConfirma = verificar_entrada($_POSt ['senhaUsuário']);
    $concordar = $_POST['concordar'];
    $dataCriacao = date("Y-m-d H:i:s");

    echo "<h5>Nome completo: $nomeCompleto</h5>";
    echo "<h5>Nome Usuário: $nomeUsuario</h5>";
    echo "<h5>E-mail Usuário: $emailUsuario</h5>";
    echo "<h5>Senha Usuário: $senhaUsuario</h5>";
    echo "<h5>Senha Confirma: $senhaComfirma</h5>";
    echo "<h5>Concordar: $concordar</h5>";
    echo "<h5>Data Crição: $dataCriacao</h5>";

    if($senha!= $senhaC){
        echo "<h1>As senhas não conferem</h1>";
        exit();
    }else{
        echo "<h5>senha codificada: $senha</h5>";
    }

    $senha = sha1($senhaUsuario);
    $senhaC = sha1($senhaConfirma);
    }else{
    echo"<h1 style= 'color:red'> Esta página não pode ser acessada diretamente</h1>";
    }