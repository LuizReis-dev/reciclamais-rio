const buscarCatadores = async () => {
    const res = await fetch('http://localhost:8080/JavaWeb/bonificacao');
    const data = await res.json();
    return data;
}

window.addEventListener('load', async () => {
    const catadores = await buscarCatadores();
    const tabelaCatadores = document.querySelector('.tabela-controlar');

    catadores.forEach((catador) => {
        tabelaCatadores.innerHTML += `<tr>
            <td>${catador.nome_catador}</td>
            <td>${catador.nome_material}</td>
            <td>${catador.total_vendido} kg</td>
            <td>R$${catador.valor_bonificar}</td>
            <td class='acoes'><button data-id=${catador.id_catador} class='buttons-template btn-bonificar'>Bonificar</button></td>   
            </tr>`
    });

    let botoesBonificar = document.querySelectorAll('.btn-bonificar');
    botoesBonificar.forEach((botao) => {
        botao.addEventListener('click', ()=> {
            console.log(botao.parentNode.parentNode);
        })
    })
    let btnFecharModal = document.querySelector('.fechar-modal');
    let modal = document.querySelector('.modal');
    btnFecharModal.addEventListener('click', () =>{
        modal.style.display = 'none';
    })
});
