// pessoa/atendido.js
//Status
// Evento de clique para o botão "Cadastrar Status"
document.addEventListener('DOMContentLoaded', function () {
    // função genérica para fazer o fetch
    const fazFetch = async (url, method, data = undefined, token, atualizar) => {
        const header = {
            method: method, // *GET, POST, PUT, DELETE, etc.
            headers: {
                "Content-Type": "application/json",
                'X-CSRF-TOKEN': token
            }, // body data type must match "Content-Type" header
        }
        data ? header.body = data : "" // verifica se tem dados para enviar (se é um post ou put)
        await fetch(url, header)
            .then(response => response.status === 200 || response.status === 201 && response.ok === true ? response.json() : console.log(response.status))
            .then(response => atualizar(response))
    }

    document.querySelector('#addStatus').addEventListener('click', function () {
        const url = "/pessoa/atendidos/status";
        let data = JSON.stringify({status: document.querySelector('#iptNovoStatus').value})
        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        fazFetch(url, 'POST', data, token, atualizarListaStatus)
    });

//Tipo
    document.querySelector('#addTipo').addEventListener('click', function () {
        const url = "/pessoa/atendidos/tipo";
        let data = JSON.stringify({tipo: document.querySelector('#iptNovoTipo').value})
        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        fazFetch(url, 'POST', data, token, atualizarListaTipo)
    });


    /**
     * Função para atualizar a lista de status
     */
    function atualizarListaStatus(response) {
        const retorno = (response) => {
            let listaStatusElement = document.querySelector('#status');
            listaStatusElement.innerHTML = '';

            // Adicione cada status como uma nova opção
            response.forEach((status) => {
                let option = document.createElement('option');
                option.value = status.id; // Defina o valor da opção (se necessário)
                option.textContent = status.status; // Texto visível da opção
                listaStatusElement.appendChild(option);
            });
        }

        const url = "/pessoa/atendidos/status"
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        fazFetch(url, 'GET', '', token, retorno)

    }

    /**
     * Função para atualizar a lista de tipos
     */
    function atualizarListaTipo() {
        const retorno = (response) => {
            let listaTipoElement = document.querySelector('#tipo');
            listaTipoElement.innerHTML = '';

            // Adicione cada status como uma nova opção
            response.forEach(function (tipo) {
                let option = document.createElement('option');
                option.value = tipo.id; // Defina o valor da opção (se necessário)
                option.textContent = tipo.descricao; // Texto visível da opção
                listaTipoElement.appendChild(option);
            });
        }

        const url = "/pessoa/atendidos/tipo"
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        fazFetch(url, 'GET', '', token, retorno)
    }
});

