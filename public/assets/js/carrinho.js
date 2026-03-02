document.addEventListener('DOMContentLoaded', function () {
    carrinhoHeader();
    atualizarHeaderCarrinho();
});

function carrinhoHeader() {
    document.addEventListener('click', function (event) {

        if (event.target.classList.contains('btn-add-carrinho')) {
            event.preventDefault();

            const produtoId = event.target.getAttribute('data-id');

            fetch('/dev/loja-virtual/public/api/carrinho', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    id: produtoId
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        atualizarCarrinho(data.qtd);
                    }
                })
                .catch(error => {
                    console.log('Erro:', error);
                })
        }
    })
}

function atualizarCarrinho(data) {
    document.querySelector('.badge-carrinho').innerText = data;
}

function buscarCarrinho() {
    return fetch('/dev/loja-virtual/public/api/carrinho')
        .then(response => response.json())
        .catch(error => {
            console.log('Erro:', error);
            return [];
        });
}

function atualizarHeaderCarrinho() {
    buscarCarrinho().then(data => {
        atualizarCarrinho(data.total.qtdTotal);
    });
}