CREATE DATABASE IF NOT EXISTS horadocafe CHARACTER SET utf8mb4;
USE horadocafe;

DROP TABLE IF EXISTS Pedido_Produto;
DROP TABLE IF EXISTS Pedido;
DROP TABLE IF EXISTS Feedback;
DROP TABLE IF EXISTS Usuario;
DROP TABLE IF EXISTS Produto;

CREATE TABLE IF NOT EXISTS Usuario (
	email VARCHAR(128),
	nome VARCHAR(128) NOT NULL,
	senha VARCHAR(256) NOT NULL,
    admin TINYINT(1) DEFAULT 0,
	PRIMARY KEY(email)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;

CREATE TABLE IF NOT EXISTS Produto (
    id INT AUTO_INCREMENT,
    nome VARCHAR(128) NOT NULL,
    observacao VARCHAR(128) NOT NULL,
    descricao VARCHAR(512) NOT NULL,
    categoria VARCHAR(128) NOT NULL,
    quantidade INT NOT NULL DEFAULT 0,
    preco DOUBLE NOT NULL,
    imagem VARCHAR(256) DEFAULT "padrao.png" NOT NULL,
    PRIMARY KEY(id)
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
INSERT INTO Produto(nome,observacao,descricao,preco) VALUES ("cantina","cantina","cantina",0);