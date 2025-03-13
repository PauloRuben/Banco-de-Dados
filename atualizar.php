<?php

$host = 'localhost';
$user = 'root';
$senha = '';
$nome = 'banco';
$porta = '3381';

$conexao = new mysqli($host, $user, $senha, $nome, $porta);



if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// Verifica se os dados foram enviados
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura os dados do formulário
    $ID_cliente = $_POST['ID_cliente']; // ID do cliente
    $novo_nome = $_POST['novo_nome']; // Nome atualizado
    $novo_sobrenome = $_POST['novo_sobrenome']; // Sobrenome atualizado
    $novo_estado_civil = $_POST['novo_estado_civil']; // Sobrenome atualizado
    $nova_data_nascimento = $_POST['nova_data_nascimento']; // Data de nascimento atualizado
    $novo_email = $_POST['novo_email']; // E-mail atualizado
    $novo_telefone = $_POST['novo_telefone']; // Telefone atualizado

    // Atualiza os dados no banco de dados
    $sql = "UPDATE clientes SET 
    Nome = '$novo_nome', 
    Sobrenome = '$novo_sobrenome', 
    Estado_Civil = '$novo_estado_civil', 
    Data_Nascimento = '$nova_data_nascimento', 
    Email = '$novo_email', 
    Telefone = '$novo_telefone' 
    WHERE id_cliente = $id_cliente";

    if ($conexao->query($sql) === TRUE) {
        echo "Dados do cliente atualizados com sucesso!";
    } else {
        echo "Erro ao atualizar dados: " . $conexao->error;
    }
}

$conexao->close();

echo '<br> <button onclick="window.location.href=\'index.html\'">Home</button>';
?>
