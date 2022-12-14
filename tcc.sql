select * from usuarios;

create database tcc;
use tcc;

create table usuarios (
	cod_usuario int not null auto_increment,
	nome varchar(70),
	email varchar(50) UNIQUE,
	senha varchar (50),
	descricao_perfil varchar (200),
	foto_perfil blob, 
	conquistas int,
	primary key (cod_usuario)
);
alter table usuarios add column is_admin boolean default false;

create table conteudo (
	cod_conteudo int NOT NULL auto_increment,
    enunciado varchar(200) NOT NULL,
    midia varchar(50),
    primary key (cod_conteudo),
    cod_questao int,
    foreign key (cod_questao) references questao (cod_questao)
    );

CREATE TABLE questao (
    cod_questao int NOT NULL auto_increment,
    enunciado varchar(200) NOT NULL,
    midia varchar(50),
	alt1 varchar(100) NOT NULL,
	alt2 varchar(100) NOT NULL,
    alt3 varchar(100) NOT NULL,
    alt4 varchar(100) NOT NULL,
    alt5 varchar(100) NOT NULL,
    alt_correta int NOT NULL,
    PRIMARY KEY (cod_questao)
);

CREATE TABLE perguntas (
    cod_pergunta int not null auto_increment,
    texto_pergunta varchar(200) not null,
    primary key (cod_pergunta)
);
CREATE TABLE respostas (
    cod_resposta int not null auto_increment,
    texto_resposta varchar(200) not null,
    cod_pergunta int not null,
    primary key (cod_resposta),
    foreign key (cod_pergunta) references perguntas(cod_pergunta)
);

CREATE TABLE realiza (
	cod_realiza int primary key not null auto_increment,
	data_questao datetime,
    resultado int,
    cod_questao int,
    cod_usuario int,
    FOREIGN KEY (cod_questao) REFERENCES questao (cod_questao),
    FOREIGN KEY (cod_usuario) REFERENCES usuarios (cod_usuario)
);
