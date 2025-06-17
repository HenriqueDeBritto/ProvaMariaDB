<?php
require 'init.php';

$id = isset($_POST['id']) ? (int)$_POST['id'] : null;
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : null;
$preco = isset($_POST['preco']) ? $_POST['preco'] : null;
$quantidade = isset($_POST['quantidade']) ? $_POST['quantidade'] : null;

if (empty($id) || empty($nome) || empty($preco) || empty($quantidade)) {
    die('Dados inválidos.');
}

$pdo = db_connect();
$sql = "UPDATE produtos SET nome = :nome, descricao = :descricao, preco = :preco, quantidade = :quantidade WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':descricao', $descricao);
$stmt->bindParam(':preco', $preco);
$stmt->bindParam(':quantidade', $quantidade, PDO::PARAM_INT);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

if ($stmt->execute()) {
    header('Location: index.php');
} else {
    echo "Erro ao atualizar o produto.";
    print_r($stmt->errorInfo());
}
?>