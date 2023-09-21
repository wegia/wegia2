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
                window.location.reload();
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
                window.location.reload();
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
    xhr.open('GET', '/pessoa/atendidos/listarStatus', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Atualize o conteúdo da lista com a resposta do servidor
            listaStatusElement.innerHTML = xhr.responseText;
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
    xhr.open('GET', '/pessoa/atendidos/listarTipo', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Atualize o conteúdo da lista com a resposta do servidor
            listaTipoElement.innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}

});

