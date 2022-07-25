/* Tela de carregamneto */
let pagina = document.querySelector(".pagina");
let tela = document.querySelector(".tela");
let loading = document.querySelector(".loading");
let login = document.querySelector("#login");


/* Criando divs com as classes estilizadas */
let teladiv = document.createElement("div");
let circulodiv = document.createElement("div");
teladiv.className = "tela";
circulodiv.className = "circulo";

/* Retirando a tela de carregamento*/
tela.remove();

/* Função de loading */
login.addEventListener("click", function () {
    loading.appendChild(teladiv);
    teladiv.appendChild(circulodiv);
    pagina.style.display = "none";

    setTimeout(function login() {
        window.location.href = "cadastrar.html";
    }, 300);
});

/* Máscara para a CNPJ */
const cnpj = document.querySelector('#cnpj');

cnpj.addEventListener('keypress', () => {
    let cnpjLength = cnpj.value.length

    if(cnpjLength === 2 || cnpjLength === 6){
        cnpj.value += '.'
    }else if(cnpjLength === 10){
        cnpj.value += '/'
    }else if(cnpjLength === 15){
        cnpj.value += '-'
    }
});

/* Mostrar senha */
const senha = document.getElementById('senha');
let olho = document.querySelector('i');

/* criando divs com classes do bootstrap */
olho.classList.add('bi-eye-fill','bi-eye-slash-fill')

olho.classList.replace('bi-eye-slash-fill','bi-eye-fill');

function MostrarOcultar() {
    if (senha.type === 'password') {
        senha.setAttribute('type', 'text')
        olho.classList.replace('bi-eye-fill','bi-eye-slash-fill')
    }
    else {
        senha.setAttribute('type','password')
        olho.classList.replace('bi-eye-slash-fill','bi-eye-fill')
    }
};