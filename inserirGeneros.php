<?php

include("conexao.php");
include("valida.php");

$genero = $_POST['genero'];
$descricao = $_POST['descricao'];

$sql = "insert into generos (genero, descricao) values(?,?)";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("ss", $genero, $descricao);
    if($stmt->execute()){
        header("Location: cadastroGeneros.php");
    }else{
        echo 'erro ao inserir genero';
    }
}
?>