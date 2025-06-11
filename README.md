# ProvaMariaDB
Um projeto em php simples utilizando o banco de dados MariaDB, o projeto será utilizado como método de avaliação na faculdade a qual estudo.

Descrição da tarefa

Frontend (HTML + PHP):
->Formulário para cadastro de produtos:

-->Nome do produto  
-->Descrição  
-->Preço  
-->Quantidade em estoque  

Página de listagem de produtos com opções de:

-->Editar produto  
-->Excluir produto  
-->Página para editar dados de um produto.  

Backend (PHP + PDO):  
-->Conexão ao banco utilizando PDO  

Arquitetura separada em arquivos como:  
-->init.php (conexão)  
-->functions.php (funções auxiliares)  
add.php, edit.php, delete.php, index.php, formAdd.php, formEdit.php, etc.  

Banco de Dados (MySQL):  
->Tabela produtos com os campos:

-->id (INT, PK, Auto Increment)  
-->nome (VARCHAR)  
-->descricao (TEXT)  
-->preco (DECIMAL)  
-->quantidade (INT)  

Tabela historico_alteracoes:

-->id (INT, PK, Auto Increment)  
-->id_produto (INT, FK para produtos)  
-->data_alteracao (DATETIME)  
-->campo_alterado (VARCHAR)  
-->valor_antigo (TEXT)  
-->valor_novo (TEXT)  

Trigger obrigatória:

->Criar uma trigger chamada trg_produto_update que será ativada após atualização na tabela produtos, e deverá:  
-->Verificar quais campos foram alterados.  
-->Inserir um registro na tabela historico_alteracoes para cada campo modificado.
