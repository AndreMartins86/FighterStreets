const cpf = document.getElementById('cpf');

document.addEventListener('onload', (ev) => {
    cpf.value = "";
});

cpf.addEventListener('keypress', (ev) => {

    if (cpf.value.length >= 11){
        ev.preventDefault();
    }
});

cpf.addEventListener('focusout', (ev) => {

    let valor = cpf.value;

    if (cpf.value.length < 11){ 

    } else {
        const parte1 = valor.slice(0, 3);
        const parte2 = valor.slice(3, 6);
        const parte3 = valor.slice(6, 9);
        const parte4 = valor.slice(9, 11);

        valor = parte1 + "." + parte2 + "." + parte3 + "-" + parte4;

        cpf.value = valor;
    }    

});