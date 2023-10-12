async function createBook(dados)
{
    await fetch('api/create.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(dados)
    })
    .then(response =>{
        if (response.status === 201) {
            document.getElementById("formulario").reset()
        } 

        return response.json()
    })
    .then(response => {
        window.alert(response.mensagem)
    })
    .catch(error => {
        console.log(error);
    })
}

document.addEventListener('DOMContentLoaded', () => {
    const formularioCriacao = document.getElementById("formulario");

    formularioCriacao.addEventListener('submit', async (event) => {
        event.preventDefault();

        let nome = document.getElementById("nome").value;
        let autor = document.getElementById("autor").value;
        let editora = document.getElementById("editora").value;
        let paginas = document.getElementById("paginas").value;
        let ano_da_publicacao = document.getElementById("ano").value;
        let quantidade = document.getElementById("quantidade").value;

        await createBook({
            nome: nome,
            autor: autor,
            editora: editora,
            paginas: paginas,
            ano_da_publicacao: ano_da_publicacao,
            quantidade: quantidade
        });
    });
});

function lista(){
    fetch('api/read.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        data.forEach((dados) => {
            if (data[0].mensagem === "Nenhum livro encontrado") {
                alert("Nenhum livro encontrado");
            } else{
                let idX = "x" + dados.id;
                let div = document.getElementById(idX);
                
                if (!div) {
                    div = document.createElement("div");
                    let id = document.createAttribute("id");
                    id.value = idX;
                    div.setAttributeNode(id);
                    document.getElementById('read').appendChild(div);
                }
                
                div.innerHTML = `<p>Nome: <input type='text' value='${dados.nome}' class='${dados.id}'>` + `<p>Autor: <input type='text' value='${dados.autor}' class='${dados.id}'>` + `<p>Editora: <input type='text' value='${dados.editora}' class='${dados.id}'>` + `<p>Número de páginas: <input type='text' value='${dados.paginas}' class='${dados.id}'>` + `<p>Ano da publicação: <input type='text' value='${dados.ano_da_publicacao}' class='${dados.id}'>` + `<p>Quantidade: <input type='text' value='${dados.quantidade}' class='${dados.id}'>` + `<div><input type='submit' value='Atualizar' onclick='atualizar(${dados.id})'> <input type='submit' value='Apagar' onclick='apagar(${dados.id})'></div>`;
            }
        })
    })
}

function atualizar(valorId){
    let classValor = document.getElementsByClassName(valorId);
    let id = valorId;
    let nome = classValor[0].value;
    let autor = classValor[1].value;
    let editora = classValor[2].value;
    let paginas = classValor[3].value;
    let ano = classValor[4].value;
    let quantidade = classValor[5].value;
    
    fetch('api/update.php', {
        method: 'Post',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            id: id,
            nome: nome,
            autor: autor,
            editora: editora,
            paginas: paginas,
            ano_da_publicacao: ano,
            quantidade: quantidade
        })
    })
    .then(response => response.json())
    .then(data => {
        alert(data.mensagem);
    });
}

function apagar(valorId){
    let id = valorId;
    fetch('api/delete.php', {
        method: 'Post',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            id: id
        })
    })
    .then(response => response.json())
    .then(data => {
        alert(data.mensagem);
        location.reload();
    });
}