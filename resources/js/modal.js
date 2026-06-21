export const modal = (() => {
    let rotaExclusaoAtual = '';


    return {
        //Função chamada ao clicar no ícone de lixeira da tabela de clientes
        confirmarExclusao: function(rota, idDialog) {
            rotaExclusaoAtual = rota;

            const dialog = document.getElementById(idDialog);
            if (dialog) {
                dialog.showModal();
            }
        },

        //Função que será executada quando o usuário clicar em "Confirmar" no dialog
        executarExclusao: function() {
            if (rotaExclusaoAtual) {
                // Redireciona o usuário para a rota de exclusão do Laravel
                window.location.href = rotaExclusaoAtual;
            }
        },

        cancelarExclusao: function(idDialog) {
            const dialog = document.getElementById(idDialog);
            if (dialog) {
                dialog.close();
            }
        }
    }
})()
