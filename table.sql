CREATE TABLE funcionario (
    id_funcionario SERIAL PRIMARY KEY,
    nome VARCHAR(100),
    endereco VARCHAR(255),
    email VARCHAR(100),
    celular VARCHAR(15),
    cpf VARCHAR(14),
    ra VARCHAR(10)
);

CREATE TABLE materiais (
  id_material SERIAL PRIMARY KEY,
  nome_material VARCHAR(50) NOT NULL,
  quantidade INT NOT NULL,
  data_entrada DATE NOT NULL,
  tipo_material VARCHAR(50) NOT NULL,
 codigosap INT NOT NULL
);
CREATE TABLE retiradas (
    id_retirada SERIAL PRIMARY KEY,
    id_material INT NOT NULL,
    data_retirada DATE NOT NULL,
    retirador VARCHAR(100) NOT NULL,
    quantidade INT NOT NULL,
	codigosapp INT,
    FOREIGN KEY (id_material) REFERENCES materiais(id_material)
);