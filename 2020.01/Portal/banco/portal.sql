-- HABILITANDO RESTRIÇÃO DE CHAVE ESTRANGEIRA
PRAGMA foreign_keys=ON;

-- INICIANDO TRANSAÇÃO
BEGIN TRANSACTION;

-- CRIANDO A TABELA usuarios
CREATE TABLE usuarios (
    id INTEGER PRIMARY KEY,
    nome TEXT,
    email TEXT UNIQUE,
    senha TEXT,
    nivel INTEGER
);

-- INSERINDO OS REGISTROS NA TABELA usuarios
INSERT INTO usuarios VALUES(0,'Admin','admin@admin','123',0);
INSERT INTO usuarios(nome, email, senha, nivel) VALUES('Jair','bolsonaro@bol.com.br','123',1);
-- - Quando a chave primária é omitida ao inserir um registro, o SQLite atribui o próximo inteiro disponível.

-- CRIANDO A TABELA categorias
CREATE TABLE categorias (
    id INTEGER PRIMARY KEY,
    usuario_id INTEGER,
    nome TEXT UNIQUE,
    FOREIGN KEY(usuario_id) REFERENCES usuarios(id) ON DELETE RESTRICT
);
INSERT INTO categorias VALUES(1,0,'Saúde');
INSERT INTO categorias VALUES(2,1,'Economia');

-- CRIANDO A TABELA noticias
CREATE TABLE noticias (
    id INTEGER PRIMARY KEY,
    usuario_id INTEGER,
    categoria_id INTEGER,
    titulo TEXT,
    resumo TEXT,
    figura TEXT,
    fonte TEXT,
    conteudo TEXT,
    data_hora NUMERIC,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE RESTRICT,
    FOREIGN KEY (categoria_id) REFERENCES categorias(id) ON DELETE RESTRICT
);
INSERT INTO noticias VALUES(1,0,2,'Curva de mortes de Covid-19 no Brasil está mais rápida que a da Espanha, dizem universidades','Observatório Covid-19 BR reúne especialistas de 7 instituições e mede ''velocidade'' da doença no país; tempo que o vírus leva para dobrar o nº de óbitos é uma das formas de fazer o cálculo. Sem medidas de isolamento, cidades brasileiras correm risco de repetir situação de Europa e EUA.','imagens/uploaded/velocidade-2204-5-.jpeg','Arte/G1',replace(replace('<p style="margin-bottom: 0cm; line-height: 100%">O número de mortes\r\npelo coronavírus no Brasil está aumentando a um ritmo mais\r\nacelerado do que o registrado na Espanha quando o país europeu\r\nestava na mesma fase da pandemia, duas semanas atrás.</p>\r\n<p style="margin-bottom: 0cm; line-height: 100%"><br/>\r\n\r\n</p>\r\n<p style="margin-bottom: 0cm; line-height: 100%">Com base nos dados\r\ndo Ministério da Saúde, o Observatório Covid-19 BR, que reúne\r\nespecialistas de sete universidades (veja lista ao fim desta\r\nreportagem), mede a velocidade da doença no Brasil e a compara com a\r\nde outros países.</p>\r\n<p style="margin-bottom: 0cm; line-height: 100%"><br/>\r\n\r\n</p>\r\n<p style="margin-bottom: 0cm; line-height: 100%">Uma das ferramentas\r\npara fazer essa análise prevê o seguinte cálculo: quanto tempo o\r\ncoronavírus leva para dobrar o número de óbitos. Até a manhã\r\ndesta quinta-feira (23), mais de 2,9 mil pessoas haviam morrido de\r\nCovid-19 no Brasil. Na Espanha, o número passa de 22 mil.</p>\r\n<p style="margin-bottom: 0cm; line-height: 100%"><br/>\r\n\r\n</p>\r\n<p style="margin-bottom: 0cm; line-height: 100%">Segundo o\r\nobservatório:</p>\r\n<p style="margin-bottom: 0cm; line-height: 100%"><br/>\r\n\r\n</p>\r\n<p style="margin-bottom: 0cm; line-height: 100%">nesta terça-feira\r\n(21), o tempo de duplicação do número de mortos por Covid-19 no\r\nBrasil era de 9 dias e 14 horas;</p>\r\n<p style="margin-bottom: 0cm; line-height: 100%">na Espanha, esse\r\nnúmero estava em 12 dias e 7 horas há duas semanas (8 de abril);</p>\r\n<p style="margin-bottom: 0cm; line-height: 100%">quanto mais baixo é\r\nesse intervalo, mais letal é a pandemia no país naquele momento;</p>\r\n<p style="margin-bottom: 0cm; line-height: 100%">isso significa que,\r\npor esse critério, o cenário no Brasil é pior que o da Espanha se\r\ncomparados períodos correspondentes do avanço do coronavírus.</p>\r\n<p style="margin-bottom: 0cm; line-height: 100%">A comparação tem\r\nde ser feita a partir de datas diferentes porque a pandemia na Europa\r\ncomeçou a matar antes.</p>\r\n<p style="margin-bottom: 0cm; line-height: 100%"><br/>\r\n\r\n</p>\r\n<p style="margin-bottom: 0cm; line-height: 100%">Vítor Sudbrack,\r\nintegrante do observatório e físico da Universidade Estadual de São\r\nPaulo (Unesp), explica ao G1 que os cálculos em cada país começam\r\ncinco dias depois da décima morte.</p>\r\n<p style="margin-bottom: 0cm; line-height: 100%"><br/>\r\n\r\n</p>\r\n<p style="margin-bottom: 0cm; line-height: 100%">De acordo com o\r\nestudo:</p>\r\n<p style="margin-bottom: 0cm; line-height: 100%"><br/>\r\n\r\n</p>\r\n<p style="margin-bottom: 0cm; line-height: 100%">o Brasil estava,\r\nnesta terça, no 28º dia da série.</p>\r\n<p style="margin-bottom: 0cm; line-height: 100%">e a Espanha estava\r\nno 40º dia – lá, o 28º dia foi 8 de abril.</p>','\r',char(13)),'\n',char(10)),1587664409);

-- CRIANDO A TABELA avaliacoes
CREATE TABLE avaliacoes (
    id INTEGER PRIMARY KEY,
    usuario_id INTEGER,
    noticia_id INTEGER,
    relevante INTEGER,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE,
    FOREIGN KEY (noticia_id) REFERENCES noticias(id) ON DELETE CASCADE
);
INSERT INTO avaliacoes VALUES(1,1,1,1);

-- CRIANDO A TABELA comentarios
CREATE TABLE comentarios (
    id INTEGER PRIMARY KEY,
    usuario_id INTEGER,
    noticia_id INTEGER,
    comentario TEXT,
    data_hora NUMERIC,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE,
    FOREIGN KEY (noticia_id) REFERENCES noticias(id) ON DELETE CASCADE
);
INSERT INTO comentarios VALUES(1,1,1,'Não concordo.',1587664322);

-- SALVANDO A TRANSAÇÃO
COMMIT;
