const botaoEnviar = document.querySelector("#enviar-btn");
botaoEnviar.addEventListener('click', (e) => {
    e.preventDefault();
    const usuario = document.querySelector("#login").value;
    const senha = document.querySelector("#senha").value;

    const dados = {
        usuario,
        senha
    }
    fetch("http://localhost:8080/JavaWeb/Login", {
        method: "post",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(dados)
    }).then(res => res.json()).then(res => redireciomento(res.autorizacao));

});

const redireciomento = (autorizacao) => {
    if (autorizacao === true) {
        window.location.replace("http://localhost:8080/JavaWeb/index.html");
    } else {
        document.location.reload();
    }
} 
