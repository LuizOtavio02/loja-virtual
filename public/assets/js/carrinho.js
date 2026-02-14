$(document).on('click', '.btn-add-carrinho', function (event) {
    event.preventDefault();

    var badge_carrinho = $('.badge-carrinho');
    var products_cart = $('.produtos-carrinho');

    function formatarReal(valor){
    return new Intl.NumberFormat('pt-BR', {
        style: 'currency',
        currency: 'BRL'
    }).format(valor);
}

function totalProdutosCarrinho() {
    return $.ajax({
        url: '/dev/loja-virtual/public/carrinho/get',
        type: 'post',
        dataType: 'json',
        success: function (retorno) {

            badge_carrinho.html(retorno.numeroProdutosCarrinho);

            products_cart.html(formatarReal(retorno.valorProdutosCarrinho));
        }
    });
}

    var produtoId = $(this).attr('data-id');
    $.ajax({
        url: '/dev/loja-virtual/public/carrinho/add/' + produtoId,
        type: 'post',
        success: function () {
            totalProdutosCarrinho();
        }
    })
});
