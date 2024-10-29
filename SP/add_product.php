<?php

$mysqli = new mysqli("localhost", "root", "", "produtos");

if ($mysqli->connect_error){
    die("Falha na conexao: " . $mysqli->connect_error);
}

$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];  

$stmt = $mysqli->prepare("INSERT INTO produtos (name, price, description) VALUES (?, ?, ?)");
$stmt->bind_param("sds", $name, $price, $description);

if ($stmt->execute()){
    echo "Produto adicionado com sucesso!";
} else {
    echo "Erro: " . $stmt->error;
}

header("Location: index.html");
?>

