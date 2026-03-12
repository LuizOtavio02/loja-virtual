document.addEventListener('DOMContentLoaded', function () {
    headerLogin();
    headerCategoria();
});


function headerLogin() {
    fetch('/dev/loja-virtual/public/api/logado', {
        method: 'GET'
    })
        .then(response => response.json())
        .then(data => {
            let html = '';
            if (data.success) {
                html += `<div class="dropdown">
            <button class="btn text-dark p-0 border-0" data-bs-toggle="dropdown"> <i class="bi bi-person-circle"
                style="font-size:1.8rem;"></i> 
              </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li class="dropdown-item-text"> Olá, <strong>${data.sessao.nome}</strong> </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li> 
                    <a class="dropdown-item" href="/dev/loja-virtual/public/perfil"> <i class="bi bi-person"></i> Meu
                        perfil </a> 
                </li>
                <li> 
                    <a class="dropdown-item" href="/dev/loja-virtual/public/pedidos"> <i class="bi bi-bag"></i> Minhas
                      compras </a> </li>
                <li>
                    <button class="logout dropdown-item text-danger btn btn-outline-secondary">
                        <i class="bi bi-box-arrow-right"></i> Sair
                    </button>
                </li>
            </ul>
          </div>`;

            } else {
                html += `<div class="d-flex gap-3"> <a href="/dev/loja-virtual/public/login" class="text-decoration-none"> Entrar </a>
            <a href="/dev/loja-virtual/public/cadastrar" class="text-decoration-none"> Cadastrar </a>
          </div>`;

            }

            document.getElementById('login').innerHTML = html;
        })
        .catch(error => {
            console.log('Erro:', error);
        })

}

function headerCategoria() {
    document.addEventListener('click', function (event) {
        if (event.target.classList.contains('btn-categoria')) {
            event.preventDefault();

            fetch('/dev/loja-virtual/public/api/categoria', {
                method: 'GET'
            })
                .then(response => response.json())
                .then(data => {
                    let html = '';
                    if (data.success) {

                        data.categorias.forEach(categoria => {
                            html += `
                            <li>
                                <a class="dropdown-item" data-id="${categoria.id}" href="/dev/loja-virtual/public/categoria/${categoria.nome}">
                                 ${categoria.nome}
                                </a>
                            </li>`;
                        });

                    }

                    html += `
                    <hr>
                    <li><a class="dropdown-item" href="/dev/loja-virtual/public/contato">Contato</a></li>
                    `;
                    document.getElementById('categoria').innerHTML = html;
                })
                .catch(error => {
                    console.log('Erro:', error);
                })
        }

    })
}

document.addEventListener('click', function (event) {
    if (event.target.classList.contains('logout')) {
        event.preventDefault();

        fetch('/dev/loja-virtual/public/api/logout', {
            method: 'DELETE'
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = "/dev/loja-virtual/public/";
                }
            })
            .catch(error => {
                console.log('Erro:', error);
            })
    }
})