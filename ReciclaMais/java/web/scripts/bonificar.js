const buscarCatadores = async () => {
    const res = await fetch('http://localhost:8080/JavaWeb/bonificacao');
    const data = await res.json();
    return data;
}

window.addEventListener('load', async () => {
    const catadores = await buscarCatadores();
    const tabelaCatadores = document.querySelector('.tabela-controlar');

    catadores.forEach((catador) => {
        tabelaCatadores.innerHTML += `<tr data-idcatador="${catador.id_catador}" data-nome="${catador.nome_catador}" data-valor="${catador.valor_bonificar}" data-qtdreferente="${catador.quantidade_bonificacoes}" data-idmatop="${catador.id_materiais_em_operacao_comercial}">
            <td>${catador.nome_catador}</td>
            <td>${catador.nome_material}</td>
            <td>${catador.total_vendido} kg</td>
            <td>R$${catador.valor_bonificar}</td>
            <td class='acoes'><button data-id=${catador.id_catador} class='buttons-template btn-bonificar'>Bonificar</button></td>   
            </tr>`
    });

    let bonificarFormObj = {
        nome: '',
        id_material_em_op: 0,
        quantidade_referente: 0,
        valor_recomendado: 0,
        valor: 0
    }

    let botoesBonificar = document.querySelectorAll('.btn-bonificar');
    botoesBonificar.forEach((botao) => {
        botao.addEventListener('click', () => {
            let row = botao.parentNode.parentNode;
            bonificarFormObj.id_material_em_op = row.dataset.idmatop;
            bonificarFormObj.quantidade_referente = row.dataset.qtdreferente;
            bonificarFormObj.valor_recomendado = row.dataset.valor;
            bonificarFormObj.nome = row.dataset.nome;
            montarBonificarForm();

        })
    })
    let qtdInput = document.querySelector('#qtd-input');
    let modal = document.querySelector('.modal');
    let montarBonificarForm = () => {
        console.log(document.querySelector('#catador-nome'))
        document.querySelector('#catador-nome').innerHTML = "Catador: " + bonificarFormObj.nome;
        qtdInput.placeholder = "Valor sugerido: R$" + bonificarFormObj.valor_recomendado;
        modal.style.display = 'flex';
    }
    let btnFecharModal = document.querySelector('.fechar-modal');
    btnFecharModal.addEventListener('click', () => {
        modal.style.display = 'none';
    })
    let btnConfirmar = document.querySelector('.btn-confirmar');
    btnConfirmar.addEventListener('click', () => {
        if(qtdInput.value == ''){
            window.alert('Digite um valor');
        } else {
            bonificarFormObj.valor = qtdInput.value
            fetch('http://localhost:8080/JavaWeb/bonificacao', {
                method: "POST",
                headers: {
                    "Content-type": "application/json; charset=UTF-8"
                },
                body: JSON.stringify(bonificarFormObj)
            })
                .then(res => res.json())
                .then(res => finalizarBonificacao(res))
                .catch(console.log); 
        }
    }) 
    let finalizarBonificacao = (res) =>{
        if(res.status = 1) {
            location.reload()
        } else {
            window.alert('Ocorreu um erro, tente novamente!');
        }
    }
});
