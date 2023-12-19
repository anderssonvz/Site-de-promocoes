const categoria  = document.getElementById('categoria');
if (categoria) {
    listCategoria ();
}

async function listCategoria() {
    const dados = await fetch ('../php/categorias.php');//recebe a resposta
    const resp = await dados.json();//le as infos

    if (resp['status']){
        for (var i=0; i < resp.dados.length;i++) {
            categoria.innerHTML = categoria.innerHTML + '<option value="'+resp.dados[i]['cod_categ']+'">'+ resp.dados[i]['categoria_categ'] +'</option>';
        }
    } 
}