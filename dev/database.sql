CREATE DATABASE IF NOT EXISTS horadocha CHARACTER SET utf8mb4;
USE horadocha;

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
    descricao VARCHAR(512) NOT NULL,
    quantidade INT,
    imagem VARCHAR(256),
    PRIMARY KEY(id)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;

CREATE TABLE IF NOT EXISTS Pedido (
    id INT AUTO_INCREMENT,
    emailUsuario VARCHAR(128) NOT NULL,
    descricao VARCHAR(128),
    data DATETIME NOT NULL,
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
    resposta VARCHAR(256),
	PRIMARY KEY(emailUsuario,idProduto),
	FOREIGN KEY(emailUsuario) REFERENCES Usuario(email),
	FOREIGN KEY(idProduto) REFERENCES Produto(id)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;

SET GLOBAL lc_time_names=pt_BR;
SET NAMES utf8mb4;

INSERT INTO Usuario(email,nome,senha,admin) VALUES ("admin@admin.com",admin,admin,1);