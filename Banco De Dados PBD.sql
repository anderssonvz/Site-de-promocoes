/*drop database trab_pbd;*/
create database trab_pbd;
use trab_pbd;

CREATE TABLE categoria (
    cod_categ INT AUTO_INCREMENT NOT NULL,
    categoria_categ VARCHAR(20) NOT NULL,
    PRIMARY KEY (cod_categ)
);

INSERT INTO categoria VALUES (0, 'Bebidas');
INSERT INTO categoria VALUES (0, 'Limpeza');
INSERT INTO categoria VALUES (0, 'Alimentos');
INSERT INTO categoria VALUES (0, 'Eletronicos');

CREATE TABLE produto (
    cod_prod INT AUTO_INCREMENT NOT NULL,
    cod_categ INT NOT NULL,
    nome_prod VARCHAR(40) NOT NULL,
    marca_prod VARCHAR(14) NOT NULL,
    PRIMARY KEY (cod_prod),
    FOREIGN KEY (cod_categ)
        REFERENCES categoria (cod_categ)
);

INSERT INTO produto VALUES (0, '2', 'Desinfetante Lavanda 2L', 'Pato');
INSERT INTO produto VALUES (0, '1', 'Coca Cola 2L', 'Coca Cola');
INSERT INTO produto VALUES (0, '1', 'Coca Cola 350ml', 'Coca Cola');
INSERT INTO produto VALUES (0, '4', 'TV 42\' 4K', 'Sony');
INSERT INTO produto VALUES (0, '4', 'Galaxy A20', 'Samsung');
INSERT INTO produto VALUES (0, '3', 'Feijão 2KG', 'Tordilho');
INSERT INTO produto VALUES (0, '3', 'Arroz 1 KG', 'São João');

CREATE TABLE estabelecimento (
    cod_est INT AUTO_INCREMENT NOT NULL,
    nome_est VARCHAR(30) NOT NULL,
    end_est VARCHAR(60) NOT NULL,
    numero_est VARCHAR(15) NOT NULL,
    PRIMARY KEY (cod_est)
);

INSERT INTO estabelecimento VALUES (0, 'Krolow', 'Av. Engenheiro Ildefonso Simões Lopes, 41', '32231869');
INSERT INTO estabelecimento VALUES (0, 'BIG', 'Av. Juscelino Kubitscheck de Oliveira, 2300', '7055050');
INSERT INTO estabelecimento VALUES (0, 'Paraiso', 'Centro, Dom Pedro II, 560', '32294267');

CREATE TABLE usuario (
    cod_usu INT AUTO_INCREMENT NOT NULL,
    nome_usu VARCHAR(30) NOT NULL,
    email_usu VARCHAR(30) NOT NULL,
    numero_usu VARCHAR(15) NOT NULL,
    cpf_usu VARCHAR(11) NOT NULL,
    PRIMARY KEY (cod_usu)
);

INSERT INTO usuario VALUES (0, 'João Silva', 'JS@exemplo.com', '123', '111');
INSERT INTO usuario VALUES (0, 'Marcia Souza', 'MS@exemplo.com', '456', '222');
INSERT INTO usuario VALUES (0, 'Lucas Nunes', 'LN@exemplo.com', '789', '333');
INSERT INTO usuario VALUES (0, 'Amanda Cardoso', 'AC@exemplo.com', '258', '444');
INSERT INTO usuario VALUES (0, 'Pedro Dias', 'PD@exemplo.com', '369', '555');

CREATE TABLE postagem (
    cod_post INT AUTO_INCREMENT NOT NULL,
    cod_usu INT NOT NULL,
    cod_est INT NOT NULL,
    cod_prod INT NOT NULL,
    data_post DATE NOT NULL,
    desc_post VARCHAR(150),
    preco_post DECIMAL(6, 2) NOT NULL,
    img_post VARCHAR(255) NOT NULL,
    PRIMARY KEY (cod_post),
    FOREIGN KEY (cod_usu)
        REFERENCES usuario (cod_usu),
    FOREIGN KEY (cod_est)
        REFERENCES estabelecimento (cod_est),
    FOREIGN KEY (cod_prod)
        REFERENCES produto (cod_prod)
);

