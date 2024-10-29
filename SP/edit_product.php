<?php

$mysqli = new mysqli("localhost", "root", "", "produtos");

if ($mysqli->connect_error){
    die("Falha na conexao: " . $mysqli->connect_error);
}

$id = $_GET['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];

$stmt = $mysqli->prepare("UPDATE produtos SET name = ?, price = ?, description = ? WHERE id = ?");
$stmt->bind_param("sdii", $name, $price, $description, $id);

if ($stmt->execute()){
    echo "Produto atualizado com sucesso!";
} else {
    echo "Erro: " . $stmt->error;
}

header("Location: index.html");

?>