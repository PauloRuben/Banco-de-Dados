<?php
//include 'conect.php';
$host = 'localhost';
$user = 'root';
$senha = '';
$nome = 'banco';
$porta = '3381';

$conexao = new mysqli($host, $user, $senha, $nome, $porta);

$sql = "SELECT * FROM locais";
$resultado = $conexao->query($sql);
if ($resultado ->num_rows > 0) {
    echo "<h1>Locais</h1>";
    echo "<button><a href='index.html'>Voltar</a></button>
    <br></br>";   
    echo "<table border='1'>
    <tr>
        <th>Cidade</th>
        <th>Estado</th>
        <th>Região</th>
    </tr>";
    while($row = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>". $row["Cidade"]. "</td>";
        echo "<td>". $row["Estado"]. "</td>";
        echo "<td>". $row["Região"]. "</td>";
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