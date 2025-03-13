<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="Produtos-CSS.css">
</head>
<body>
<?php
//include 'conect.php';
$host = 'localhost';
$user = 'root';
$senha = '';
$nome = 'banco';
$porta = '3381';

$conexao = new mysqli($host, $user, $senha, $nome, $porta);

$sql = "SELECT * FROM produtos";
$resultado = $conexao->query($sql);
if ($resultado ->num_rows > 0) {
    echo "<h1>Produtos</h1>";
    echo "<button><a href='index.html'>Voltar</a></button>
    <button><a href='novo_produto.html'>Novo</a></button>";   
    echo "<table border='1'>
    <tr>
        <th>Id Produto</th>
        <th>Nome</th>
        <th>Id Categoria</th>
        <th>Marca</th>
        <th>Num serie</th>
        <th>Preco unit</th>
        <th>Custo unit</th>
    </tr>";
    while($row = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>". $row["ID_Produto"]. "</td>";
        echo "<td>". $row["Nome_Produto"]. "</td>";
        echo "<td>". $row["ID_Categoria"]. "</td>";
        echo "<td>". $row["Marca_Produto"]. "</td>";
        echo "<td>". $row["Num_Serie"]. "</td>";
        echo "<td>". $row["Custo_Unit"]. "</td>";
        echo "<td>". $row["Preco_Unit"]. "</td>";
        echo "</tr>";
    }
 echo "</table>";

} else{
    echo "0 resultados";
    echo "<br></br>";
    echo "<button><a href='index.html'>Voltar</a></button>";
}
$conexao->close();
?>
</body>
</html>