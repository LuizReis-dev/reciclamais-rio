const senha = document.getElementById('senha');
let olho = document.getElementById('olho');

olho.classList.add('bi-eye-fill', 'bi-eye-slash-fill')
olho.classList.replace('bi-eye-slash-fill', 'bi-eye-fill');

function MostrarOcultar() {
    if (senha.type === 'password') {
        senha.setAttribute('type', 'text');
        olho.classList.replace('bi-eye-fill', 'bi-eye-slash-fill');
    }
    else {
        senha.setAttribute('type', 'password');
        olho.classList.replace('bi-eye-slash-fill', 'bi-eye-fill');
    }
};