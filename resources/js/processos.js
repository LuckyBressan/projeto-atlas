export const processos = (() => {
    let rotaExclusaoAtual = '';


    return {
        /**
         * Utilizado para redirecionar para a rota correta após informar o cliente que se deseja visualizar os processos
         * @param {string} rota
         */
        redireciona: function(rota) {
            const cliente = document.getElementById('cliente')
            if(rota && cliente.value) {
                // Redireciona o usuário para a rota de processos do cliente selecionado
                console.log(`${rota.slice(0, -1)}/${cliente.value}`)
                window.location.href = `${rota.slice(0, -1)}${cliente.value}`;
            }
        }
    }
})()
