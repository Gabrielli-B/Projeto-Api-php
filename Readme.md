# 📚 API REST em PHP Puro — Gerenciamento de Livros

Este projeto consiste na criação de uma **API REST utilizando apenas PHP puro**, sem frameworks e sem banco de dados, com persistência de dados através de **cookies** e controle de estado via **sessões**.

O objetivo é demonstrar os fundamentos do desenvolvimento backend, incluindo:

- Criação de endpoints REST  
- Manipulação dos métodos HTTP (GET e POST)  
- Persistência de dados utilizando cookies  
- Uso de sessões em PHP  
- Validação de dados de entrada  
- Respostas sempre em JSON  
- Tratamento de erros com códigos HTTP apropriados  
- Testes utilizando Postman  

---

## 🚀 Funcionalidades

A entidade escolhida foi **Livros**, contendo os seguintes campos:

- `id` (gerado automaticamente)
- `nome`
- `autor`
- `ano`
- `genero`

A API permite:

✔ Criar livros  
✔ Listar todos os livros  
✔ Buscar livro por ID  
✔ Editar dados de um livro  
✔ Registrar quantidade de acessos  
✔ Salvar data e hora do último acesso  

Todos os dados são armazenados em **cookies**, mantendo a persistência mesmo após recarregar a página.

---

## 📁 Estrutura do Projeto

/projeto-api-php/
│
├── index.php
├── criarLivro.php
├── buscarLivro.php
├── editarLivro.php 
├── utils/
│   ├── funcoesAux.php
│   └── validacoes.php

🔌 Endpoints
📘 Criar livro

POST
/api/livros?metodo=criar

Corpo da requisição (JSON):

{
  "nome": "A Seleção",
  "autor": "Kiera Cass",
  "ano": 2012,
  "genero": "Romance"
}

✏ Editar livro

POST
/api/livros?metodo=editar

Corpo da requisição (JSON):

{
  "id": 1,
  "nome": "A Elite",
  "autor": "Kiera Cass",
  "ano": 2013,
  "genero": "Romance"
}

📄 Listar livros

GET
/api/livros?metodo=listar

Retorna todos os livros armazenados no cookie.

🧠 Dados da sessão

GET
/api/livros?metodo=sessao

Retorna as informações armazenadas na sessão.

Resposta esperada:

{
  "status": true,
  "mensagem": "Dados da sessão",
  "dados": {
    "acessos": 5,
    "ultimo_acesso": "2025-11-17 12:45:33"
  }
}


acessos → aumenta a cada requisição feita à API

ultimo_acesso → registra o horário da última chamada à API