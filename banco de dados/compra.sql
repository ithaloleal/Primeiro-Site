create table compras (
idcompra int not null unique auto_increment,
idpra int,
idcada int,
quantidade int not null,
total float not null,
foreign key (idpra) references pratos(idpratos),
foreign key (idcada) references cadastro (idcadastro),
primary key (idcompra)
)default charset = utf8;