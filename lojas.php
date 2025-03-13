<?php
//include 'conect.php';
$host = 'localhost';
$user = 'root';
$senha = '';
$nome = 'banco';
$porta = '3381';

$conexao = new mysqli($host, $user, $senha, $nome, $porta);

$sql = "SELECT * FROM lojas";
$resultado = $conexao->query($sql);
if ($resultado ->num_rows > 0) {
    echo "<h1>Lojas</h1>";
    echo "<button><a href='index.html'>Voltar</a></button>
    <br></br>";   
    echo "<table border='1'>
    <tr>
        <th>Id</th>
        <th>Loja</th>
        <th>Gerente</th>
        <th>Endereco</th>
        <th>Num de fun</th>
        <th>Telefone</th>
    </tr>";
    while($row = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>". $row["ID_Loja"]. "</td>";
        echo "<td>". $row["Loja"]. "</td>";
        echo "<td>". $row["Gerente"]. "</td>";
        echo "<td>". $row["Endereco"]. "</td>";
        echo "<td>". $row["Num_Funcionarios"]. "</td>";
        echo "<td>". $row["Telefone"]. "</td>";
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