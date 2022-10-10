let popup = document.getElementById('modal');
let bemVindo = document.getElementById('bem-vindo');
let titulo = document.getElementById('titulo');

function fecharModal(){
    popup.classList.replace('bloqueado','fecharmodal');
    bemVindo.setAttribute("style","animation-play-state: running;")
    titulo.setAttribute("style","animation-play-state: running;")
}

const botaoEnviar = document.querySelector("#submit-btn");
botaoEnviar.addEventListener('click', (e) => {
    e.preventDefault();
    const login = document.querySelector("#login").value;
    const senha = document.querySelector("#senha").value;

    const dados = {
        login,
        senha
    }
    fetch("http://localhost:8080/JavaWeb/login", {
        method: "post",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(dados)
    }).then(res => res.json()).then(res => redireciomento(res.autorizacao));

});

const redireciomento = (autorizacao) => {
    if (autorizacao === true) {
        fecharModal();
    } else {
        window.alert('Acesso negado!');
    }
} 
