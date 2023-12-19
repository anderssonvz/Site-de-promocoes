<?php

include_once('../php/conect.php');

$sqlSelectPost = "SELECT u.nome_usu, pr.nome_prod, p.desc_post, p.preco_post, p.img_post, p.data_post,e.nome_est, COALESCE(CAST(sum(a.nota_ava) /count(a.nota_ava ) AS DECIMAL(4, 2)), 0) as NotaMedia 
FROM postagem as p 
LEFT JOIN avaliacao as a ON p.cod_post = a.cod_post 
JOIN usuario as u ON u.cod_usu = p.cod_usu 
JOIN produto as pr ON pr.cod_prod = p.cod_prod 
JOIN estabelecimento as e ON e.cod_est = p.cod_est 
GROUP BY P.cod_post 
ORDER BY p.data_post DESC";

$resultPost = $conexao->query($sqlSelectPost);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
    <?php
        include_once('../php/conect.php');
     ?>
    <header>
            <div id="icon">
                <div id="textIcon">
                    <h1>WebPromo!</h1>
                    <sub>Seu Site de Promoções!</sub>
                </div>
                <img src="../imagens/cesta.png" width="50px" height="50px" alt="">
            </div>
    </header>
    <nav>
        <ul>
            <li><a href="avaliacao.php">Avaliar</a></li>
            <li><a href="postagem.php">Publicar</a>
            <li><a href="estabelecimento.php">Estabelecimento</a>
            <li><a href="usuario.php">Usuário</a>
            <li><a href="produto.php">Produto</a>
            <li><a href="categoria.php">Categoria</a>

        </ul>
    </nav>

    <main>

        <?php

        while($postData = mysqli_fetch_assoc($resultPost)) {
            echo "  <div class='pub'>
                        <div class='text-user'>
                            <div class='user'>
                                <img src='../imagens/user.png' width='100px' height='100px' alt=''>
                                <p>". $postData["nome_usu"] ."</p><br>
                                <p>". $postData["data_post"] ."</p>
                            </div>
                            <div class='text'>
                                <p><b>". $postData["nome_prod"] ."</b></p></br>
                                <p><b> R$ ". $postData["preco_post"] ."</b></p></br>
                                <p><b>". $postData["nome_est"] ."</b></p></br>
                                <p>". $postData["desc_post"] ."</p>
                            </div>
                        </div>
                        <div class='pubImage'><img src='". $postData['img_post'] ."' alt=''></div>
                        <div class='rating'>
                            <p>Nota dos usuários: <b>". $postData["NotaMedia"] ."</b></p>
                        </div>
                    </div>";
        }        
        ?>
    </main>

    

    <footer>
        <p>WebPromo foi um site criado para a disciplina de Banco de Dados</p>
    </footer>
</body>
</html>