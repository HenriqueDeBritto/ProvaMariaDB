<?php

require_once 'init.php';

function get_all_products(){
    $pdo = db_connect();
    $sql = "SELECT id, nome, descricao, preco, quantidade FROM produtos ORDER BY nome ASC";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function get_product_by_id($id){
    $pdo = db_connect();
    $sql = "SELECT id, nome, descricao, preco, quantidade FROM produtos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->blindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function get_product_history($id_produto){
    $pdo = db_connect();
    $sql = "SELECT data_alteracao, campo_alterado, valor_antigo, valor_novo
            FROM historico_alteracoes
            WHERE id_produto = :id_produto
            ORDER BY data_alteracao DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->blindParam(':id_produto', $id_produto, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}