const est  = document.getElementById('est');
if (est) {
    listEst ();
}

async function listEst() {
    const dados = await fetch ('../php/est.php');//recebe a resposta
    const resp = await dados.json();//le as infos

    if (resp['status']){
        for (var i=0; i < resp.dados.length;i++) {
            est.innerHTML = est.innerHTML + '<option value="'+resp.dados[i]['cod_est']+'">'+ resp.dados[i]['nome_est'] +'</option>';
        }
    } 
}