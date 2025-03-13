<?php
$host = 'localhost';
$user = 'root';
$senha = '';
$nome = 'banco';
$porta = '3381';

$conexao = new mysqli($host, $user, $senha, $nome, $porta);
if ($conexao->connect_error){
    die("Erro na conexão: " . $conexao->connect_error);
}

$Nome =$_GET['Nome'];

$sql = "SELECT * FROM clientes WHERE    Nome= '$Nome'";

$resultado = $conexao->query($sql);

if($resultado ->num_rows > 0) {
    $cliente = $resultado->fetch_assoc();
    echo '<form action="atualizar.php" method="POST">
            <label for="ID_cliente">ID do Cliente:</label>
            <input type="text" id="ID_cliente" name="ID_Cliente" value="' . $cliente['ID_Cliente'] . '" readonly>

            <label for="novo_nome">Nome:</label>
            <input type="text" id="novo_nome" name="novo_nome" value="' . $cliente['Nome'] . '" required>

            <label for="novo_sobrenome">Sobrenome:</label>
            <input type="text" id="novo_sobrenome" name="novo_sobrenome" value="' . $cliente['Sobrenome'] . '" required>

            <label for="novo_estado_civil">Estado Civil:</label>
            <input type="text" id="novo_estado_civil" name="novo_estado_civil" value="' . $cliente['Estado_Civil'] . '" required>

            <label for="nova_data_nascimento">Data de Nascimento:</label>
            <input type="text" id="nova_data_nascimento" name="nova_data_nascimento" value="' . $cliente['Data_Nascimento'] . '" required>

            <label for="novo_email">E-mail:</label>
            <input type="email" id="novo_email" name="novo_email" value="' . $cliente['Email'] . '" required>

            <label for="novo_telefone">Telefone:</label>
            <input type="text" id="novo_telefone" name="novo_telefone" value="' . $cliente['Telefone'] . '" required>

            <input type="submit" value="Atualizar Cliente">
        </form>';
}
else {
    echo "Nenhum cliente encontrado!";
}
$conexao->close();


?>