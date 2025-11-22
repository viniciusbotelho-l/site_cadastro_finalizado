<?php

include("conexao.php");
include("valida.php");

$filme = $_POST['filme'];

$sql = "delete from filmes where filme = ?";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("i", $filme);
    if($stmt->execute()){
        header("Location: cadastroFilmes.php");
    }else{
        echo 'erro ao apagar filme';
    }
}
?>