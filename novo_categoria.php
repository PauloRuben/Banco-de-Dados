<?php
$host = 'localhost';
$user = 'root';
$senha = '';
$nome = 'banco';
$porta = '3381';

$conexao = new mysqli($host, $user, $senha, $nome, $porta);

$ID_Categoria = $_POST['ID_Categoria'];
$Categoria = $_POST['Categoria'];

$sql = "INSERT INTO categorias (ID_Categoria, Categoria) VALUES ('$ID_Categoria', '$Categoria')";

if ($conexao -> query($sql) === true){
    echo "Nova categoria feita com sucesso";
    echo "<button><a href='categorias.php'>Voltar</a></button>
    <br></br>";   
}
else {
    echo "Error: ". $sql. "<br>". $conexao->error;
    echo "<br><button><a href='index.html'>Voltar</a></button>";   
}
$conexao -> close();
?>