INSERT INTO postagem VALUES (0, '1', '2', '4', '2022-11-22', 'Promoção da TV', '2399.99', 'https://folhetosbig.com.br/media/z3kimmvc/big_cristal_depois_resolucao_midia_social-43.jpg');
INSERT INTO postagem VALUES (0, '3', '3', '7', '2022-11-20', 'Arroz em Promoção', '13.90', 'IMG');
INSERT INTO postagem VALUES (0, '2', '2', '5', '2022-11-21', 'Celular no Big', '990.90', 'https://cdn.phonemore.com/content/2019/jpg/11917.jpg');
INSERT INTO postagem VALUES (0, '1', '1', '2', '2022-11-19', 'Coca 2L está barata', '4.99', 'IMG');
INSERT INTO postagem VALUES (0, '1', '1', '3', '2022-11-19', 'Coca Latinha Promoção', '2', 'IMG');
INSERT INTO postagem VALUES (0, '2', '1', '6', '2022-11-22', 'Feijão em promoção', '10.50', 'IMG');

CREATE TABLE avaliacao (
    cod_ava INT AUTO_INCREMENT NOT NULL,
    cod_post INT NOT NULL,
    cod_usu INT NOT NULL,
    nota_ava DOUBLE NOT NULL,
    PRIMARY KEY (cod_ava),
    FOREIGN KEY (cod_post)
        REFERENCES postagem (cod_post),
    FOREIGN KEY (cod_usu)
        REFERENCES usuario (cod_usu)
);

INSERT INTO avaliacao VALUES (0, '5', '4', '5');
INSERT INTO avaliacao VALUES (0, '5', '2', '5');
INSERT INTO avaliacao VALUES (0, '5', '5', '4');
INSERT INTO avaliacao VALUES (0, '1', '3', '1');
INSERT INTO avaliacao VALUES (0, '1', '2', '1');
INSERT INTO avaliacao VALUES (0, '2', '1', '4');
INSERT INTO avaliacao VALUES (0, '2', '2', '5');
INSERT INTO avaliacao VALUES (0, '2', '4', '3');
INSERT INTO avaliacao VALUES (0, '3', '1', '4');
INSERT INTO avaliacao VALUES (0, '3', '3', '3');
INSERT INTO avaliacao VALUES (0, '3', '4', '5');
INSERT INTO avaliacao VALUES (0, '3', '5', '4');
INSERT INTO avaliacao VALUES (0, '4', '2', '4');
INSERT INTO avaliacao VALUES (0, '4', '3', '5');
INSERT INTO avaliacao VALUES (0, '4', '4', '3');
INSERT INTO avaliacao VALUES (0, '4', '5', '5');
INSERT INTO avaliacao VALUES (0, '6', '1', '5');
INSERT INTO avaliacao VALUES (0, '6', '3', '5');
INSERT INTO avaliacao VALUES (0, '6', '4', '4');
INSERT INTO avaliacao VALUES (0, '6', '5', '5');

/*	CONSULTAS	*/

/*	Mostra o produto, a descrição do post o preço e a avalicao média	*/
SELECT pr.nome_prod as Produto, p.desc_post as Descrição, p.preco_post as Preço, CAST((sum(a.nota_ava) / count(a.nota_ava)) AS DECIMAL(4, 2)) as NotaMedia 
FROM avaliacao as a 
JOIN postagem as p ON p.cod_post = a.cod_post 
JOIN produto as pr ON pr.cod_prod = p.cod_prod 
GROUP BY a.cod_post;

/*	Mostra as postagens com estabelecimento o produto e o preço	*/
SELECT e.nome_est as Estabelecimento, pr.nome_prod as Produto, p.preco_post as Preço 
FROM postagem as p 
JOIN estabelecimento as e ON p.cod_est = e.cod_est 
JOIN produto as pr ON pr.cod_prod = p.cod_prod;

/*	Mostra produto e a categoria do post com o usuario que postou	*/
SELECT u.nome_usu as Usuario, pr.nome_prod as Produto, c.categoria_categ as Categoria 
FROM postagem as p 
JOIN usuario as u ON u.cod_usu = p.cod_usu 
JOIN produto as pr ON pr.cod_prod = p.cod_prod 
JOIN categoria as c ON c.cod_categ = pr.cod_categ 
GROUP BY p.cod_post;

/*	Mostra os usuarios que tiveram mais de uma postagem	*/
SELECT u.nome_usu as Usuario 
FROM usuario as u 
JOIN postagem as p ON p.cod_usu = u.cod_usu 
GROUP BY u.cod_usu, p.cod_usu HAVING count(*) > 1;

/*	Mostra todos os usuarios	*/
SELECT * FROM usuario;

/*	Mostra todos os produtos	*/
SELECT * FROM produto;













