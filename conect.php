<?php
$host = 'localhost';
$user = 'root';
$senha = '';
$nome = 'banco';
$porta = '3381';

$conexao = new mysqli($host, $user, $senha, $nome, $porta);

if ($conexao->connect_error) {
    echo "Conexão falhou!";
} else {
    echo "Conexão realizada com sucesso!";
    $conexao->close();//fecha a conexão
}

?>