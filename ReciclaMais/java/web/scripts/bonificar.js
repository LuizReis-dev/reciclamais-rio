const buscarCatadores = async () => {
    const res = await fetch('http://localhost:8080/JavaWeb/bonificacao');
    const data = await res.json();
    return data;
}

window.addEventListener('load', async () => {
    const catadores = await buscarCatadores();
    const tabelaCatadores = document.querySelector('.tabela-controlar');

    catadores.forEach((catador) => {
        tabelaCatadores.innerHTML += `<tr data-valor="${catador.valor_bonificar}" data-qtdreferente="${catador.quantidade_bonificacoes}" data-idmatop="${catador.id_materiais_em_operacao_comercial}">
            <td>${catador.nome_catador}</td>
            <td>${catador.nome_material}</td>
            <td>${catador.total_vendido} kg</td>
            <td>R$${catador.valor_bonificar}</td>
            <td class='acoes'><button data-id=${catador.id_catador} class='buttons-template btn-bonificar'>Bonificar</button></td>   
            </tr>`
    });

    let bonificarFormObj = {
        id_material_em_op : 0,
        quantidade_referente : 0,
        valor_recomendado : 0
    }

    let botoesBonificar = document.querySelectorAll('.btn-bonificar');
    botoesBonificar.forEach((botao) => {
        botao.addEventListener('click', ()=> {
            let row = botao.parentNode.parentNode;
            bonificarFormObj.id_material_em_op = row.dataset.idmatop;
            bonificarFormObj.quantidade_referente = row.dataset.qtdreferente;
            bonificarFormObj.valor_recomendado = row.dataset.valor;
            montarBonificarForm();
            console.log(bonificarFormObj);
        })
    })
    let modal = document.querySelector('.modal');
    let montarBonificarForm = () => {
        modal.style.display = 'flex';
    }
    let btnFecharModal = document.querySelector('.fechar-modal');
    btnFecharModal.addEventListener('click', () =>{
        modal.style.display = 'none';
    })
});
