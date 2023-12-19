const produto = document.getElementById ('produto');

window.addEventListener('load',addEvent)

function addEvent() {
    categoria.addEventListener("click",listProduto);
}

function check() {
    const option = categoria.value;
    return option;
}

async function listProduto(){
    produto.innerHTML='<option value="">Selecione</option>';
    const dados = await fetch ('../php/produtos.php');
    const resp = await dados.json();

    if (resp['status']){
        for (var i=0;i<resp.dados.length; i++){
            if (resp.dados[i]['cod_categ'] == check()){
                produto.innerHTML = produto.innerHTML+'<option value="'+resp.dados[i]['cod_prod']+'">'+resp.dados[i]['nome_prod']+'</option>';
            }
        }
    }
}