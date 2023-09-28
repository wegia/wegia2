// pessoa/atendido.js
/*
const addStatus = async (data, token )=> {
    const url = "/pessoa/atendidos/status";
    const header = {
        method: "POST", // *GET, POST, PUT, DELETE, etc.
        mode: "cors", // no-cors, *cors, same-origin
        cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
        credentials: "same-origin", // include, *same-origin, omit
        headers: {
          "Content-Type": "aph is 22 commits ahead of main. plication/json",
          'X-CSRF-TOKEN': token
          // 'Content-Type': 'application/x-www-form-urlencoded',
        },
        redirect: "follow", // manual, *follow, error
        referrerPolicy: "no-referrer", // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
        body: JSON.stringify(data), // body data type must match "Content-Type" header
      }
    const resp = await fetch(url,header)
    
    $('#novoStatusModal').modal('hide');
    atualizarListaStatus();
    
}
*/
document.addEventListener('DOMContentLoaded', function () {
    // Função genérica para fazer o fetch
    const fazFetch = async (url, method, data = undefined, token, atualizar) => {
        const header = {
            method: method, // método HTTP
            headers: {
                "Content-Type": "application/json",
                'X-CSRF-TOKEN': token // token para o Laravel
            },
        }
        data ? header.body = data : "" // verifica se tem dados para enviar (se é um post ou put)
        await fetch(url, header)
            .then(response => response.status === 200 || response.status === 201 && response.ok === true ? response.json() : console.log(response.status))
            .then(response => atualizar(response))
    }

    // Status
    // Evento de clique para o botão "Cadastrar Status"
    document.querySelector('#addStatus').addEventListener('click', function () {
        const url = "/pessoa/atendidos/status";
        let data = JSON.stringify({status: document.querySelector('#iptNovoStatus').value})
        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        fazFetch(url, 'POST', data, token, atualizarListaStatus)
    });

    //Tipo
    // Evento de clique para o botão "Cadastrar Tipo"
    document.querySelector('#addTipo').addEventListener('click', function () {
        const url = "/pessoa/atendidos/tipo";
        let data = JSON.stringify({tipo: document.querySelector('#iptNovoTipo').value})
        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        fazFetch(url, 'POST', data, token, atualizarListaTipo)
    });

//cpf

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
/**
 * Tratamento de CPF
 *
 */

const removeCaracteresCPF = cpf => {
    const tamanho = cpf.length
    if ('1234567890'.indexOf(cpf[tamanho-1]) == -1) {
        return cpf.substr(0, tamanho-1)
    }
    return cpf
}

const acrescentaFormato = cpf => {
    //000.000.000-00
    if(cpf.length == 3 || cpf.length == 7)
        return cpf += "."
    if(cpf.length == 11)
        return cpf += "-"
    return cpf
}

const trataCPF = cpfInput => {
    let cpfDigitado = cpfInput.value
    let cpfTratado = removeCaracteresCPF(cpfDigitado)
    cpfTratado = acrescentaFormato(cpfTratado)
    cpfInput.value = cpfTratado
}

const inputCheckCPF = document.getElementById('inputCheckCPF')

// se o input estiver carregado na tela,
// associar o evento keyup
if (inputCheckCPF) {
    inputCheckCPF.addEventListener('keyup', (e)=> {
        //Se tecla for backspace ou delete
        if(e.key.toString() == "Backspace" || e.key == "Delete") {
            //remover o ponto
            if (inputCheckCPF.value.length == 3) //primeiro ponto
                inputCheckCPF.value = inputCheckCPF.value.substring(0, 2);
            if (inputCheckCPF.value.length == 7) //segundo ponto
                inputCheckCPF.value = inputCheckCPF.value.substring(0, 6);
            if (inputCheckCPF.value.length == 11) // traço
                inputCheckCPF.value = inputCheckCPF.value.substring(0, 10);
        }

        trataCPF(inputCheckCPF);
    })
}
});