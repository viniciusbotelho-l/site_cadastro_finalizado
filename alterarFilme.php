<?php

include("conexao.php");
include("valida.php");

$filmeId = $_POST['filmeId'];
$nome = $_POST['nome'];
$ano = $_POST['ano'];
$genero = $_POST['genero'];

$sql = "update filmes set nome = ?,
                          ano = ?,
                          genero = ?
                    where filme = ?";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("siii", $nome, $ano, $genero, $filmeId);
    if($stmt->execute()){
        header("Location: cadastroFilmes.php");
    }else{
        echo 'erro ao alterar filme';
    }
}
?>