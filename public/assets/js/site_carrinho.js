document.addEventListener('DOMContentLoaded', function () {
    carregarCarrinho();
    atualizarHeaderCarrinho();
});

document.addEventListener('click', function (event) {

    if (event.target.classList.contains('btn-qtd')) {
        event.preventDefault();

        const produtoId = event.target.getAttribute('data-id');
        const value = event.target.getAttribute('value');

        fetch('/dev/loja-virtual/public/api/carrinho/'+produtoId,{
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                qtd: value
            })
        })
            .then(response => response.json())
            .then(data => {
                if(data){
                    carregarCarrinho();
                }
            })
            .catch(error => {
                console.log('Erro:', error);
            })
    }
})

function carregarCarrinho() {
    fetch('/dev/loja-virtual/public/api/carrinho', {
        method: 'GET'
    })
    .then(response => response.json())
    .then(data => {
        let html = '';

        data.produtos.forEach(produto => {
            html += `<tr>
                <th>${produto.produtos.id}</th>
                <td>${produto.produtos.nome}</td>
                <td>R$ ${produto.produtos.preco}</td>
                <td>
                    <strong class="qtd">${produto.quantidade}</strong>
                    <button type="button" class="btn-qtd btn btn-outline-primary btn-sm ms-3" data-id="${produto.produtos.id}" value="1">+</button>
                    <button type="button" class="btn-qtd btn btn-outline-primary btn-sm " data-id="${produto.produtos.id}" value="-1">-</button>
                </td>
                <td>R$ ${produto.valorTotal}</td>
                <td>
                    <button type="button" class="btn btn-outline-danger btn-sm ms-4" data-id="${produto.produtos.id}">Remover</button>
                </td>
            </tr>`
        });

        document.getElementById('tbody').innerHTML = html;
        atualizarCarrinho(data.total.qtdTotal);
    }).catch(error => {
        console.log('Erro:', error);
    })
}