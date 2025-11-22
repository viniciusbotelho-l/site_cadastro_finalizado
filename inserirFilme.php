<?php

include("conexao.php");
include("valida.php");

$nome = $_POST['nome'];
$ano = $_POST['ano'];
$genero = $_POST['genero'];

$sql = "insert into filmes (nome, ano, genero) values(?,?,?)";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("sii", $nome, $ano, $genero);
    if($stmt->execute()){
        header("Location: cadastroFilmes.php");
    }else{
        echo 'erro ao inserir filme';
    }
}
?>