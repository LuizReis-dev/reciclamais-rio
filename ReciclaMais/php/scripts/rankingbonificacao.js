let catadoresparabonificar = document.querySelectorAll('.bonificar');
catadoresparabonificar.forEach(e =>{
    let acoes = e.querySelector('.acoes');
    acoes.innerHTML += " <a class='link' href='#'><button btn-delete class='buttons-template btn-bonificar'>Bonificar</button> </a>";
})