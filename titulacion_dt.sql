create database titulacion;
use titulacion;
drop database titulacion;

create table usuarios
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
	primary key (idusuario)
);
alter table usuarios add foreign key (idtipopago) references tipospago(idtipopago);
select * from usuarios;

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
	idcurso int not null,
    nombrecurso varchar(35) not null,
    primary key (idcurso)
);
insert into cursos values (1, "Tarjeta de Debito");
insert into cursos values (2, "Tarjeta de Crédito");
insert into cursos values (3, "Cuenta de Ahorro");
insert into cursos values (4, "Cuenta de Inversión");
insert into cursos values (5, "Sistema de Ahorro para el Retiro");
insert into cursos values (6, "Seguros");
insert into cursos values (7, "Crédito Automotriz");

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
    ubicacion varchar(255) not null,
    primary key(idcurso,idactividad)
);
alter table actividades_curso add foreign key (idcurso) references cursos(idcurso);
alter table actividades_curso add index(idactividad);
alter table actividades_curso change idactividad idactividad int not null auto_increment;

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

create table info_cursos
(
	idcurso int not null,
    idinfo int not null auto_increment,
    encabezado varchar(30),
    descripcion_informacion varchar(500), /*html info*/
    imagen varchar(255),
    /*preguntas varchar(30),
    respuestas varchar(500),
    calificacion bit, /*0 - Correcta, 1 - Incorrecta
    total_respuestascorrectas int,*/
    primary key(idcurso)
);

create table examenes_cursos
(
	idcurso int not null,
    idexamen int not null,
    encabezado varchar(30),
    preguntas_examen varchar(200),
    respuestas_examen varchar(200),
    /*respuestas_examen varchar(50),
    calificacion bit, /*0 - Correcta, 1 - Incorrecta
    total_respuestascorrectas int,*/
    primary key (idcurso)
);