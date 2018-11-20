CREATE DATABASE IF NOT EXISTS horadocha CHARACTER SET utf8mb4;
USE horadocha;

DROP TABLE IF EXISTS Pedido;
DROP TABLE IF EXISTS Feedback;
DROP TABLE IF EXISTS Usuario;
DROP TABLE IF EXISTS Produto;

CREATE TABLE IF NOT EXISTS Usuario (
	email VARCHAR(128),
	username VARCHAR(64) NOT NULL,
	senha VARCHAR(64) NOT NULL,
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
    idProduto INT NOT NULL,
    quantidade INT NOT NULL,
    data DATETIME NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(emailUsuario) REFERENCES Usuario(email),
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