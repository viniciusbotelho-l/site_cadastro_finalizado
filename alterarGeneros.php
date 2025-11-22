<?php

include("conexao.php");
include("valida.php");

$genero = $_POST['genero'];
$descricao = $_POST['descricao'];
$generoAnterior = $_POST['generoAnterior'];

$sql = "update generos set genero = ?,
                            descricao = ?
                    where genero = ?";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("sss", $genero, $descricao, $generoAnterior);
    if($stmt->execute()){
        header("Location: cadastroGeneros.php");
    }else{
        echo 'erro ao alterar genero';
    }
}
?>