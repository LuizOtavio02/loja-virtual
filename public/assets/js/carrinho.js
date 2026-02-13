$(document).on('click', '.btn-add-carrinho', function (event) {
    event.preventDefault();

    function totalProdutosCarrinho() {
        return $.ajax({
            url: '/dev/loja-virtual/public/carrinho/get',
            type:'post',
            dataType: 'json',
            success: function (retorno) {
                console.log(retorno);
            }
        })
    }

    var produtoId = $(this).attr('data-id');
    $.ajax({
        url: '/dev/loja-virtual/public/carrinho/add/'+produtoId,
        type: 'post',
        success: function () {
            totalProdutosCarrinho();
        }
    })
});
