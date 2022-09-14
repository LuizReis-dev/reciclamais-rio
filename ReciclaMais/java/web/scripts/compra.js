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
            select.innerHTML += `<option data-preco="${valor.preco_compra_kg}" value="${valor.id}" >${valor.nome}</option>`
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

    let objEnviar = {
        id_catador: 0, 
        total: 0, 
        materiais : []
    };
    
    let catadorDiv = document.querySelector('#catador-div');
    let addCatadorBtn = document.querySelector('#add-catador');
    addCatadorBtn.addEventListener('click', () => {
        const valorSelect = selectCatadores.value; 
        objEnviar.id_catador = valorSelect;
        catadorDiv.innerHTML = `Catador: ${selectCatadores.options[selectCatadores.selectedIndex].text}`
        
    })
    let removerCatadorBtn = document.querySelector('#remover-catador');
    removerCatadorBtn.addEventListener('click', () =>{
        objEnviar.id_catador = null;
        catadorDiv.innerHTML = 'Catador: ';
    })
    let materialForm = document.querySelector('#material-form');
    materialForm.addEventListener('click', (e) => {
        e.preventDefault();
    })

    let addMaterialBtn = document.querySelector("#add-material");
    addMaterialBtn.addEventListener('click', () => {

        let materialSelecionado = document.querySelector("#materiais");
        let quantidadeSelecionada =document.querySelector("#qtd-material");

        if(quantidadeSelecionada.value != ''){
            materialObj = {
                id_material: materialSelecionado.value,
                total_em_kg: quantidadeSelecionada.value,
                preco : materialSelecionado.options[materialSelecionado.selectedIndex].dataset.preco
            }
            objEnviar.materiais.push(materialObj);
            renderizarMateriais();
        } else {
            window.alert('Digite uma quantidade');
        }
    })

    let renderizarMateriais = () => {
        let materiaisDiv = document.querySelector('.produtos-container');
        materiaisDiv.innerHTML = ' vasco ';
        let materiaisRenderizar = objEnviar.materiais;
        materiaisRenderizar.forEach((material) => {
        }) 
    }

})
