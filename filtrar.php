<?php

$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'banco';
$porta = '3381';

$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName,$porta);
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
} 

// Captura direta do filtro de nome
$filtroid = isset($_GET['filtroid']) && !empty($_GET['filtroid']) && $_GET['filtroid'] !== 'vazio' ? $_GET['filtroid'] : '';
$filtro = isset($_GET['filtro']) && !empty($_GET['filtro']) && $_GET['filtro'] !== 'vazio' ? $_GET['filtro'] : '';
$filtrosobre = isset($_GET['filtrosobre']) && !empty($_GET['filtrosobre']) && $_GET['filtrosobre'] !== 'vazio' ? $_GET['filtrosobre'] : '';
$filtrodata = isset($_GET['filtrodata']) && !empty($_GET['filtrodata']) && $_GET['filtrodata'] !== 'vazio' ? $_GET['filtrodata'] : '';
$filtrocivil = isset($_GET['filtrocivil']) && !empty($_GET['filtrocivil']) && $_GET['filtrocivil'] !== 'vazio' ? $_GET['filtrocivil'] : '';

// Construção da consulta SQL
$sql = "SELECT * FROM clientes where 1=1"; 
if ($filtrocivil) {
    $sql .= " AND Estado_Civil LIKE '%". $conexao->real_escape_string($filtrocivil). "%'" ;
}
if ($filtrodata) {
    $sql .= " AND Data_Nascimento LIKE '%". $conexao->real_escape_string($filtrodata). "%'" ;
}
if ($filtrosobre) {
    $sql .= " AND Sobrenome LIKE '%". $conexao->real_escape_string($filtrosobre). "%'" ;
}
if ($filtro) {
    $sql .= " AND Nome LIKE '%". $conexao->real_escape_string($filtro). "%'" ;
}

if ($filtroid) {
    $sql .= " AND ID_Cliente = '". $conexao->real_escape_string($filtroid). "'" ;
}
echo "Filtro: '$sql' <br>";  // Adicione isso para ver o valor do filtro

// Execução da consulta
$resultado = $conexao->query($sql);

// Exibição dos resultados em tabela
if ($resultado->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Data de Nascimento</th>
                <th>Estado Civil</th>
                <th>Sexo</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Renda Anual</th>
                <th>Qtd Filhos</th>
                <th>Escolaridade</th>
            </tr>";

    while ($row = $resultado->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['ID_Cliente'] . "</td>
                <td>" . $row['Nome'] . "</td>
                <td>" . $row['Sobrenome'] . "</td>
                <td>" . $row['Data_Nascimento'] . "</td>
                <td>" . $row['Estado_Civil'] . "</td>
                <td>" . $row['Sexo'] . "</td>
                <td>" . $row['Email'] . "</td>
                <td>" . $row['Telefone'] . "</td>
                <td>" . $row['Renda_Anual'] . "</td>
                <td>" . $row['Qtd_Filhos'] . "</td>
                <td>" . $row['Escolaridade'] . "</td>
            </tr>";
    }
    echo "</table>";
    echo '<button onclick="window.location.href=\'Editar.html\'">Editar   </button>';
} else {
    echo "Nenhum registro encontrado!";
}

$conexao->close();

echo '<button onclick="window.location.href=\'index.html\'">Home</button>';


?>
 
