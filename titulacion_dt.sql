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
insert into cursos values (2, "Tarjeta de CrÃ©dito","tarjetadecredito.png","Esto es una prueba de resumen");
insert into cursos values (3, "Cuenta de Ahorro","cuentadeahorro.png","Esto es una prueba de resumen");
insert into cursos values (4, "Cuenta de InversiÃ³n","cuentadeinversion.png","Esto es una prueba de resumen");
insert into cursos values (5, "Sistema de Ahorro para el Retiro","ahorroretiro.png","Esto es una prueba de resumen");
insert into cursos values (6, "Seguros","seguros.png","Esto es una prueba de resumen");
insert into cursos values (7, "CrÃ©dito Automotriz","creditoautomotriz.png","Esto es una prueba de resumen");

drop table inscripcion_cursos;
create table inscripcion_cursos
(
	idcurso int not null,
    idusuario int not null,

    promedio int, /*calificaciÃ³n promedio como resultado de las calificaciones en las actividades*/

    promedio int, /*calificación promedio como resultado de las calificaciones en las actividades*/

    puntuacion int,
    comentario varchar(280), /*cantidad mÃ¡xima en Twitter*/
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
insert into examenes_cursos values (null,2, "Examen: Tarjeta de CrÃ©dito");
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


insert into preguntas_cursos values (null,1,"La tarjeta de débito es una:","Operación financiera activa","Operación financiera pasiva","Operación financiera");
insert into preguntas_cursos values (null,1,"En este tipo de tarjeta se gasta dinero propio","Tarjeta de ahorro","Tarjeta de débito","Tarjeta de crédito");
insert into preguntas_cursos values (null,1,"¿Qué es el NIP?","Número de identificación personal","Número de identidad privda","Número de identificación pripia");
insert into preguntas_cursos values (null,1,"Generalmente, las instituciones lo descuentas de los fondos de la cuenta","Comisión","Costo anuel (anualidad)","Interés");
insert into preguntas_cursos values (null,1,"Algunas cuentas establecen un saldo promedio mínimo mensual y, de no mantenerlo, cobran una comisión por manejo de cuenta. Las cuentas de nómina no","Salfo a pagar","Saldo deudor","Saldo mínimo");
insert into preguntas_cursos values (null,1,"Se tiene la posibilidad de domiciliar pago de servicios (agua, gas, teléfono, televisión por cable) y realizar transferencias electrónicas.","Servicios asociados","Pago de servicios","Domiciliación de pagos");
insert into preguntas_cursos values (null,1,"Una cuenta sin movimientos por tres años pasa una","Cuenta de nómina","cuenta cogelada","Cuenta global concentradora");
insert into preguntas_cursos values (null,1,"¿Con cuánto tiempo de anticipación el banco tiene que notificarle al usuario que su tarjeta de débito va a pasar a ser una cuenta global concentradora?","45 días","90 días","30 días");
insert into preguntas_cursos values (null,1,"Si transcurrieran otros 3 años sin movimientos o si el cliente no reclama sus recursos, y estos no exceden 300 días de salario mínimo general vigente en la CDMX, el dinero sería entregado a:","El Banco","Beneficiencia pública","El titular de la tarjeta");
insert into preguntas_cursos values (null,1,"Las IF no podrán emitir publicidad engañosa, ya que lo que le ofrezcan deberán cumplir en términos difundidos por:","Banco de México","El gobierno","Condusef");


insert into preguntas_cursos values (null,3,"¿En cuanto tiempo perciben los seguros de Daños?","5 años","3 años","2 años");
insert into preguntas_cursos values (null,3,"¿Que tipo de seguro es necesario contratar un crédito automotríz?","Seguro de vida","Seguro de automóvil","Seguro diverso");
insert into preguntas_cursos values (null,3,"Es el pago que el asegurado debe dar a la aseguradora por el seguro","Prima","Deducible","indemnización");
insert into preguntas_cursos values (null,3,"Persona u objeto a la que se protege del riesgo","Asegurado","Aseguradora","Contratante");
insert into preguntas_cursos values (null,3,"Ramos de seguros de personas","Vida, accidentes y enfermedades, personales","Vida, salud, accidemtes,médico","Vida, salud, accidentes y enfermedades");
insert into preguntas_cursos values (null,3,"Tipos de seguros que puede cubrir los daños causados por una explosión","Seguro de riesgos catastróficos","Seguro de incendieos","Seguro contra fuego");
insert into preguntas_cursos values (null,3,"¿En cuento tiempo prescriben los seguros de vida?","5 años","3 años","2 años");
insert into preguntas_cursos values (null,3,"Seguro que protege el patrimonio o negocio de los asegurados contra distintos daños","Seguro para el patrimonio","Seguro de daños","Seguro de vivienda o negocios");
insert into preguntas_cursos values (null,3,"Cubre gastos médicos, hospitalarios y honorarios médicos","Seguro de enfermedades","Seguro de gastos médicos","Seguro de salud");
insert into preguntas_cursos values (null,3,"Documentos que formalizan el contrato de seguro","Póliza","Prima","Polizona");



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
alter table respuestas_examen add foreign key (idcurso) references cursos(idcurso);
alter table respuestas_examen add index(idrespuestas);
alter table respuestas_examen change idrespuestas idrespuestas int not null auto_increment;


select * from respuestas_examen

insert into respuestas_examen values (null,2,2,2,2,3,1,3,1,2,2,1,3);
insert into respuestas_examen values (null,1,1,2,1,1,2,3,3,3,3,2,1);
insert into respuestas_examen values (null,3,6,3,2,1,1,3,2,1,3,2,1);

create table contenido_curso
(
	idcontenido int not null,
    idcurso int not null,
    tema varchar(50),
    codigo text,
    primary key(idcontenido,idcurso)
);
drop table contenido_curso;
alter table contenido_curso add foreign key (idcurso) references cursos(idcurso);
alter table contenido_curso add index(idcontenido);
alter table contenido_curso change idcontenido idcontenido int not null auto_increment;
select tema, codigo, nombrecurso from contenido_curso join cursos on contenido_curso.idcurso = cursos.idcurso where cursos.idcurso=2;

insert into contenido_curso values (null,2,"¿Qué es y quién la otorga?",'<div class="col-md-12"><h3>¿Qué es?</h3>
                      </div>
                      <div class="col-md-12">
                        <div class="dato_empresa">
                          <div class="add-menu-restaurant">
                            <div class="menu-restaurant">
                              <div class="row">
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                  <p>Es un préstamo que te hace una Institución Financiera donde te otorga una línea de crédito que si no pagas por completo en tu fecha de pago no será barato.</p>
                                </div>
                                <div class="col-md-4 col-sm-5 col-xs-12">
									<img src="assets/images/cursos/2/CursoTC1.png" width="100%" height="50%">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
					  <div class="col-md-12">
                        <h3>¿Quíen las Otorga?</h3>
                      </div>
					  <div class="col-md-12">
                        <h4>Instituciones Financieras</h4>
                      </div>
                      <div class="col-md-12">
                        <div class="dato_empresa">
                          <div class="add-menu-restaurant">
                            <div class="menu-restaurant">
                              <div class="row">
							  <div class="col-md-4 col-sm-5 col-xs-12">
									<img src="assets/images/cursos/2/CursoTC2.png" width="100%" height="50%">
                                </div>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                  <p>Instituciones Financieras tales como:</p>
								  <div class="col-md-12">
									  <ul>
										<li>Bancos</li>
										<li>Sofom (Sociedades Financieras de Objeto Multiple)</li>
										<ul>
											<li>Sofom Inbursa</li>
											<li>Tarjetas Banamex</li>
											<li>Santander Consumos</li>
										</ul>
									  </ul>
									</div>
                                </div>

                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
					  <div class="col-md-12">
                        <h4>Instituciones Comerciales</h4>
                      </div>
                      <div class="col-md-12">
                        <div class="dato_empresa">
                          <div class="add-menu-restaurant">
                            <div class="menu-restaurant">
                              <div class="row">

                                <div class="col-md-4 col-sm-5 col-xs-12">
                                  <p>Instituciones Comerciales como:</p>
								  <div class="col-md-12">
									  <ul>
										<li>Tiendas Departamentales</li>
										<ul>
											<li>Liverpool</li>
											<li>Suburbia</li>
										</ul>
										<li>Tiendas Comerciales</li>
										<ul>
											<li>LaComer</li>
											<li>Fitnes</li>
										</ul>
									  </ul>
									</div>
                                </div>
								<div class="col-md-8 col-sm-7 col-xs-12">
									<img src="assets/images/cursos/2/CursoTC3.png" width="100%" height="50%">
                                </div>

                              </div>
                            </div>
                          </div>
                        </div>
                      </div>');
insert into contenido_curso values (null,2,"Características y Beneficios",'<div class="col-md-12">
                        <h3>Principales Características</h3>
                      </div>
                      <div class="col-md-12">
                        <div class="dato_empresa">
                          <div class="add-menu-restaurant">
                            <div class="menu-restaurant">
                              <div class="row">
                                <div class="col-md-8 col-sm-7 col-xs-12">
									<ul>
										<li>Es un medio de pago.</li>
										<li>Se garantiza con la firma de pagarés y vouchers.</li>
										<li>Es un crédito revolvente.</li>
										<li>Cada vez que realiza sus compras, el acreditado se obliga a reembolsar la cantidad estipulada en el voucher, más los intereses pactados.</li>
									</ul>
                                </div>
                                <div class="col-md-4 col-sm-5 col-xs-12">
									<img src="assets/images/cursos/2/CursoTC4.png" width="100%" height="50%">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
					  <div class="col-md-12">
                        <h3>Comisiones</h3>
                      </div>
					  <div class="col-md-12">
                        <h4>Anualidad</h4>
                      </div>
                      <div class="col-md-12">
                        <div class="dato_empresa">
                          <div class="add-menu-restaurant">
                            <div class="menu-restaurant">
                              <div class="row">
							  <div class="col-md-4 col-sm-5 col-xs-12">
									<img src="assets/images/cursos/2/CursoTC5.png" width="100%" height="50%">
                                </div>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                  <p>Algunas tarjetas  cobran una anualidad por su servicio. Es  es una comisión que cobran los bancos por tener acceso en cualquier momento a la línea de crédito y por la disponibilidad de los beneficios adicionales de este instrumento, como son los seguros, recompensas y demás.</p>

                                </div>

                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
					  <div class="col-md-12">
                        <h4>CAT (Comisión Anual Total)</h4>
                      </div>
                      <div class="col-md-12">
                        <div class="dato_empresa">
                          <div class="add-menu-restaurant">
                            <div class="menu-restaurant">
                              <div class="row">

                                <div class="col-md-4 col-sm-5 col-xs-12">
									<p>Es la tasa de interés que te cobrarán sumándole intereses e impuestos.</p>
                                  <p>Sirve para comparar distintas tarjetas de crédito.</p>

                                </div>
								<div class="col-md-8 col-sm-7 col-xs-12">
									<img src="assets/images/cursos/2/CursoTC6.png" width="100%" height="50%">
                                </div>

                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
					  <div class="col-md-12">
                        <h3>Beneficios</h3>
                      </div>
                      <div class="col-md-12">
                        <div class="dato_empresa">
                          <div class="add-menu-restaurant">
                            <div class="menu-restaurant">
                              <div class="row">
							  <div class="col-md-8 col-sm-7 col-xs-12">
									<img src="assets/images/cursos/2/CursoTC7.png" width="100%" height="50%">
                                </div>
                                <div class="col-md-4 col-sm-5 col-xs-12">
									<ul>
										<li>Promociones</li>
										<li>Regalos</li>
										<li>Viajes</li>
										<li>Puntos que se vuelven efectivo</li>
									</ul>
                                </div>

                              </div>
                            </div>
                          </div>
                        </div>
                      </div>');
insert into contenido_curso values (null,2,"Línea de Crédito",'<div class="col-md-12">
                        <div class="dato_empresa">
                          <div class="add-menu-restaurant">
                            <div class="menu-restaurant">
                              <div class="row">
                                <div class="col-md-4 col-sm-5 col-xs-12">
									<p>Es el dinero que te va a prestar el banco</p>
									<p>Normalmente depende de tu ingreso mensual comprobable</p>
                                </div>
                                <div class="col-md-8 col-sm-7 col-xs-12">
									<img src="assets/images/cursos/2/CursoTC8.png" width="100%" height="50%">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="dato_empresa">
                          <div class="add-menu-restaurant">
                            <div class="menu-restaurant">
                              <div class="row">
							  <div class="col-md-12">
									<center>
										<img src="assets/images/cursos/2/CursoTC9.png" width="100%" height="70%" >
									</center>
                                </div>
                                <div class="col-md-12">
                                  <p>Si tu línea de crédito es de $10,000 y ya has gastado $6000 sólo tienes disponible $4000 hasta que le pagues al banco lo que le debes.</p>

                                </div>

                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
					  <div class="col-md-12">
                        <h3>Fecha de Corte y Pagos</h3>
                      </div>
                      <div class="col-md-12">
                        <div class="dato_empresa">
                          <div class="add-menu-restaurant">
                            <div class="menu-restaurant">
                              <div class="row">

                                <div class="col-md-12">
									<p>La fecha de corte es el día en que se empiezan a hacer cuentas y de ahí para atrás hasta tu fecha de corte anterior es lo que debes pagar en total ese mes</p>
                                  <p>La fecha de pago es el último día que tienes para pagar antes de que te cobren intereses</p>

                                </div>
								<div class="col-md-12">
									<img src="assets/images/cursos/2/CursoTC10.png" width="100%" height="50%">
                                </div>

                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
					  <div class="col-md-12">
                        <h3>Tipos de Pagos</h3>
                      </div>
                      <div class="col-md-12">
                        <div class="dato_empresa">
                          <div class="add-menu-restaurant">
                            <div class="menu-restaurant">
                              <div class="row">
							  <div class="col-md-4 col-sm-5 col-xs-12">
									<p>Si pagas el total de tu deuda no te cobraran intereses</p>
                                </div>
                                <div class="col-md-4 col-sm-5 col-xs-12">
									<p>Si pagas menos del total</p>
                                </div>
								<div class="col-md-4 col-sm-5 col-xs-12">
									<p>Si pagas menos del mínimo o nada
</p>
                                </div>
                                <div class="col-md-12">
									<img src="assets/images/cursos/2/CursoTC11.png" width="100%" height="50%">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>');
insert into contenido_curso values (null,2,"Material Apoyo",'<iframe src="https://onedrive.live.com/embed?cid=85682E2576FD7F4D&amp;resid=85682E2576FD7F4D%21224&amp;authkey=AHb6VbdpbZ1Vk8c&amp;em=2&amp;wdAr=1.7777777777777777" width="1186px" height="691px" frameborder="0">Esto es un documento de <a target="_blank" href="https://office.com">Microsoft Office</a> incrustado con tecnología de <a target="_blank" href="https://office.com/webapps">Office Online</a>.</iframe>');

insert into respuestas_examen values (null,2,2,2,2,3,1,3,1,2,2,1,3);

insert into respuestas_examen values (null,2,2,2,2,3,1,3,1,2,2,1,3);

