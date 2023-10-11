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

![image](https://github.com/JosianeBarros/api-php/assets/108816336/c99087c0-3c9e-4756-a44a-50c168d5f71d)

![image](https://github.com/JosianeBarros/api-php/assets/108816336/c55a3a03-ac51-47d0-bb40-9af2d025cedc)

Listando os livros cadastrados

![image](https://github.com/JosianeBarros/api-php/assets/108816336/6427a239-6965-4c36-bb99-3461c0d09d29)


Atualizando os dados do livro


Apagando livro cadastrado


# Implementação da API.

Os arquivos index.html e script.js fazem a implementação da API.

![image](https://github.com/JosianeBarros/api-php/assets/108816336/56e79c19-242c-419c-80e5-934dc226dfb9)

![image](https://github.com/JosianeBarros/api-php/assets/108816336/9c0c4c1d-07af-4c4a-831c-693a19d8f5f4)

