<?php
require 'init.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : null;

if (empty($id)) {
    die('ID de produto inválido.');
}

$pdo = db_connect();
$sql = "DELETE FROM produtos WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

if ($stmt->execute()) {
    header('Location: index.php');
} else {
    echo "Erro ao excluir o produto.";
    print_r($stmt->errorInfo());
}
?>