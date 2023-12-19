<?php 
    include_once('../php/conect.php');
    date_default_timezone_set('America/Sao_Paulo');
    $sqlSelectAvaliacao = "SELECT * FROM AVALIACAO";
    $resultAvaliacao = $conexao->query($sqlSelectAvaliacao);
    $result = '';
    if (isset($_POST['submit'])){
        $nota_ava = $_POST['nota_ava'];
        $cod_post = $_POST['cod_post'];
        $cod_usu = $_POST['cod_usu'];
    
        $sqlPost = mysqli_query($conexao, "INSERT INTO AVALIACAO VALUES (0, '$cod_post', '$cod_usu' ,'$nota_ava')");
        $result = '<p class="result">Avaliado com sucesso!</p><br><a href ="index.php" class="result">Voltar ao Index</a>';
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/pub.css">
</head>
<body>
    <form id="pub" method="post" action="avaliacao.php">
        <div id="title">
            <h1>WebPromo!</h1>
            <div id="img"><img src="../imagens/cesta.png" width="100px" alt=""></div>
        </div>

        <h1>Avaliar</h1>

        <ul>
            <li>
                <p>Nota</p>
                <sub>0</sub>
                <input type="range" max="10" step="1" name="nota_ava" id="">
                <sub>10</sub>
            </li>
            <li>
                <p>Codigo Postagem</p>
                <input type="number" placeholder="" name="cod_post">
            </li>
            <li>
                <p>Codigo de Usuário</p>
                <input type="number" name="cod_usu" id="">
            </li>
        </ul>
        <input type="submit" value="Enviar" id="enviar" name="submit">
        <?php echo $result?>
    </form>
</body>
</html>