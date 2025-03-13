<?php
//include 'conect.php';
$host = 'localhost';
$user = 'root';
$senha = '';
$nome = 'banco';
$porta = '3381';

$conexao = new mysqli($host, $user, $senha, $nome, $porta);

$sql = "SELECT * FROM clientes ";
$resultado = $conexao->query($sql);
if ($resultado ->num_rows > 0) {
    echo "<h1>Clientes</h1>";
    echo "<button><a href='index.html'>Voltar</a></button>
    <br>";
    echo "<button><a href='novo_Cliente.html'>novo</a></button>
    <br>";
    echo "<button><a href='filtrar.html'>Filtrar</a></button>
    <br>";
    echo "<button><a href='Editar.html'>Editar</a></button>
    <br>";      
    echo "<table border='1'>
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Sobrenome</th>
        <th>DN</th>
        <th>EC</th>
        <th>Sexo</th>
        <th>E-mail</th>
        <th>Tel</th>
        <th>RA</th>
        <th>Qtd F</th>
        <th>Esco</th>
    </tr>";
    while($row = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>". $row["ID_Cliente"]. "</td>";
        echo "<td>". $row["Nome"]. "</td>";
        echo "<td>". $row["Sobrenome"]. "</td>";
        echo "<td>". $row["Data_Nascimento"]. "</td>";
        echo "<td>". $row["Estado_Civil"]. "</td>";
        echo "<td>". $row["Sexo"]. "</td>";
        echo "<td>". $row["Email"]. "</td>";
        echo "<td>". $row["Telefone"]. "</td>";
        echo "<td>". $row["Renda_Anual"]. "</td>";
        echo "<td>". $row["Qtd_Filhos"]. "</td>";
        echo "<td>". $row["Escolaridade"]. "</td>";
        echo "</tr>";
    }
 echo "</table>";
} else{
    echo "0 resultados";
}
$conexao->close();
?>