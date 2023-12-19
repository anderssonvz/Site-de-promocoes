<?php

include_once('../php/conect.php');

date_default_timezone_set('America/Sao_Paulo');

$sqlSelectCateg = "SELECT * FROM categoria";
$resultCateg = $conexao->query($sqlSelectCateg);
$optionCateg = '';

while ($row = mysqli_fetch_array($resultCateg)) {
    $optionCateg = $optionCateg . "<option value='$row[0]'>$row[1]<option>";
}

$sqlSelectProd = "SELECT * FROM produto";
$resultProd = $conexao->query($sqlSelectProd);
$optionProd = '';
$result = '';

while ($row = mysqli_fetch_array($resultProd)) {
    $optionProd = $optionProd . "<option value='$row[0]'>$row[2]<option>";
}

$sqlSelectEst = "SELECT * FROM estabelecimento";
$resultEst = $conexao->query($sqlSelectEst);
$optionEst = '';

while ($row = mysqli_fetch_array($resultEst)) {
    $optionEst = $optionEst . "<option value='$row[0]'>$row[1]<option>";
}

if (isset($_POST['submit'])){
    $codEst = $_POST['codEst'];
    $codProd = $_POST['codProd'];
    $codCateg = $_POST['codCateg'];
    $descPost = $_POST['descPost'];
    $precoPost = $_POST['precoPost'];
    $dataPost = date("Y-m-d", time());
    $imgPost = $_POST['imgPost'];

    $sqlPost = mysqli_query($conexao, "INSERT INTO postagem VALUES (0, '1', '$codEst', '$codProd', '$dataPost', '$descPost', '$precoPost', '$imgPost')");
    $result = '<p class="result">Publicado com sucesso!</p><br><a href ="index.php" class="result">Voltar ao Index</a>';
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
    <form id="pub" method="post" action="postagem.php">
        <div id="title">
            <h1>WebPromo!</h1>
            <div id="img"><img src="../imagens/cesta.png" width="100px" alt=""></div>
        </div>

        <ul>
            <li>
                <p>Descrição:</p>
                <textarea name="descPost" id="" cols="30" rows="10" placeholder="Digite Aqui"></textarea>
            </li>
            <li>
                <p>Valor da Promoção</p>
                <input type="number" placeholder="Preço" id="" name="precoPost">
            </li>
            <li>
                <p>URL da Imagem</p>
                <input type="text" placeholder="URL da Imagem" name="imgPost">
            </li>
            <li>
                <p>Selecione Uma Categoria</p>
                <select name="codCateg" id="categoria">
                    <option value="" data-defalt disable selected></option>
                    <?php echo $optionCateg ?>
                </select>
            </li>

            <li>
                <p>Selecione Um Produto</p>
                <select name="codProd" id="produto">
                    <option value="" data-defalt disable selected></option>
                    <?php echo $optionProd ?>
                </select>
            </li>

            <li>
                <p>Selecione o Estabelecimento</p>
                <select name="codEst" id="est">
                    <option value="" data-defalt disable selected></option>
                    <?php echo $optionEst ?>
                </select>
            </li>
        </ul>
        <input type="submit" value="Enviar" id="enviar" name="submit">
        <?php echo $result?>
    </form>
</body>
</html>