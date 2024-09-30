const titulo = document.getElementById('tituloTabela');
const tabela = document.getElementById('tabela');
const msg = document.getElementById("res");
let linha;

function existe(id) {
  const tam = tabela.children[0].children.length;

  for (let i = 0; i < tam; i++) {
    if (tabela.children[0].children[i].id == id) {      
      return true;
    }
  }
  return false;
}

function apagar(){
  msg.style.display = "none";
}

function inicioArrastaTabela(e) {  
  e.target.classList.add("arrastando");
  e.dataTransfer.dropEffect = "copy";
  e.dataTransfer.effectAllowed = "move"  
  e.dataTransfer.setData("Text", e.target.id);
  
}

function fimArrasta(e) {
  e.target.classList.remove("arrastando");  
}

function permitirDrop(e) {
  e.preventDefault();

}

function apagarDestaque(el) {  
  el.parentElement.parentElement.remove();
  salvarDestaques();
}

function dropDestaque(e) {
  e.preventDefault();

  try {

    if (e.target.parentNode.id == 'tituloTabela') {
      const data = e.dataTransfer.getData("Text");
      const copia = document.getElementById(data).cloneNode(true);

      console.log(copia.children);

      while (copia.children[4].children.length > 0) {
        copia.children[4].lastElementChild.remove();
      }

      const btnDeletar = document.createElement('button');
      btnDeletar.classList.add('btn');      
      btnDeletar.classList.add('btn-danger');
      btnDeletar.setAttribute('title', 'Apagar destaque');
      btnDeletar.setAttribute('type', 'button');
      btnDeletar.setAttribute('onclick', 'apagarDestaque(this)');

      const path = document.createElementNS('http://www.w3.org/2000/svg', 'path');
      path.setAttribute('d', 'M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5');
      
      const svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
      svg.setAttribute('xmlns', 'http://www.w3.org/2000/svg');
      svg.setAttribute('width', '16');
      svg.setAttribute('height', '16');
      svg.setAttribute('fill', 'currentColor');
      svg.setAttribute('class', 'bi bi-trash3');
      svg.setAttribute('viewBox', '0 0 16 16');

      svg.appendChild(path);
      btnDeletar.appendChild(svg);

      copia.setAttribute("ondragstart", "inicioArrastaDestaque(event)");
      copia.setAttribute("ondrop", "ordenarDestaque(event)");
      copia.setAttribute("ondragover", "permitirDrop(event)");
      copia.setAttribute("draggable", "true");
      copia.classList.remove("arrastando");      

      copia.children[4].appendChild(btnDeletar);
      
      if (tabela.children[0].children.length < 2) {
        titulo.insertAdjacentElement('afterend', copia);
      } else if (!existe(copia.id) && tabela.children[0].children.length < 9 ) {            
        titulo.insertAdjacentElement('afterend', copia);
      }

      salvarDestaques();
    }
    
  } catch (error) {
    console.log(error);
    
  }    
}

function inicioArrastaDestaque(e) {
  e.dataTransfer.dropEffect = "copy";
  e.dataTransfer.effectAllowed = "move";
  linha = e.target;

}

function ordenarDestaque(e) {
  e.preventDefault();

  try {
    let drop = e.target.parentNode;
    let transfer = drop.cloneNode(true);
    drop.innerHTML = linha.innerHTML;
    linha.innerHTML = transfer.innerHTML;

    salvarDestaques();
    
  } catch (error) {
    console.log(error);
    
  }
}

function resetarDestaques() {
  const tbody = document.getElementById("tabelaDrop");

  while (tbody.children.length > 1) {
    tbody.removeChild(tbody.lastElementChild);
  }
}

async function salvarDestaques() {

  let destaquesLista = "";
  const destaques = document.getElementById('tabelaDrop');
  const tam = destaques.children.length;
  const token = document.querySelector('meta[name="csrf-token"]').content;

  for (let i = 1; i < tam; i++) {
    if (i == 1) {
      destaquesLista = "pos" + i + "=" + destaques.children[i].id;      
    } else {
      destaquesLista += "&" + "pos" + i + "=" + destaques.children[i].id;
    }
  }

  const resposta = await fetch("http://127.0.0.1:8000/salvar-destaques", {
    method: 'POST',
    headers: {
      "X-CSRF-TOKEN": token,
      "Content-type": "application/x-www-form-urlencoded"
    },
    body: destaquesLista
  });

  resposta.json().then((dados) => {    
    msg.style.display = "block";
    msg.innerHTML = dados.success;
    setTimeout(apagar, 3000);
  });
}