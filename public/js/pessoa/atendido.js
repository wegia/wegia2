// pessoa/atendido.js

document.addEventListener('DOMContentLoaded', function () {
    //Status 
    // Evento de clique para o botão "Cadastrar Status"
    document.getElementById('addStatus').addEventListener('click', function () {
        // Obtenha o valor do novo status do input
        var novoStatus = document.getElementById('iptNovoStatus').value;

        // Faça uma solicitação AJAX para salvar o novo status no banco de dados
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/pessoa/atendidos/status', true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // O status foi salvo com sucesso
                // Você pode atualizar a lista de status na tela, se necessário
                // Feche o modal
                
                $('#novoStatusModal').modal('hide');
                atualizarListaStatus();
            }
        };
        
        // Envie os dados do novo status como JSON
        xhr.send(JSON.stringify({ status: novoStatus }));
    });

    //Tipo
    document.getElementById('addTipo').addEventListener('click', function () {
        // Obtenha o valor do novo status do input
        var novoTipo = document.getElementById('iptNovoTipo').value;

        // Faça uma solicitação AJAX para salvar o novo status no banco de dados
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/pessoa/atendidos/tipo', true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // O status foi salvo com sucesso
                // Você pode atualizar a lista de status na tela, se necessário
                // Feche o modal
                
                $('#novoTipoModal').modal('hide');
                atualizarListaTipo();
            }
        };
        
        // Envie os dados do novo status como JSON
        xhr.send(JSON.stringify({ tipo: novoTipo }));
    });


/** 
 * Função para atualizar a lista de status
 */
function atualizarListaStatus() {
    var listaStatusElement = document.getElementById('status');

    // Faça uma solicitação AJAX para obter a lista atualizada de status
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/pessoa/atendidos/status', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) { 
            // Analise a resposta JSON do servidor
            var response = JSON.parse(xhr.responseText);

            // Limpe as opções existentes
            listaStatusElement.innerHTML = '';

            // Adicione cada status como uma nova opção
            response.forEach(function (status) {
                var option = document.createElement('option');
                option.value = status.id; // Defina o valor da opção (se necessário)
                option.textContent = status.status; // Texto visível da opção
                listaStatusElement.appendChild(option);
            });
        }
    };
    xhr.send();
}

/** 
 * Função para atualizar a lista de tipos
 */
function atualizarListaTipo() {
    var listaTipoElement = document.getElementById('tipo');

    // Faça uma solicitação AJAX para obter a lista atualizada de status
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/pessoa/atendidos/tipo', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Analise a resposta JSON do servidor
            var response = JSON.parse(xhr.responseText);
            
            // Limpe as opções existentes
            listaTipoElement.innerHTML = '';

            // Adicione cada status como uma nova opção
            response.forEach(function (tipo) {
                var option = document.createElement('option');
                option.value = tipo.id; // Defina o valor da opção (se necessário)
                option.textContent = tipo.descricao; // Texto visível da opção
                listaTipoElement.appendChild(option);
            });
        }
    };
    xhr.send();
}

});

