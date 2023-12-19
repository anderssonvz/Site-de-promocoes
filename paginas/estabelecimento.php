<?php 
    include_once('../php/conect.php');
    date_default_timezone_set('America/Sao_Paulo');
    $sqlSelectEst = "SELECT * FROM ESTABELECIMENTO";
    $resultEst = $conexao->query($sqlSelectEst);
    $result = '';
    if (isset($_POST['submit'])){
        $nome_est = $_POST['nome_est'];
        $end_est = $_POST['end_est'];
        $numero_est = $_POST['numero_est'];
    
        $sqlPost = mysqli_query($conexao, "INSERT INTO ESTABELECIMENTO VALUES (0, '$nome_est','$end_est','$numero_est')");
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
    <form id="pub" method="post" action="estabelecimento.php">
        <div id="title">
            <h1>WebPromo!</h1>
            <div id="img"><img src="../imagens/cesta.png" width="100px" alt=""></div>
        </div>

        <h1>Cadastrar Estabelecimento</h1>

        <ul>
            <li>
                <p>Nome</p>
                <input type="text" name="nome_est" id="">
            </li>
            <li>
                <p>Endereço</p>
                <input type="text" placeholder="" name="end_est">
            </li>
            <li>
                <p>Telefone</p>
                <input type="number" name="numero_est" id="">
            </li>
        </ul>
        <input type="submit" value="Enviar" id="enviar" name="submit">
        <?php echo $result?>
    </form>
</body>
</html>