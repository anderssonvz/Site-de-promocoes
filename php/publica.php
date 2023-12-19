<?php 
    include("../php/conect.php");
    include("../php/login.php");

    $desc = $_GET ['desc'];
    $val = $_GET ['preco'];
    $URL = $_GET ['URL'];
    $categoria = $_GET ['categoria'];
    $produto = $_GET ['produto'];

    $queryUser = "select cod_usu from usuario where cpf_usu = $cpf";
    $user = $sql->prepare($queryUser);
    $user->execute();

    if ($user) {
        $row = $user->fetch(PDO::FETCH_ASSOC);
        extract($row);
        $dataUser [] = [
            'cod_usu' => $COD_USU
        ];
    }
    echo $dataUser;





    $query = "INSERT INTO `trab_pbd`.`postagem` (`cod_usu`, `cod_est`, `cod_prod`, `data_post`, `desc_post`, `preco_post`, `img_post`) VALUES ('2', '2', '5', '2022-11-24', 'Coca 2L barata', '5', 'IMG')"
?>