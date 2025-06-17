<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Produto</title>
</head>
<body>
    <h1>Adicionar Novo Produto</h1>
    <form action="add.php" method="post">
        <p>
            <label for="nome">Nome:</label><br>
            <input type="text" name="nome" id="nome" required>
        </p>
        <p>
            <label for="descricao">Descrição:</label><br>
            <textarea name="descricao" id="descricao" rows="4" cols="50"></textarea>
        </p>
        <p>
            <label for="preco">Preço:</label><br>
            <input type="number" name="preco" id="preco" step="0.01" required>
        </p>
        <p>
            <label for="quantidade">Quantidade:</label><br>
            <input type="number" name="quantidade" id="quantidade" required>
        </p>
        <p>
            <button type="submit">Cadastrar</button>
        </p>
    </form>
</body>
</html>