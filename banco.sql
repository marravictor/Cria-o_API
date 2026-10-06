-- Criar o banco de dados
CREATE DATABASE manutencao;

-- Depois de criar o banco,
-- conecte-se ao banco "manutencao"
-- e execute o código abaixo.

CREATE TABLE chamados (
    id SERIAL PRIMARY KEY,
    equipamento VARCHAR(100) NOT NULL,
    setor VARCHAR(100) NOT NULL,
    descricao TEXT NOT NULL,
    prioridade VARCHAR(10) NOT NULL,
    status VARCHAR(20) NOT NULL
);

-- Verificar a tabela
SELECT * FROM chamados;