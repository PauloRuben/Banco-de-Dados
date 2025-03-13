<?php
$host = 'localhost';
$user = 'root';
$senha = '';
$nome = 'banco';
$porta = '3381';

$conexao = new mysqli($host, $user, $senha, $nome, $porta);

$Nome = $_POST['nome'];
$Sobrenome = $_POST['sobrenome'];
$Data_Nascimento = $_POST['data_nascimento'];
$Estado_Civil = $_POST['estado_civil'];
$Sexo = $_POST['sexo'];
$Email = $_POST['email'];
$Telefone = $_POST['telefone'];
$Renda_Anual = $_POST['renda_anual'];
$Qtd_Filhos = $_POST['qtd_filhos'];
$Escolaridade = $_POST['escolaridade'];

$sql = "INSERT INTO clientes (Nome, Sobrenome, Data_Nascimento, Estado_Civil, Sexo, Email, Telefone, Renda_Anual, Qtd_Filhos, Escolaridade)VALUES ('$Nome', '$Sobrenome', '$Data_Nascimento', '$Estado_Civil', '$Sexo', '$Email', '$Telefone', '$Renda_Anual', '$Qtd_Filhos', '$Escolaridade')";

if ($conexao -> query($sql) === true){
    echo "Cliente cadastrado com sucesso";
    echo  "<br> <button><a href='clintes.php'>Voltar</a></button>";
    }
    else {
        echo "Error: ";
        echo "<button><a href='clintes.php'>Voltar</a></button>";
    }
    // Fecha a conexão com o banco de dados
    $conexao -> close();
?>

