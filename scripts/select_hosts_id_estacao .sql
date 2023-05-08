SELECT
	ID,
	id_estacao,
	uf,
	cidade,
	alocacao,
	Contrato ,
	IP
FROM
	automacao_hosts ah 
WHERE
	id_estacao = 1
ORDER BY
	UF ASC,
	Cidade ASC,
	Alocacao ASC 
	LIMIT 149;
	
-- SELECT
-- 	ip,
-- 	COUNT(*) 
-- FROM
-- 	automacao_hosts 
-- WHERE
-- 	id_estacao = 5 
-- GROUP BY
-- 	ip 
-- HAVING
-- 	count(*) > 1
	
	
-- SELECT
-- 	ID,
-- 	id_estacao,
-- 	uf,
-- 	cidade,
-- 	alocacao,
-- 	Contrato 
-- 	FROM
-- 	automacao_hosts
-- WHERE
-- 	alocacao = '';
-- ORDER BY
-- 	UF ASC,
-- 	Cidade ASC,
-- 	Alocacao ASC 
-- 	LIMIT 149;







