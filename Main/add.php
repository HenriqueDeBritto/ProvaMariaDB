<?php
require 'init.php';

$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : null;
$preco = isset($_POST['preco']) ? $_POST['preco'] : null;
$quantidade = isset($_POST['quantidade']) ? $_POST['quantidade'] : null;

if (empty($nome) || empty($preco) || empty($quantidade)) {
    die('Por favor, preencha todos os campos obrigatórios.');
}

$pdo = db_connect();
$sql = "INSERT INTO produtos(nome, descricao, preco, quantidade) VALUES(:nome, :descricao, :preco, :quantidade)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':descricao', $descricao);
$stmt->bindParam(':preco', $preco);
$stmt->bindParam(':quantidade', $quantidade, PDO::PARAM_INT);

if ($stmt->execute()) {
    header('Location: index.php');
} else {
    echo "Erro ao cadastrar o produto.";
    print_r($stmt->errorInfo());
}
?>