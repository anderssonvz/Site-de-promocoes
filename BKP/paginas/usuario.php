<?php 
    include_once('../php/conect.php');
    date_default_timezone_set('America/Sao_Paulo');
    $sqlSelectEst = "SELECT * FROM USUARIO";
    $resultEst = $conexao->query($sqlSelectEst);
    $result = '';
    if (isset($_POST['submit'])){
        $nome_usu = $_POST['nome_usu'];
        $email_usu = $_POST['email_usu'];
        $numero_usu = $_POST['numero_usu'];
        $cpf_usu = $_POST['cpf_usu'];
        $sqlPost = mysqli_query($conexao, "INSERT INTO USUARIO VALUES (0, '$nome_usu','$email_usu','$numero_usu','$cpf_usu')");
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
    <form id="pub" method="post" action="usuario.php">
        <div id="title">
            <h1>WebPromo!</h1>
            <div id="img"><img src="../imagens/cesta.png" width="100px" alt=""></div>
        </div>

        <h1>Cadastrar Usuário</h1>

        <ul>
            <li>
                <p>Nome</p>
                <input type="text" name="nome_usu" id="">
            </li>
            <li>
                <p>Email</p>
                <input type="email" placeholder="@exemplo.com" name="email_usu">
            </li>
            <li>
                <p>Telefone</p>
                <input type="number" name="numero_usu" id="">
            </li>
            <li>
                <p>CPF</p>
                <input type="number" name="cpf_usu" id="">
            </li>
        </ul>
        <input type="submit" value="Enviar" id="enviar" name="submit">
        <?php echo $result?>
    </form>
</body>
</html>