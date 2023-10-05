# API-PHP

API feita em PHP (sem usar framework) que realiza cadastro, lista, atualiza e apaga dados de livros. A implementação da API é feita usando o JavaScript.

# Requisitos
Ter o XAMPP e o Insomnia instalados.

# Instalação
Para instalar esse projeto você pode clonar o repositório:

```
git clone https://github.com/JosianeBarros/api-php.git
```

É necessário ter um banco de dados com o nome `cadastro`, e dentro dele deve ter a tabela `livros`, para cria-lá use:

```
CREATE TABLE livros (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255),
    autor VARCHAR(255),
    editora VARCHAR(255),
    paginas INT,
    ano_da_publicacao INT,
    quantidade INT
);
```

# Imagens

Cadastrando um livro

![image](https://github.com/JosianeBarros/api-php/assets/108816336/f7298739-25ee-4fe9-b3f3-073677768d95)

![image](https://github.com/JosianeBarros/api-php/assets/108816336/a980807f-2d74-4f12-98ed-a403fa50a939)

Listando os livros cadastrados

![image](https://github.com/JosianeBarros/api-php/assets/108816336/5f40a138-01ae-47a4-8e25-64f6fdebf0ca)

![image](https://github.com/JosianeBarros/api-php/assets/108816336/4d798d36-9ae6-4feb-8fd4-c1cf1b6869c0)

Atualizando os dados do livro

![image](https://github.com/JosianeBarros/api-php/assets/108816336/dbc6dfea-4403-4f9d-be6d-60cef8b20a23)

Apagando livro cadastrado

![image](https://github.com/JosianeBarros/api-php/assets/108816336/f1d7a073-f3a8-4926-9533-47c0f9c1c613)
