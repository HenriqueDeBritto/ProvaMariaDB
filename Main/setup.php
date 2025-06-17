<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

echo "<h1>Iniciando Configuração do Banco de Dados</h1>";

require_once 'config.php';

try {
    $dsn = 'mysql:host=' . DB_HOST . ';charset=utf8';
    $pdo = new PDO($dsn, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<p> Conexão com o servidor MySQL estabelecida com sucesso.</p>";

    echo "<p>Lendo o arquivo <code>database/schema.sql</code>...</p>";
    $sql_schema = file_get_contents('database/schema.sql');
    if ($sql_schema === false) {
        throw new Exception("Não foi possível ler o arquivo schema.sql");
    }
    $pdo->exec($sql_schema);
    echo "<p> Banco de dados e tabelas criados com sucesso (ou já existentes).</p>";

    echo "<p>Lendo o arquivo <code>database/trigger.sql</code>...</p>";
    $pdo->exec("USE " . DB_NAME);
    $pdo->exec("DROP TRIGGER IF EXISTS `trg_produto_update`");
    $sql_trigger = file_get_contents('database/trigger.sql');
    if ($sql_trigger === false) {
        throw new Exception("Não foi possível ler o arquivo trigger.sql");
    }
    $pdo->exec($sql_trigger);
    echo "<p> Trigger <code>trg_produto_update</code> criada com sucesso.</p>";

    echo "<h2> Configuração concluída com sucesso!</h2>";
    echo "<p style='color:red; font-weight:bold;'>IMPORTANTE: Delete este arquivo (<code>setup.php</code>) do servidor agora por motivos de segurança.</p>";

} catch (PDOException $e) {
    die("<h2> ERRO DE PDO:</h2> <p>" . $e->getMessage() . "</p>");
} catch (Exception $e) {
    die("<h2> ERRO GERAL:</h2> <p>" . $e->getMessage() . "</p>");
}
?>