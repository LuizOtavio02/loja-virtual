$(document).on('click', '.btn-add-carrinho', function (event) {
    event.preventDefault();

    var produtoId = $(this).attr(('data-id'))
    console.log(produtoId);
});
