<?php 
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "trab_pbd";

    try {
        $conexao = new mysqli($host, $user, $password, $db);
    } catch (PDOException $err) {
        echo "Erro: Conexão com Banco de Dados -> ".$err->getMessage();
    }

    /*$cpfUser = $_GET['cpf_usu'];

    echo $cpfUser;

    $query = "SELECT cod_usu FROM USUARIO WHERE CPF_USU = $cpfUser";

    $result = $conexao->prepare($query);
    $result->execute();

    if ($result){
        header("Location: ../paginas/feed.php");
    } else echo "Usuario não encontrado";*/
?>