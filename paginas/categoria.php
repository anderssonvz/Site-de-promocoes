<?php 
    include_once('../php/conect.php');
    date_default_timezone_set('America/Sao_Paulo');
    $sqlSelectCategoria = "SELECT * FROM CATEGORIA";
    $resultCategoria = $conexao->query($sqlSelectCategoria);
    $result = '';
    if (isset($_POST['submit'])){
        $categoria_categ = $_POST['categoria_categ'];
        
        $sqlPost = mysqli_query($conexao, "INSERT INTO CATEGORIA VALUES (0, '$categoria_categ')");
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
    <form id="pub" method="post" action="categoria.php">
        <div id="title">
            <h1>WebPromo!</h1>
            <div id="img"><img src="../imagens/cesta.png" width="100px" alt=""></div>
        </div>

        <h1>Cadastrar Categoria</h1>

        <ul>
            <li>
                <p>Nome</p>
                <input type="text" name="categoria_categ" id="">
            </li>
        </ul>
        <input type="submit" value="Enviar" id="enviar" name="submit">
        <?php echo $result?>
    </form>
</body>
</html>