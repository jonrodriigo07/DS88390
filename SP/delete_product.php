<?php

$mysqli = new mysqli("localhost", "root", "", "produtos");

if ($mysqli->connect_error){
    die("Falha na conexao: " . $mysqli->connect_error);
}

$id = $_GET['id'];

$stmt = $mysqli->prepare("DELETE FROM produtos WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()){
    echo "Produto excluido com sucesso!";
} else {
    echo "Erro: " . $stmt->error;
}

?>