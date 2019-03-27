create table pratos (
	idpratos int not null unique auto_increment,
    nome varchar(200) not null,
    peso decimal not null,
    preco float not null,
    descricao varchar(500) not null,
    caminho varchar (200) not null unique,
    primary key (idpratos)
)
default charset = utf8;