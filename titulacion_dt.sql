create database titulacion;
use titulacion;

create database usuarios
(
	idusuario int auto_increment,
	nombre varchar(45) not null,
	appat varchar(45) not null,
	apmat varchar(45),
	edad int,
	sexo bit,  /*0-Femenino, 1-Masculino*/
	correo varchar(50),
	username varchar(30) not null,
	passwd varchar(16) not null,
	idtipopago int not null,
	primary key (iduser)
);
alter table usuarios add foreign key (idtipopago) references tipospago(idtipopago);
alter table usuarios add foreign key (idcurso) references cursos(idcurso);

create table tipospago
(
	idtipopago int,
	tipopago varchar(20),
	primary key (idtipopago)
);
insert into tipospago values (1, "Efectivo");
insert into tipospago values (2, "Tarjeta de Debito");
insert into tipospago values (3, "Tarjeta de Credito");

create table cursos
(
	idcurso int auto_increment,
    nombrecurso varchar(35) not null,
    primary key (idcurso)
);
insert into cursos values (null, "Tarjeta de Debito");
insert into cursos values (null, "Tarjeta de Crédito");
insert into cursos values (null, "Cuenta de Ahorro");
insert into cursos values (null, "Cuenta de Inversión");
insert into cursos values (null, "Sistema de Ahorro para el Retiro");
insert into cursos values (null, "Seguros");
insert into cursos values (null, "Crédito Automotriz");

create table inscripcion_cursos
(
	idcurso int not null,
    idusuario int not null,
    promedio int not null, /*calificación promedio como resultado de las calificaciones en las actividades*/
    primary key(idcurso,idusuario)
);
alter table inscripcion_cursos add foreign key (idcurso) references cursos(idcurso);
alter table inscripcion_cursos add foreign key (idusuario) references usuarios(idusuario);

/*create table calificaciones
(
	idcurso int not null,
    idusuario int not null,
    calificacion int not null,
    primary key(idcurso,idusuario)
);
alter table calificaciones add foreign key (idcurso) references cursos(idcurso);
alter table calificaciones add foreign key (idusuario) references usuarios(idusuario);*/

create table actividades_curso
(
	idcurso int not null,
    idactividad int not null,
    ubicacion varchar(200) not null,
    primary key(idcurso,idactividad)
);
alter table actividades_curso add foreign key (idcurso) references cursos(idcurso);

create table actividades_alumnos
(
	idcurso int not null,
    idactividad int not null, 
    idusuario int not null,
    ubicacion varchar(255),
    estatusactividad bit, /*0 - Por concluir, 1 - Concluida*/
    estatusrevision bit, /*0 - En proceso, 1 - Revisado*/
    calificacion int,
    primary key(idcurso,idactividad,idusuario)
);
alter table actividades_alumnos add foreign key (idcurso) references cursos(idcurso);
alter table actividades_alumnos add foreign key (idactividad) references actividades_curso(idactividad);
alter table actividades_alumnos add foreign key (idusuario) references usuarios(idusuario);