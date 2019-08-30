<?php
//É necessário fazer a conexão com o Banco de Dados
require_once "configDB.php";
function verificar_entrada($entrada)
{
    $saida = trim($entrada); //Remove espaços antes e depois
    $saida = stripslashes($saida); //remove as barras
    $saida = htmlspecialchars($saida);
    return $saida;
}
if (
    isset($_POST['action']) &&
    $_POST['action'] == 'cadastro'
) {
    //Pegar os campos do formulário
    $nomeCompleto = verificar_entrada($_POST['nomeCompleto']);
    $nomeUsuario = verificar_entrada($_POST['nomeUsuário']);
    $emailUsuario = verificar_entrada($_POST['emailUsuário']);
    $senhaUsuario = verificar_entrada($_POST['senhaUsuário']);
    $senhaConfirma = verificar_entrada($_POST['senhaConfirma']);
    $concordar = $_POST['concordar'];
    $dataCriacao = date("Y-m-d H:i:s");



    //Hash de senha / Codificação de senha em 40 caracteres
    $senha = sha1($senhaUsuario);
    $senhaC = sha1($senhaConfirma);

    if ($senha != $senhaC) {
        echo "<h1>As senhas não conferem</h1>";
        exit();
    } else {
        //echo "<h5> senha codificada: $senha</h5>";
        //Verificar se o usuário ja existe no banco de dados
        $sql = $conecta->prepare("SELECT nomeUsuario, email FROM usuario WHERE nomeUsuario = ? OR email = ?");
        $sql->bind_param("SS",$nomeUsuario, $emailUsuario);
        $sql->execute();
        $resultado = $sql->get_result();
        $linha = $rsultado->fetch_arrey(MYSQLI_ASSOC);
        if($linha['nomeUsuario'] == $nomeUsuario){
            echo "<p>Nome de usuário indisponival, tente outro</p>";
        }elseif ($linha['email'] == $emailUsuario){
            echo "<p>E-mail ja em usso tente outro</p>";
        }else{
            $sql = $conecta->prepare("INSERT into usuario (nome, nomeUsuario, email, senha, dataCriacao)values(?,?,?,?,?)");
            $sql->bind_param("sssss",$nomeCompleto, $nomeUsuario, $emailUsuario, $senha, $dataCriacao);
            if($sql->execute()){
                echo "<p>Registrado com socesso</p>";
            }else{
                echo "<p>Algo deu errado. tente novamente</p>";
            }
        }
    }
} else {
    echo "<h1 style='color:red'>Esta página não pode 
    ser acessada diretamente</h1>";
}
