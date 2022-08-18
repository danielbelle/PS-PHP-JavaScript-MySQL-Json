CREATE DATABASE IF NOT EXISTS `teste_rte`;
USE `teste_rte`;
DROP TABLE IF EXISTS `pessoa`;
DROP TABLE IF EXISTS `filho`;

CREATE TABLE `pessoa`( 
SELECT id, nome
FROM `textareajson`, 
     JSON_TABLE(pessoas, '$.pessoas[*]' COLUMNS (
				id FOR ORDINALITY,
                nome VARCHAR(40)  PATH '$.nome'
                )
     ) AS pessoa);

CREATE TABLE `filho`( 
`id` INT unsigned not null auto_increment primary key,
`pessoa_id` INT, 
`nome` VARCHAR(40)
);

INSERT INTO `filho`(
SELECT 	null,pessoa_id, nome
FROM `textareajson`, 
     JSON_TABLE(pessoas, '$.pessoas[*]' COLUMNS (
				pessoa_id FOR ORDINALITY,
                NESTED PATH '$.filhos[*]' COLUMNS(
                    nome VARCHAR(40) PATH '$' 
					)
                )
     ) AS pessoa);
    

DROP TEMPORARY TABLE `textareajson`;