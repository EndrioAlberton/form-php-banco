CREATE DATABASE IF NOT EXISTS `trabalho2e`;  
USE `trabalho2e`;

CREATE TABLE `usuarios` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `usuario` VARCHAR(150) NOT NULL,
    `senha` VARCHAR(32) NOT NULL,
    PRIMARY KEY (`id`)) ENGINE = INNODB;

 
CREATE TABLE `formulario` ( 
	`id` INT PRIMARY KEY AUTO_INCREMENT, 
	`nome` varchar(150) NOT NULL, 
	`email` varchar(100) NOT NULL, 
        `idade` int NOT NULL, 
	`regiao` varchar(15) NOT NULL,`plataforma` varchar(50) DEFAULT 'none',  
        `rota` varchar(40) DEFAULT 'none',  
	`comentario` varchar(200) NOT NULL 
);
    