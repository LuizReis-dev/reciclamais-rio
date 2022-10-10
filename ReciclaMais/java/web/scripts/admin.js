let popup = document.getElementById('modal');
let bemVindo = document.getElementById('bem-vindo');
let titulo = document.getElementById('titulo');

function fecharModal(){
    popup.classList.replace('bloqueado','fecharmodal');
    bemVindo.setAttribute("style","animation-play-state: running;")
    titulo.setAttribute("style","animation-play-state: running;")
}
