document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.remover-familiar').forEach(a => {
        a.addEventListener('click', () => {
            let id = a.dataset.id;
            if (confirm('Tem certeza que deseja excluir esse arquivo?')) {
                // Envie a solicitação para excluir um arquivo
                let xhr = new XMLHttpRequest();
                let url = '/pessoa/atendidos/painel/removerFamiliar/' + id;

                // Use o método POST com _method=DELETE para lidar com solicitações DELETE
                xhr.open('DELETE', url, true);
                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

                // Defina o campo _method no corpo da solicitação
                let formData = new FormData();
                formData.append('_method', 'DELETE');

                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            // Remova a linha da tabela correspondente ao arquivo excluído
                            a.closest('tr').remove();
                        } else {
                            alert('Erro ao excluir o familiar');
                        }
                    }
                };

                xhr.send(formData);
            }
        });
    });
});
