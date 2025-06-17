<?php
require 'functions.php';

$id_produto = isset($_GET['id']) ? (int)$_GET['id'] : null;
if (!$id_produto) {
    die("ID de produto inválido.");
}

$produto = get_product_by_id($id_produto);
if (!$produto) {
    die("Produto não encontrado.");
}

$historico = get_product_history($id_produto);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Histórico de Alterações</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px;}
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Histórico de Alterações - <?php echo htmlspecialchars($produto['nome']); ?></h1>
    <p><a href="index.php">Voltar para a lista</a></p>

    <table>
        <thead>
            <tr>
                <th>Data da Alteração</th>
                <th>Campo Alterado</th>
                <th>Valor Antigo</th>
                <th>Valor Novo</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($historico) > 0): ?>
                <?php foreach ($historico as $registro): ?>
                    <tr>
                        <td><?php echo date('d/m/Y H:i:s', strtotime($registro['data_alteracao'])); ?></td>
                        <td><?php echo htmlspecialchars($registro['campo_alterado']); ?></td>
                        <td><?php echo htmlspecialchars($registro['valor_antigo']); ?></td>
                        <td><?php echo htmlspecialchars($registro['valor_novo']); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">Nenhuma alteração registrada para este produto.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>