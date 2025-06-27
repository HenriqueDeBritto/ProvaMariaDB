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



## 🛠️ Instalação e Uso com XAMPP

Siga os passos abaixo para executar o projeto localmente usando o XAMPP:

### 1. Pré-requisitos

- [XAMPP](https://www.apachefriends.org/index.html) instalado no seu computador
- Navegador de internet
- Editor de texto/código (opcional, ex: VSCode)

### 2. Instalação

1. **Clone ou baixe este repositório**
   - Coloque a pasta `ProvaMariaDB-main` dentro do diretório `htdocs` do XAMPP (ex: `C:\xampp\htdocs\ProvaMariaDB-main`).

2. **Inicie os serviços do XAMPP**
   - Inicie o **Apache** e o **MySQL** através do painel de controle do XAMPP.

3. **Execute o setup do banco de dados**
   - Acesse no navegador:  
     ```
     http://localhost/ProvaMariaDB-main/Main/setup.php
     ```
   - Esse arquivo criará automaticamente o banco de dados `prova_mariadb`, as tabelas e os gatilhos necessários para o funcionamento da aplicação.

4. **Acesse a aplicação**
   - Após o setup, acesse:  
     ```
     http://localhost/ProvaMariaDB-main/Main/index.php
     ```

## 🧪 Testes

- Cadastre um novo produto usando o formulário.
- Edite ou exclua um item para ver os dados atualizarem e o histórico sendo registrado.

## 🗃️ Estrutura de Diretórios Importantes

```
Main/
├── index.php             # Listagem dos produtos
├── formAdd.php           # Formulário para adicionar
├── formEdit.php          # Formulário para editar
├── add.php               # Lógica de inserção
├── edit.php              # Lógica de edição
├── delete.php            # Lógica de exclusão
├── setup.php             # Criação automática do banco
├── database/
│   ├── schema.sql        # Estrutura do banco (referência)
│   └── trigger.sql       # Gatilho para histórico (referência)
```
