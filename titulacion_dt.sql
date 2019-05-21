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
insert into usuarios values(null,"Mayte Viridiana","Zayas","Aguilar",21,0,"gorbi97@hotmail.com","mzayasa","1234",1);
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
insert into inscripcion_cursos values(1,1,0,0,"Prueba");
insert into inscripcion_cursos values(2,1,0,0,"Prueba");
select inscripcion_cursos.idusuario, cursos.nombrecurso, cursos.imagen_curso FROM cursos right join inscripcion_cursos on inscripcion_cursos.idcurso = cursos.idcurso group by cursos.idcurso
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
	idexamen int not null,
    idcurso int not null,
    encabezado varchar(30),
    primary key(idexamen,idcurso)
);
alter table examenes_cursos add foreign key (idcurso) references cursos(idcurso);
alter table examenes_cursos add index(idexamen);
alter table examenes_cursos change idexamen idexamen int not null auto_increment;

insert into examenes_cursos values (null,1, "Examen: Tarjeta de Debito");
insert into examenes_cursos values (null,2, "Examen: Tarjeta de Crédito");
insert into examenes_cursos values (null,6, "Examen: Cuenta de Ahorro");

select * from examenes_cursos where idcurso = 2;

create table preguntas_cursos
(
	idpregunta int not null,
    idexamen int not null,
    pregunta varchar(200),
    respuesta1 varchar(50),
    respuesta2 varchar(50),
    respuesta3 varchar(50),
    primary key (idpregunta,idexamen)
);
drop table preguntas_cursos;
alter table preguntas_cursos add foreign key (idexamen) references examenes_cursos(idexamen);
alter table preguntas_cursos add index(idpregunta);
alter table preguntas_cursos change idpregunta idpregunta int not null auto_increment;

insert into preguntas_cursos values (null,2,"¿Cuánto tiempo tienen las instituciones financieras para notificarle al usuario sobre alguna modificación a las comisiones o intereses a su contrato?","45 días","30 días","25 días");
insert into preguntas_cursos values (null,2,"Menciona una SOFOM ER autorizada para otorgar tarjetas de crédito","Sofom Santander","Tarjetas Banamex","Bancomer Consumos");
insert into preguntas_cursos values (null,2,"Es el precio que se paga por usar el dinero recibido en préstamo.","Prima","Crédito","Interés");
insert into preguntas_cursos values (null,2,"Toda cantidad que se paga distinta del interés; es el precio de un servicio.","Comisión","Indemnización","Garantia");
insert into preguntas_cursos values (null,2,"Es un préstamo que hay que pagar.","Tarjeta de débito","Tarjeta de Nómina","Tarjeta de Crédito");
insert into preguntas_cursos values (null,2,"OXXO, Seven Eleven, Soriana, Walmart son ejemplos de:","Establecimientos Comerciales","SOFOM ENR","Instituciones Financieras");
insert into preguntas_cursos values (null,2,"La persona titular de la tarjeta se conoce como:", "Contratante","Titular","Tarjetahabiente");
insert into preguntas_cursos values (null,2,"Son algunos ejemplos de instituciones financieras.","Bancomer, Liverpool, Bancoppel","Banco Azteca, Inbursa, Banamex","Elektra, Bancoppel, Banjio");
insert into preguntas_cursos values (null,2,"Es un elemento de la tarjeta de crédito que se encuentra detrás del plástico.","Firma del titular","Nombre del titular","Número de la tarjeta");
insert into preguntas_cursos values (null,2,"Los intereses y comisiones deben de estar pactados en:","La tarjeta","El estado de cuenta","El contrato");

select preguntas_cursos.pregunta, preguntas_cursos.respuesta1, preguntas_cursos.respuesta2, preguntas_cursos.respuesta3 from preguntas_cursos join examenes_cursos on preguntas_cursos.idexamen = examenes_cursos.idexamen WHERE examenes_cursos.idcurso=2;

create table respuestas_examen
(
	idrespuestas int not null,
    idexamen int not null,
    idcurso int not null,
    correcta1 int,
    correcta2 int,
    correcta3 int,
    correcta4 int,
    correcta5 int,
    correcta6 int,
    correcta7 int,
    correcta8 int,
    correcta9 int,
    correcta10 int,
    primary key (idrespuestas,idexamen,idcurso)
);

/*drop table respuestas_examen;*/
alter table respuestas_examen add foreign key (idexamen) references examenes_cursos(idexamen);
alter table respuestas_examen add index(idrespuestas);
alter table respuestas_examen change idrespuestas idrespuestas int not null auto_increment;

insert into respuestas_examen values (null,2,2,2,2,3,1,3,1,2,2,1,3);