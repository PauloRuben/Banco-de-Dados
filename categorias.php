<?php
//include 'conect.php';
$host = 'localhost';
$user = 'root';
$senha = '';
$nome = 'banco';
$porta = '3381';

$conexao = new mysqli($host, $user, $senha, $nome, $porta);

$sql = "SELECT * FROM categorias";
$resultado = $conexao->query($sql);
if ($resultado ->num_rows > 0) {
    echo "<h1>Categorias<h1>";
    echo "<button><a href='index.html'>Voltar</a></button>";
    echo "<button><a href='novo_categoria.html'>Novo</a></button>
    <br></br>";   
    echo "<table border='1'>
    <tr>
        <th>Id</th>
        <th>Categorias</th>
    </tr>";
    while($row = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>". $row["ID_Categoria"]. "</td>";
        echo "<td>". $row["Categoria"]. "</td>";
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