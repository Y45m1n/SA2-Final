CREATE TABLE funcionario (
    id_funcionario SERIAL PRIMARY KEY,
    nome VARCHAR(100),
    endereco VARCHAR(255),
    email VARCHAR(100),
    celular VARCHAR(15),
    cpf VARCHAR(14),
    ra VARCHAR(10)
);

CREATE TABLE estoque (
  id_material SERIAL PRIMARY KET
  nome_material VARCHAR(50) NOT NULL,
  quantidade INT(10) NOT NULL,
  categoria VARCHAR(50) NOT NULL,
  data_entrada DATE NOT NULL,
  tipo_movimentacao VARCHAR(50) NOT NULL,
  data_movimentacao DATE NOT NULL,
);