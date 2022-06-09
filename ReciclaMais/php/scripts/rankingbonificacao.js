let catadoresparabonificar = document.querySelectorAll('.bonificar');
catadoresparabonificar.forEach(e =>{
    let acoes = e.querySelector('.acoes');
    acoes.innerHTML += " <a class='link' href='#'><button btn-delete class='buttons-template btn-bonificar'>Bonificar</button> </a>";
});

let sairbtn = document.querySelector('.btn-sair');
let modal = document.querySelector('.form-bonificar');
sairbtn.addEventListener('click', ()=> {
    modal.style.display ="none";
});

let bonificarbtn = document.querySelectorAll('.btn-bonificar');
bonificarbtn.forEach(btn => {
    btn.addEventListener('click', () => {
        modal.style.display ="block";

    })
});