<?php
$host = 'localhost';
$user = 'root';
$senha = '';
$nome = 'banco';
$porta = '3381';

$conexao = new mysqli($host, $user, $senha, $nome, $porta);

$ID_Produto =$_POST['ID_Produto'];
$Nome_Produto = $_POST['Nome_Produto'];
$ID_Categoria = $_POST['ID_Categoria'];
$Marca_Produto= $_POST['Marca_Produto'];
$Num_Serie= $_POST['Num_Serie'];
$Preco_Unit= $_POST['Preco_Unit'];
$Custo_Unit= $_POST['Custo_Unit'];


$sql = "INSERT INTO produtos (ID_Produto,Nome_Produto, ID_Categoria, Marca_Produto, Num_Serie, Preco_Unit, Custo_Unit) VALUES ('$ID_Produto','$Nome_Produto', '$ID_Categoria', '$Marca_Produto', '$Num_Serie', '$Preco_Unit','$Custo_Unit')";

if ($conexao -> query($sql) === true){
    echo "Nova categoria feita com sucesso <br>";
    echo "<button><a href='produtos.php'>Voltar</a></button>
    <br></br>";   
}
else {
    echo "Error: ". $sql. "<br>". $conexao->error;
}
$conexao -> close();
?>