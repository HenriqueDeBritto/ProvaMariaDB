<?php
require 'functions.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : null;
if (!$id) {
    die("ID de produto inválido.");
}

$produto = get_product_by_id($id);
if (!$produto) {
    die("Produto não encontrado.");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
</head>
<body>
    <h1>Editar Produto: <?php echo htmlspecialchars($produto['nome']); ?></h1>
    <form action="edit.php" method="post">
        <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">
        <p>
            <label for="nome">Nome:</label><br>
            <input type="text" name="nome" id="nome" value="<?php echo htmlspecialchars($produto['nome']); ?>" required>
        </p>
        <p>
            <label for="descricao">Descrição:</label><br>
            <textarea name="descricao" id="descricao" rows="4" cols="50"><?php echo htmlspecialchars($produto['descricao']); ?></textarea>
        </p>
        <p>
            <label for="preco">Preço:</label><br>
            <input type="number" name="preco" id="preco" step="0.01" value="<?php echo $produto['preco']; ?>" required>
        </p>
        <p>
            <label for="quantidade">Quantidade:</label><br>
            <input type="number" name="quantidade" id="quantidade" value="<?php echo $produto['quantidade']; ?>" required>
        </p>
        <p>
            <button type="submit">Salvar Alterações</button>
        </p>
    </form>
</body>
</html>