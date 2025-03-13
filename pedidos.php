<?php
//include 'conect.php';
$host = 'localhost';
$user = 'root';
$senha = '';
$nome = 'banco';
$porta = '3381';

$conexao = new mysqli($host, $user, $senha, $nome, $porta);

$sql = "SELECT * FROM pedidos";
$resultado = $conexao->query($sql);
if ($resultado ->num_rows > 0) {
    echo "<h1>Pedidos</h1>";
    echo "<button><a href='index.html'>Voltar</a></button>
    <br></br>";   
    echo "<table border='1'>
    <tr>
        <th>Id Pedidos</th>
        <th>Data</th>
        <th>Id Loja</th>
        <th>Id Produto</th>
        <th>Id Cliente</th>
        <th>Qtd</th>
        <th>Receita</th>
        <th>Custo</th>
        <th>Custo unit</th>
        <th>Preço unit</th>
    </tr>";
    while($row = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>". $row["ID_Pedido"]. "</td>";
        echo "<td>". $row["Data_Venda"]. "</td>";
        echo "<td>". $row["ID_Loja"]. "</td>";
        echo "<td>". $row["ID_Produto"]. "</td>";
        echo "<td>". $row["ID_Cliente"]. "</td>";
        echo "<td>". $row["Qtd_Vendida"]. "</td>";
        echo "<td>". $row["Receita_Venda"]. "</td>";
        echo "<td>". $row["Custo_Venda"]. "</td>";
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