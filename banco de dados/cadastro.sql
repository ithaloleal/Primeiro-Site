create table cadastro (
idcadastro int auto_increment not null unique,
email varchar(200) not null unique,
nome varchar(200) not null,
nascimento date not null,
cpf varchar(11) not null unique,
rua varchar(100) not null,
numero int not null,
cidade varchar(100) not null,
estado varchar(50) not null,
pais varchar(100) not null,
cep varchar(8) not null,
rg varchar(20) not null unique,
sexo enum('m','f') not null,
celular varchar(40) not null unique,
senha varchar(100) not null,
tipo enum('u','a','c') not null default 'u',
primary key (idcadastro)
)default charset = utf8;