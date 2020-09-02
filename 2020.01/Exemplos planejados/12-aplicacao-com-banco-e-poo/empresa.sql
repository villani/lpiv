PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;
CREATE TABLE departamentos (
nome STRING
);
INSERT INTO departamentos VALUES('Almoxarifado');
INSERT INTO departamentos VALUES('Sala dos Professores');
INSERT INTO departamentos VALUES('Almoxarifado');
INSERT INTO departamentos VALUES('Sala dos Professores');
CREATE TABLE empregados (
nome STRING,
departamento_id INTEGER,
FOREIGN KEY(departamento_id) REFERENCES departamentos(rowid)
);
INSERT INTO empregados VALUES('Temer',1);
INSERT INTO empregados VALUES('Dilma',2);
INSERT INTO empregados VALUES('Temer',1);
INSERT INTO empregados VALUES('Dilma',1);
COMMIT;
