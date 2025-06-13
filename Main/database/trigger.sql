CREATE TRIGGER `trg_produto_update`
AFTER UPDATE ON `produtos`
FOR EACH ROW
BEGIN
IF OLD.nome <> NEW.nome THEN
        INSERT INTO historico_alteracoes (id_produto, data_alteracao, campo_alterado, valor_antigo, valor_novo)
        VALUES (OLD.id, NOW(), 'nome', OLD.nome, NEW.nome);
    END IF;
    IF OLD.descricao <> NEW.descricao THEN
        INSERT INTO historico_alteracoes (id_produto, data_alteracao, campo_alterado, valor_antigo, valor_novo)
        VALUES (OLD.id, NOW(), 'descricao', OLD.descricao, NEW.descricao);
    END IF;
     IF OLD.preco <> NEW.preco THEN
        INSERT INTO historico_alteracoes (id_produto, data_alteracao, campo_alterado, valor_antigo, valor_novo)
        VALUES (OLD.id, NOW(), 'preco', OLD.preco, NEW.preco);
    END IF;
    IF OLD.quantidade <> NEW.quantidade THEN
        INSERT INTO historico_alteracoes (id_produto, data_alteracao, campo_alterado, valor_antigo, valor_novo)
        VALUES (OLD.id, NOW(), 'quantidade', OLD.quantidade, NEW.quantidade);
    END IF;
END