const extensions = {
    'image/png': 'png',
    'image/jpeg': 'jpeg',
    'image/jpg': 'jpg'
};

function validacaoResposta(erros) {
    console.log(erros);
    const divErros = document.getElementById('erros');
    const listaErros = document.getElementById('listaErros');    
    let tam = 0;
    let vErros = [];
    let vErrosAux = [];
    let aux = "";

    try {

        for (const [chave, valor] of Object.entries(erros.errors)) {
            //console.log(`${key}: ${valor}`);
            
            aux = `${valor}`;

            if (aux.indexOf(",") == -1) {
                vErros.push(`${valor}`);
                aux = "";
                
            } else {
                vErrosAux = aux.split(",");
                vErros = vErros.concat(vErrosAux);

                vErrosAux = [];
                aux = "";
            }
          }

          tam = vErros.length;

            for (let i = 0; i < tam; i++) {
                const item = document.createElement('li');
                item.innerHTML = vErros[i];
                listaErros.appendChild(item);
            }
        
     
        divErros.style.display = 'block';
        document.documentElement.scrollTop = 0;
        
    } catch (err) {
        console.log("Descrição erro: " + err);        
    }
}

function criarBotao(conteudo) {
    const btn = document.createElement('button');
    btn.textContent = conteudo;
    btn.style.margin = '5px';
    btn.className = 'btn btn-danger';

    return btn;
}

function crop(imagem) {
    return new Cropper(imagem, {
        preview: '#preview-crop',
        background: false
    });
}

const imagemAvatar = document.getElementById('avatar-imagem');
const id = document.getElementById('id');
const caixa = document.getElementById('botoes');
const form = document.getElementById('form');
const submitBotao = document.getElementById('submit');

const imagemPreview = document.createElement('img');



imagemAvatar.addEventListener('change', e => {

    const preview = document.getElementById('imagem-preview');

    if (preview) {
        preview.remove();
    }

    const fr = new FileReader();

    fr.onload = function (evento) {
        //	
        imagemPreview.id = 'imagem-preview';
        imagemPreview.src = evento.target.result;
        caixa.append(imagemPreview);

    };

    fr.readAsDataURL(imagemAvatar.files[0]);

    //console.log(imagemAvatar.files[0]);

    setTimeout(recorte, 500);

    function recorte() {

        let cropper = crop(imagemPreview);
        let previewCrop = document.getElementById('preview-crop');
        previewCrop.style.display = 'block';

        const removerBotaoCrop = criarBotao('Remover recorte');

        caixa.append(removerBotaoCrop);

        removerBotaoCrop.addEventListener('click', evento => {
            cropper.destroy();
            removerBotaoCrop.remove();
            imagemPreview.remove();
            imagemAvatar.value = '';
            previewCrop.style.display = 'none';

        });


        submitBotao.addEventListener('click', evento => {

            evento.preventDefault();

            if (cropper.cropped) {

                cropper.getCroppedCanvas().toBlob(async blob => {

                    try {

                        const urlAtual = window.location.href;
                        const formData = new FormData(form);

                        const reader = new FileReader();
                        reader.readAsDataURL(blob);
                        reader.onloadend = async function () {
                            const base64data = reader.result;

                            formData.append('arquivo', base64data);
                            formData.append('extension', extensions[blob.type]);

                            formData.delete("imagem");

                            if (urlAtual == 'http://127.0.0.1:8000/painel-torneios/create') {

                                const resposta = await fetch("http://127.0.0.1:8000/painel-torneios", {
                                    method: 'POST',
                                    body: formData
                                });
    
                                resposta.json().then((dados) => {                                
    
                                    if (dados.success != null){
                                        window.location.replace(dados.link);
                                    } else {
                                        validacaoResposta(dados);
                                    }
    
                                });
                                
                            } else {    
                                const token = document.querySelector('meta[name="csrf-token"]').content;
                                const id = urlAtual.split('/');                                
                                const urlEditar = "http://127.0.0.1:8000/painel-torneios/" + id[4];
                                const resposta = await fetch(urlEditar, {
                                    method: 'POST',
                                    headers: {
                                        "X-CSRF-TOKEN": token                                        
                                    },                                
                                    body: formData
                                });
    
                                resposta.json().then((dados) => {                                
    
                                    if (dados.success != null){
                                        window.location.replace(dados.link);
                                    } else {
                                        validacaoResposta(dados);
                                    }
    
                                });
                                
                            }                           
                        }

                    } catch (err) {
                        console.log("Descrição erro: " + err);
                    }
                }
                );
            }
        });////
    }
});

