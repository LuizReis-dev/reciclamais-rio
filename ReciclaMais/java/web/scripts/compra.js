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

const buscarTotalBonificacao = async (idCatador) => {
    const res = await fetch(`http://localhost:8080/JavaWeb/totalabonificarporcatador?id_catador=${idCatador}`);
    const data = await res.json();
    return data;
}


window.addEventListener('load', async () => {
    const catadores = await buscarCatadores();
    const materiais = await buscarMateriais();

    const selectCatadores = document.querySelector('#catadores');
    const selectMateriais = document.querySelector('#materiais');

    const renderizar = (lista, select) => {
        if (!lista.length) {
            select.innerHTML = '<option value="">Nenhum valor encontrado</option>';
            return;
        }

        lista.forEach((valor) => {
            select.innerHTML += `<option data-preco="${valor.preco_compra_kg}" value="${valor.id}" >${valor.nome}</option>`
        })
    }

    renderizar(catadores, selectCatadores);
    renderizar(materiais, selectMateriais);

    const inputCatador = document.querySelector("#search-catador");
    inputCatador.addEventListener('input', (e) => {
        pesquisaValoresNoSelect(e.target.value, catadores, selectCatadores);
    })

    const inputMaterial = document.querySelector('#search-material');
    inputMaterial.addEventListener('input', (e) => {
        pesquisaValoresNoSelect(e.target.value, materiais, selectMateriais);
        mostrarPrecoProduto();
    })

    selectMateriais.addEventListener('click', () => {
        mostrarPrecoProduto();
    });

    let mostrarPrecoProduto = () => {
        let divPreco = document.querySelector('#preco-material');
        let precoMaterial = selectMateriais.options[selectMateriais.selectedIndex].dataset.preco;
        if (precoMaterial) {
            divPreco.innerHTML = `R$${precoMaterial}`;
        } else {
            divPreco.innerHTML = 'R$';
        }
    }

    const pesquisaValoresNoSelect = (valorPesquisa, lista, select) => {
        const valoresFiltrados = lista.filter((valor) => valor.nome.toLowerCase().includes(valorPesquisa.toLowerCase()));
        select.innerHTML = '';
        renderizar(valoresFiltrados, select);
    }
    let catadorForm = document.querySelector('#catador-form');
    catadorForm.addEventListener('click', (e) => {
        e.preventDefault();
    })

    let objEnviar = {
        id_catador: 0,
        total_sugerido: 0,
        total_final: 0,
        materiais: [],
        bonificacao: 0
    };

    let catadorDiv = document.querySelector('#catador-div');
    let addCatadorBtn = document.querySelector('#add-catador');
    addCatadorBtn.addEventListener('click', async () => {
        objEnviar.total_sugerido = 0;
        objEnviar.bonificacao = 0;
        calcularTotal();
        const valorSelect = selectCatadores.value;
        objEnviar.id_catador = valorSelect;
        catadorDiv.innerHTML = `Catador: ${selectCatadores.options[selectCatadores.selectedIndex].text}`;
        let totalAPagar = await buscarTotalBonificacao(valorSelect);
        if (totalAPagar.total) {
            let bonificacao = totalAPagar.total;
            objEnviar.bonificacao = bonificacao;
            mostrarBonificado();
            calcularTotal();
        } else {
            objEnviar.bonificacao = 0;
            mostrarBonificado();
        }
    });
    let mostrarBonificado = () => {
        let bonificacaoDiv = document.querySelector('#bonificado')
        let bonificacao = objEnviar.bonificacao;
        if (bonificacao > 0) {
            bonificacaoDiv.innerHTML = "Catador bonificado"
        } else {
            bonificacaoDiv.innerHTML = "Sem bonificacao"
        }
    }

    let removerCatadorBtn = document.querySelector('#remover-catador');
    removerCatadorBtn.addEventListener('click', () => {
        objEnviar.id_catador = null;
        objEnviar.materiais = [];
        renderizarMateriais();
        objEnviar.bonificacao = 0;
        objEnviar.total_sugerido = 0;
        calcularTotal();
        mostrarBonificado();
        catadorDiv.innerHTML = 'Catador: ';
    })
    let materialForm = document.querySelector('#material-form');
    materialForm.addEventListener('click', (e) => {
        e.preventDefault();
    })

    let addMaterialBtn = document.querySelector("#add-material");
    addMaterialBtn.addEventListener('click', () => {
        if (objEnviar.id_catador) {
            let materialSelecionado = document.querySelector("#materiais");
            let quantidadeSelecionada = document.querySelector("#qtd-material");

            if (quantidadeSelecionada.value != '') {
                materialObj = {
                    id_material: materialSelecionado.value,
                    total_em_kg: parseFloat(quantidadeSelecionada.value),
                    preco: parseFloat(materialSelecionado.options[materialSelecionado.selectedIndex].dataset.preco),
                    nome: materialSelecionado.options[materialSelecionado.selectedIndex].text
                }
                objEnviar.materiais.push(materialObj);
                renderizarMateriais();
                calcularTotal();
            } else {
                window.alert('Digite uma quantidade');
            }
        } else {
            window.alert('Selecione um catador');
        }
    })
    let removerMaterialBtn = document.querySelector('#remover-material');
    removerMaterialBtn.addEventListener('click', () => {
        objEnviar.materiais.pop();
        renderizarMateriais();
        calcularTotal();
    });

    let calcularTotal = () => {
        let valorTotal = 0;
        let materiaisCalcular = objEnviar.materiais;
        materiaisCalcular.forEach((material) => {
            valorTotal += (material.preco * material.total_em_kg);
        })
        objEnviar.total_sugerido = valorTotal;
        valorTotal += objEnviar.bonificacao;
        let precoDiv = document.querySelector('#preco-final');
        precoDiv.innerHTML = `R$${valorTotal}`;
    }

    let renderizarMateriais = () => {
        let materiaisDiv = document.querySelector('.produtos-container');
        materiaisDiv.innerHTML = '';
        let materiaisRenderizar = objEnviar.materiais;
        materiaisRenderizar.forEach((material) => {
            materiaisDiv.innerHTML += `
            <td>${material.nome}</td>
            <td>Quantidade: ${material.total_em_kg}kg</td>
            <td>R$${material.total_em_kg * material.preco}</td>`
        })
    }
    let finalizarForm = document.querySelector('.modal-finalizar');
    let comprarBtn = document.querySelector("#comprar-btn");
    comprarBtn.addEventListener('click', () => {
        //objEnviar.total_sugerido += objEnviar.bonificacao;
        if (objEnviar.materiais.length) {
            montarFinalizarForm()

            //     fetch('http://localhost:8080/JavaWeb/compra', {
            //         method: "POST",
            //         headers: {
            //             "Content-type": "application/json; charset=UTF-8"
            //         },
            //         body: JSON.stringify(objEnviar)
            //     })
            //         .then(res => res.json())
            //         .then(finalizarCompra())
            //         .catch(console.log);
        } else {
            window.alert('Selecione um material');
        }
    })

    let montarFinalizarForm = async () => {
        let bonificarFixo = await bonificarPreco();
        document.querySelector('.sugestao-preco').innerHTML = `Preco sugerido: R$${objEnviar.total_sugerido}`;
        if (bonificarFixo.total > 0) {
            document.querySelector('.valor-bonificacao').innerHTML = `Valor da bonificação: R$${bonificarFixo.total} Deseja aplicar?`;
        } else {
            document.querySelector('.valor-bonificacao').style.display = 'none';
            document.querySelector('#bonificar-checkbox').style.display = 'none';
        }
        if (objEnviar.total_final > 0) {
            document.querySelector('.preco-finalizar').innerHTML = `Valor final: R$${objEnviar.total_final + objEnviar.bonificacao}`;
        } else {
            document.querySelector('.preco-finalizar').innerHTML = `Valor final: R$${objEnviar.total_sugerido + objEnviar.bonificacao}`;
        }
        finalizarForm.style.display = 'block';
    }

    let precoFinalInput = document.querySelector('#preco-final-input');
    precoFinalInput.addEventListener('input', () => {
        objEnviar.total_final = parseFloat(precoFinalInput.value);
        montarFinalizarForm()
    });

    document.querySelector('.fechar-form').addEventListener('click', () => {
        finalizarForm.style.display = 'none';
    });
    let bonificarCheckbox = document.querySelector('#bonificar-checkbox');
    bonificarCheckbox.addEventListener('click', async () => {
        let bonificarFixo = await bonificarPreco();
        console.log(bonificarFixo.total);
        if (bonificarCheckbox.checked) {
            objEnviar.bonificacao = bonificarFixo.total;
            montarFinalizarForm();
        } else {
            objEnviar.bonificacao = 0;
            montarFinalizarForm();
        }
    });

    document.querySelector('.btn-confirmar').addEventListener(('click'), (e) => {
        e.preventDefault();
        objEnviar.total_sugerido += objEnviar.bonificacao
        if (objEnviar.total_final == 0) {
            objEnviar.total_final = objEnviar.total_sugerido;
        } else {
            objEnviar.total_final += objEnviar.bonificacao;
        }

        fetch('http://localhost:8080/JavaWeb/compra', {
            method: "POST",
            headers: {
                "Content-type": "application/json; charset=UTF-8"
            },
            body: JSON.stringify(objEnviar)
        })
            .then(res => res.json())
            .then(finalizarCompra())
            .catch(console.log);
            
        console.log(objEnviar)
    });

    let bonificarPreco = async () => {
        return await buscarTotalBonificacao(objEnviar.id_catador);
    }
    let finalizarCompra = () => {
        objEnviar = {
            id_catador: 0,
            total_sugerido: 0,
            total_final: 0,
            materiais: [],
            bonificacao: 0
        };
        renderizarMateriais();
        calcularTotal();
        catadorDiv.innerHTML = 'Catador: ';
        window.alert('Compra Finalizada!');
    }

})
