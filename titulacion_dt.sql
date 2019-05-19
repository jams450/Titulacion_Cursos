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
drop table usuarios;

create table tipospago
(
	idtipopago int,
	tipopago varchar(20),
	primary key (idtipopago)
);
insert into tipospago values (1, "Efectivo");
insert into tipospago values (2, "Tarjeta de Debito");
insert into tipospago values (3, "Tarjeta de Credito");

drop table cursos;
create table cursos
(
	idcurso int not null,
    nombrecurso varchar(35) not null,
    imagen_curso varchar(50),
    resumen varchar(400),
    primary key (idcurso)
);
insert into cursos values (1, "Tarjeta de Debito","tarjetadedebito.png","Esto es una prueba de resumen");
insert into cursos values (2, "Tarjeta de Crédito","tarjetadecredito.png","Esto es una prueba de resumen");
insert into cursos values (3, "Cuenta de Ahorro","cuentadeahorro.png","Esto es una prueba de resumen");
insert into cursos values (4, "Cuenta de Inversión","cuentadeinversion.png","Esto es una prueba de resumen");
insert into cursos values (5, "Sistema de Ahorro para el Retiro","ahorroretiro.png","Esto es una prueba de resumen");
insert into cursos values (6, "Seguros","seguros.png","Esto es una prueba de resumen");
insert into cursos values (7, "Crédito Automotriz","creditoautomotriz.png","Esto es una prueba de resumen");

drop table inscripcion_cursos;
create table inscripcion_cursos
(
	idcurso int not null,
    idusuario int not null,
    promedio int, /*calificación promedio como resultado de las calificaciones en las actividades*/
    puntuacion int,
    comentario varchar(280), /*cantidad máxima en Twitter*/
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
drop table actividades_cursos;
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

drop table actividades_alumnos;
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
    idinfo int not null,
    encabezado varchar(60),
    descripcion_informacion varchar(500), /*html info*/
    imagen varchar(255),
    primary key(idcurso,idinfo)
);
alter table info_cursos add foreign key (idcurso) references cursos(idcurso);
alter table info_cursos add index(idinfo);
alter table info_cursos change idinfo idinfo int not null auto_increment;

/*TABLA PENDIENTE*/
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