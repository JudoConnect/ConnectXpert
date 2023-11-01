SELECT ta.id_turma_aluno, t.id_turma, t.nome_turma, t.horario, t.dia_semana,
	(SELECT count(sub.id_encontro) FROM encontro sub WHERE sub.id_turma = t.id_turma) AS total_encontros,
    (SELECT count(sub.id_frequencia) FROM frequencia sub WHERE sub.id_turma_aluno = ta.id_turma_aluno) AS total_faltas
FROM turma_aluno ta
JOIN turma t ON (t.id_turma = ta.id_turma) 
WHERE ta.id_aluno = 21 /*id do aluno logado */

/* implementar no método getFrequencia() */
frequencia = 100 - ((total_faltas / total_encontros) * 100)