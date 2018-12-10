CREATE DATABASE IF NOT EXISTS horadocafe CHARACTER SET utf8mb4;
USE horadocafe;

DROP TABLE IF EXISTS Pedido_Produto;
DROP TABLE IF EXISTS Pedido;
DROP TABLE IF EXISTS Feedback;
DROP TABLE IF EXISTS Usuario;
DROP TABLE IF EXISTS Produto;
DROP TABLE IF EXISTS Categoria;

CREATE TABLE IF NOT EXISTS Usuario (
	email VARCHAR(128),
	nome VARCHAR(128) NOT NULL,
	senha VARCHAR(256) NOT NULL,
    admin TINYINT(1) DEFAULT 0,
	PRIMARY KEY(email)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;

CREATE TABLE IF NOT EXISTS Categoria(
    id INT AUTO_INCREMENT,
    nome VARCHAR(64) NOT NULL,
    PRIMARY KEY(id)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;

CREATE TABLE IF NOT EXISTS Produto (
    id INT AUTO_INCREMENT,
    nome VARCHAR(128) NOT NULL,
    observacao VARCHAR(128) NOT NULL,
    descricao VARCHAR(512) NOT NULL,
    categoria INT NOT NULL,
    quantidade INT NOT NULL DEFAULT 0,
    preco DOUBLE NOT NULL,
    imagem VARCHAR(256) DEFAULT "padrao.png" NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(categoria) REFERENCES Categoria(id)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;

CREATE TABLE IF NOT EXISTS Pedido (
    id INT AUTO_INCREMENT,
    emailUsuario VARCHAR(128) NOT NULL,
    descricao VARCHAR(128),
    data DATETIME NOT NULL,
    preco DOUBLE NOT NULL,
    atendido TINYINT(1) DEFAULT 0 NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(emailUsuario) REFERENCES Usuario(email)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;

CREATE TABLE IF NOT EXISTS Pedido_Produto (
    idPedido INT NOT NULL,
    idProduto INT NOT NULL,
    quantidade INT,
    PRIMARY KEY(idPedido,idProduto),
    FOREIGN KEY(idPedido) REFERENCES Pedido(id),
    FOREIGN KEY(idProduto) REFERENCES Produto(id)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;

CREATE TABLE IF NOT EXISTS Feedback (
	idProduto INT NOT NULL,
	emailUsuario VARCHAR(128) NOT NULL,
    nota INT(5) NOT NULL,
    feedback VARCHAR(256),
	PRIMARY KEY(emailUsuario,idProduto),
	FOREIGN KEY(emailUsuario) REFERENCES Usuario(email),
	FOREIGN KEY(idProduto) REFERENCES Produto(id)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;

SET GLOBAL lc_time_names=pt_BR;
SET NAMES utf8mb4;

INSERT INTO Usuario(email,nome,senha,admin) VALUES ("admin@admin.com","admin","21232f297a57a5a743894a0e4a801fc3",1);

INSERT INTO Categoria(nome) VALUES ("Cantina");     
INSERT INTO Categoria(nome) VALUES ("Salgados");   
INSERT INTO Categoria(nome) VALUES ("Doces");       
INSERT INTO Categoria(nome) VALUES ("Bebidas");     
INSERT INTO Categoria(nome) VALUES ("Prato Feito"); 
INSERT INTO Categoria(nome) VALUES ("Lanches");     

INSERT INTO Produto(nome,observacao,categoria,descricao,preco) VALUES ("cantina", "cantina", 1, "cantina", 0);
INSERT INTO Produto(nome,observacao,categoria,descricao,preco,quantidade) VALUES ("Coxinha de Frango", "Eu observei aqui e é uma coxinha, de fato", 2, "Massa de batata recheado de frango e catupiry", 3.9, 10);
INSERT INTO Produto(nome,observacao,categoria,descricao,preco,quantidade) VALUES ("Esfirra de Carne", "Eu observei aqui e é uma esfirra, de fato", 2, "Massa com recheio de carne", 3.9, 14);
INSERT INTO Produto(nome,observacao,categoria,descricao,preco,quantidade) VALUES ("Enroladinho de Presunto e Mussarela", "Eu observei aqui e é uma enroladinho, de fato", 2, "Massa com recheio de presunto, mussarela e tomate", 3.9, 29);
INSERT INTO Produto(nome,observacao,categoria,descricao,preco,quantidade) VALUES ("Balas de Frutas", "Realmente, são balas", 3, "Pode/Deve ser usada para troco", .25, 256);
INSERT INTO Produto(nome,observacao,categoria,descricao,preco,quantidade) VALUES ("Brigadeiro", "Eu observei aqui e é uma brigadeiro, de fato", 3, "Não sei descrever um brigadeiro, mas é bom", 2.5, 8);
INSERT INTO Produto(nome,observacao,categoria,descricao,preco,quantidade) VALUES ("Coca-Cola Lata", "Eu observei aqui e é uma coca lata mesmo", 4, "Também serve pra desentupir pia", 5, 50);
INSERT INTO Produto(nome,observacao,categoria,descricao,preco,quantidade) VALUES ("Coca-Cola 2L", "Eu observei aqui e é uma Cocona 2 litros mesmo", 4, "Essa também serve pra fazer rato em conserva", 10, 26);
INSERT INTO Produto(nome,observacao,categoria,descricao,preco,quantidade) VALUES ("Feijoada", "Crime ocorre e ninguém faz nada, feijoada", 5, "Feijão preto, arroz, bacon, e gordura", 12.5, 0);
INSERT INTO Produto(nome,observacao,categoria,descricao,preco,quantidade) VALUES ("X-TUDO", "Olha, eu observei aqui e não tem tudo não", 6, "Pão, presunto, mussarela, tomate, alface, hambúrguer e pão.", 15, 0);