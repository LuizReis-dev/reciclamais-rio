const buscarCatadores = async () => {
    const res = await fetch('http://localhost:8080/JavaWeb/catadores');
    const data = await res.json();
    return data;
}
const buscarMateriais = async () => {
    const res = await fetch('http://localhost:8080/JavaWeb/materiais');
    const data = await res.json();
    return data;
}


window.addEventListener('load', async () => {
    const catadores = await buscarCatadores();
    const materiais = await buscarMateriais();

    const selectCatadores = document.querySelector('#catadores')
    const selectMateriais = document.querySelector('#materiais')

    const renderizar = (lista, select) => {
        if (!lista.length) {
            select.innerHTML = '<option value="">Nenhum valor encontrado</option>';
            return
        }

        lista.forEach((valor) => {
            select.innerHTML += `<option value="${valor.id}" >${valor.nome}</option>`
        })
    }

    renderizar(catadores, selectCatadores)
    renderizar(materiais, selectMateriais)

    const inputCatador = document.querySelector("#search-catador")
    inputCatador.addEventListener('input', (e) => {
        pesquisaValoresNoSelect(e.target.value, catadores, selectCatadores)
    })

    const inputMaterial = document.querySelector('#search-material')
    inputMaterial.addEventListener('input', (e) => {
        pesquisaValoresNoSelect(e.target.value, materiais, selectMateriais)
    })

    const pesquisaValoresNoSelect = (valorPesquisa, lista, select) => {
        const valoresFiltrados = lista.filter((valor) => valor.nome.toLowerCase().includes(valorPesquisa.toLowerCase()))
        select.innerHTML = ''
        renderizar(valoresFiltrados, select)
    }
    let catadorForm = document.querySelector('#catador-form');
    catadorForm.addEventListener('click', (e) => {
        e.preventDefault();
    })

    let objEnviar;
    let catadorDiv = document.querySelector('#catador-div');
    let addCatadorBtn = document.querySelector('#add-catador');
    addCatadorBtn.addEventListener('click', () => {
        const valorSelect = selectCatadores.value; 
        console.log(valorSelect);
        objEnviar = {
            id_catador : valorSelect
        }
        console.log(objEnviar);
        catadorDiv.innerHTML = `Catador: ${selectCatadores.options[selectCatadores.selectedIndex].text}`
        
    })
    let removerCatadorBtn = document.querySelector('#remover-catador');
    removerCatadorBtn.addEventListener('click', () =>{
        console.log("vasco");
        objEnviar.id_catador = null;
        console.log(objEnviar);
        catadorDiv.innerHTML = 'Catador: ';
    })
})
