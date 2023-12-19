<?php 
    include_once('../php/conect.php');
    date_default_timezone_set('America/Sao_Paulo');
    $sqlSelectProduto = "SELECT * FROM PRODUTO";
    $resultProduto = $conexao->query($sqlSelectProduto);

    $sqlSelectCateg = "SELECT * FROM categoria";
    $resultCateg = $conexao->query($sqlSelectCateg);
    $optionCateg = '';
    $result = '';

    while ($row = mysqli_fetch_array($resultCateg)) {
        $optionCateg = $optionCateg . "<option value='$row[0]'>$row[1]<option>";
    }

    if (isset($_POST['submit'])){
        $cod_categ = $_POST['cod_categ'];//Tem q fazer pegar o numero do cod
        $nome_prod = $_POST['nome_prod'];
        $marca_prod = $_POST['marca_prod'];
        $sqlPost = mysqli_query($conexao, "INSERT INTO PRODUTO VALUES (0, '$cod_categ', '$nome_prod','$marca_prod')");
        $result = '<p class="result">Cadastrado com sucesso!</p><br><a href ="index.php" class="result">Voltar ao Index</a>';
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
    <form id="pub" method="post" action="produto.php">
        <div id="title">
            <h1>WebPromo!</h1>
            <div id="img"><img src="../imagens/cesta.png" width="100px" alt=""></div>
        </div>

        <h1>Cadastrar Produto</h1>

        <ul>
            <li>
                <p>Categoria</p>
                <select name="cod_categ" id="categoria">
                    <option value="" data-defalt disable selected></option>
                    <?php echo $optionCateg ?>
                </select>
            </li>
            <li>
                <p>Nome</p>
                <input type="text" name="nome_prod" id="">
            </li>
            <li>
                <p>Marca</p>
                <input type="text" placeholder="" name="marca_prod">
            </li>
            <?php echo $result ?>
        </ul>
        <input type="submit" value="Enviar" id="enviar" name="submit">
    </form>
</body>
</html>