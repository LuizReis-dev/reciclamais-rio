let pagina = document.querySelector(".pagina");
let tela = document.querySelector(".tela");
let loading = document.querySelector(".loading");

let cadastrar = document.querySelector("#cadastrar");

let teladiv = document.createElement("div");
let circulodiv = document.createElement("div");

teladiv.className = "tela";
circulodiv.className = "circulo";

tela.remove();

cadastrar.addEventListener("click", function () {
    loading.appendChild(teladiv);
    teladiv.appendChild(circulodiv);
    pagina.remove();

    setTimeout(function cadastrar() {
        window.location.href = "logar.html";
    }, 1);
});