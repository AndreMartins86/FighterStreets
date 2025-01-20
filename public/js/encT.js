const form = document.getElementsByClassName('form-check-input');
const tam = form.length;

window.addEventListener("load", ativarBtn);

for (let i = tam - 1; i > tam - 5; i--) {
    form[i].addEventListener("click", ativarBtn);
}

function ativarBtn() {
    
    const encBtn = document.getElementById('encBtn');
    const encLink = document.getElementById('encLink');

    if ((form[tam - 1].checked || form[tam - 2].checked) && (form[tam - 3].checked || form[tam - 4].checked)) {
        encBtn.disabled = false;
        encLink.disabled = false;
        encLink.classList.remove('disabled');
    }
}