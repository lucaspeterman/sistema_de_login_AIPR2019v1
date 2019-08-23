<?php 
//configDb.php

//Dados para escolha do DataBase(DB)
$dbhost = "localhost";
$dbuser = "root"; //Usuário raiz (Rute)
$dbpass = "";
$dbname = "sistemaDeLogin";

//Conexão com o banco de dados
$conecta = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
if ($conecta-> connect_error){
    die("Não foi possível conectar ao banco de dados: " . $conecta->connect_error);
}else{
    echo "<h1> conectou no BD Manowwwwww!</h1>";
}