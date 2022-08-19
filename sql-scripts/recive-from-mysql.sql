DROP TABLE IF EXISTS jsonsainda;

CREATE TABLE IF NOT EXISTS jsonsainda as
SELECT 
  JSON_PRETTY(
    JSON_OBJECT(
      'pessoas', JSON_ARRAYAGG(
        JSON_OBJECT(
          'nome', pessoa,
          'filhos', filhos 
        )
      )
    )
  ) AS vjson
FROM (
  SELECT 
    p.id AS pessoa_id,
    p.nome AS pessoa,
    JSON_ARRAYAGG(
		IFNULL(f.nome, '') 
    )  AS filhos 
	FROM pessoa p JOIN filho f ON p.id = f.pessoa_id
  
	GROUP BY p.id
	UNION
	SELECT 
    p.id,
    p.nome,
    JSON_ARRAY()
  FROM pessoa p LEFT OUTER JOIN filho f ON p.id = f.pessoa_id
  WHERE f.pessoa_id IS NULL 
) AS f;