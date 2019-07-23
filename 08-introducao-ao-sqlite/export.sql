PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;
CREATE TABLE candidatos (
nome TEXT,
partido TEXT
);
INSERT INTO candidatos VALUES('Bolsonaro','PSL');
INSERT INTO candidatos VALUES('Temer','MDB');
COMMIT;
