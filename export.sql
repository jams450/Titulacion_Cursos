-- MySQL dump 10.13  Distrib 8.0.13, for Win64 (x86_64)
--
-- Host: localhost    Database: titulacion
-- ------------------------------------------------------
-- Server version	5.7.23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `actividades_alumnos`
--

DROP TABLE IF EXISTS `actividades_alumnos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `actividades_alumnos` (
  `idcurso` int(11) NOT NULL,
  `idactividad` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `ubicacion` varchar(255) DEFAULT NULL,
  `estatusactividad` bit(1) DEFAULT NULL,
  `estatusrevision` bit(1) DEFAULT NULL,
  `calificacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcurso`,`idactividad`,`idusuario`),
  KEY `idactividad` (`idactividad`),
  KEY `idusuario` (`idusuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actividades_alumnos`
--

LOCK TABLES `actividades_alumnos` WRITE;
/*!40000 ALTER TABLE `actividades_alumnos` DISABLE KEYS */;
/*!40000 ALTER TABLE `actividades_alumnos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `actividades_curso`
--

DROP TABLE IF EXISTS `actividades_curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `actividades_curso` (
  `idcurso` int(11) NOT NULL,
  `idactividad` int(11) NOT NULL AUTO_INCREMENT,
  `ubicacion` varchar(255) NOT NULL,
  PRIMARY KEY (`idcurso`,`idactividad`),
  KEY `idactividad` (`idactividad`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actividades_curso`
--

LOCK TABLES `actividades_curso` WRITE;
/*!40000 ALTER TABLE `actividades_curso` DISABLE KEYS */;
/*!40000 ALTER TABLE `actividades_curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contenido_curso`
--

DROP TABLE IF EXISTS `contenido_curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `contenido_curso` (
  `idcontenido` int(11) NOT NULL AUTO_INCREMENT,
  `idcurso` int(11) NOT NULL,
  `tema` varchar(50) DEFAULT NULL,
  `codigo` text,
  PRIMARY KEY (`idcontenido`,`idcurso`),
  KEY `idcurso` (`idcurso`),
  KEY `idcontenido` (`idcontenido`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contenido_curso`
--

LOCK TABLES `contenido_curso` WRITE;
/*!40000 ALTER TABLE `contenido_curso` DISABLE KEYS */;
INSERT INTO `contenido_curso` VALUES (1,2,'¿Qué es y quién la otorga?','<div class=\"col-md-12\"><h3>¿Qué es?</h3>\r\n                      </div>\r\n                      <div class=\"col-md-12\">\r\n                        <div class=\"dato_empresa\">\r\n                          <div class=\"add-menu-restaurant\">\r\n                            <div class=\"menu-restaurant\">\r\n                              <div class=\"row\">\r\n                                <div class=\"col-md-8 col-sm-7 col-xs-12\">\r\n                                  <p>Es un préstamo que te hace una Institución Financiera donde te otorga una línea de crédito que si no pagas por completo en tu fecha de pago no será barato.</p>\r\n                                </div>\r\n                                <div class=\"col-md-4 col-sm-5 col-xs-12\">\r\n									<img src=\"assets/images/cursos/2/CursoTC1.png\" width=\"100%\" height=\"50%\">\r\n                                </div>\r\n                              </div>\r\n                            </div>\r\n                          </div>\r\n                        </div>\r\n                      </div>\r\n					  <div class=\"col-md-12\">\r\n                        <h3>¿Quíen las Otorga?</h3>\r\n                      </div>\r\n					  <div class=\"col-md-12\">\r\n                        <h4>Instituciones Financieras</h4>\r\n                      </div>\r\n                      <div class=\"col-md-12\">\r\n                        <div class=\"dato_empresa\">\r\n                          <div class=\"add-menu-restaurant\">\r\n                            <div class=\"menu-restaurant\">\r\n                              <div class=\"row\">\r\n							  <div class=\"col-md-4 col-sm-5 col-xs-12\">\r\n									<img src=\"assets/images/cursos/2/CursoTC2.png\" width=\"100%\" height=\"50%\">\r\n                                </div>\r\n                                <div class=\"col-md-8 col-sm-7 col-xs-12\">\r\n                                  <p>Instituciones Financieras tales como:</p>\r\n								  <div class=\"col-md-12\">\r\n									  <ul>\r\n										<li>Bancos</li>\r\n										<li>Sofom (Sociedades Financieras de Objeto Multiple)</li>\r\n										<ul>\r\n											<li>Sofom Inbursa</li>\r\n											<li>Tarjetas Banamex</li>\r\n											<li>Santander Consumos</li>\r\n										</ul>\r\n									  </ul>\r\n									</div>\r\n                                </div>\r\n\r\n                              </div>\r\n                            </div>\r\n                          </div>\r\n                        </div>\r\n                      </div>\r\n					  <div class=\"col-md-12\">\r\n                        <h4>Instituciones Comerciales</h4>\r\n                      </div>\r\n                      <div class=\"col-md-12\">\r\n                        <div class=\"dato_empresa\">\r\n                          <div class=\"add-menu-restaurant\">\r\n                            <div class=\"menu-restaurant\">\r\n                              <div class=\"row\">\r\n\r\n                                <div class=\"col-md-4 col-sm-5 col-xs-12\">\r\n                                  <p>Instituciones Comerciales como:</p>\r\n								  <div class=\"col-md-12\">\r\n									  <ul>\r\n										<li>Tiendas Departamentales</li>\r\n										<ul>\r\n											<li>Liverpool</li>\r\n											<li>Suburbia</li>\r\n										</ul>\r\n										<li>Tiendas Comerciales</li>\r\n										<ul>\r\n											<li>LaComer</li>\r\n											<li>Fitnes</li>\r\n										</ul>\r\n									  </ul>\r\n									</div>\r\n                                </div>\r\n								<div class=\"col-md-8 col-sm-7 col-xs-12\">\r\n									<img src=\"assets/images/cursos/2/CursoTC3.png\" width=\"100%\" height=\"50%\">\r\n                                </div>\r\n\r\n                              </div>\r\n                            </div>\r\n                          </div>\r\n                        </div>\r\n                      </div>'),(2,2,'Características y Beneficios','<div class=\"col-md-12\">\r\n                        <h3>Principales Características</h3>\r\n                      </div>\r\n                      <div class=\"col-md-12\">\r\n                        <div class=\"dato_empresa\">\r\n                          <div class=\"add-menu-restaurant\">\r\n                            <div class=\"menu-restaurant\">\r\n                              <div class=\"row\">\r\n                                <div class=\"col-md-8 col-sm-7 col-xs-12\">\r\n									<ul>\r\n										<li>Es un medio de pago.</li>\r\n										<li>Se garantiza con la firma de pagarés y vouchers.</li>\r\n										<li>Es un crédito revolvente.</li>\r\n										<li>Cada vez que realiza sus compras, el acreditado se obliga a reembolsar la cantidad estipulada en el voucher, más los intereses pactados.</li>\r\n									</ul>\r\n                                </div>\r\n                                <div class=\"col-md-4 col-sm-5 col-xs-12\">\r\n									<img src=\"assets/images/cursos/2/CursoTC4.png\" width=\"100%\" height=\"50%\">\r\n                                </div>\r\n                              </div>\r\n                            </div>\r\n                          </div>\r\n                        </div>\r\n                      </div>\r\n					  <div class=\"col-md-12\">\r\n                        <h3>Comisiones</h3>\r\n                      </div>\r\n					  <div class=\"col-md-12\">\r\n                        <h4>Anualidad</h4>\r\n                      </div>\r\n                      <div class=\"col-md-12\">\r\n                        <div class=\"dato_empresa\">\r\n                          <div class=\"add-menu-restaurant\">\r\n                            <div class=\"menu-restaurant\">\r\n                              <div class=\"row\">\r\n							  <div class=\"col-md-4 col-sm-5 col-xs-12\">\r\n									<img src=\"assets/images/cursos/2/CursoTC5.png\" width=\"100%\" height=\"50%\">\r\n                                </div>\r\n                                <div class=\"col-md-8 col-sm-7 col-xs-12\">\r\n                                  <p>Algunas tarjetas  cobran una anualidad por su servicio. Es  es una comisión que cobran los bancos por tener acceso en cualquier momento a la línea de crédito y por la disponibilidad de los beneficios adicionales de este instrumento, como son los seguros, recompensas y demás.</p>\r\n\r\n                                </div>\r\n\r\n                              </div>\r\n                            </div>\r\n                          </div>\r\n                        </div>\r\n                      </div>\r\n					  <div class=\"col-md-12\">\r\n                        <h4>CAT (Comisión Anual Total)</h4>\r\n                      </div>\r\n                      <div class=\"col-md-12\">\r\n                        <div class=\"dato_empresa\">\r\n                          <div class=\"add-menu-restaurant\">\r\n                            <div class=\"menu-restaurant\">\r\n                              <div class=\"row\">\r\n\r\n                                <div class=\"col-md-4 col-sm-5 col-xs-12\">\r\n									<p>Es la tasa de interés que te cobrarán sumándole intereses e impuestos.</p>\r\n                                  <p>Sirve para comparar distintas tarjetas de crédito.</p>\r\n\r\n                                </div>\r\n								<div class=\"col-md-8 col-sm-7 col-xs-12\">\r\n									<img src=\"assets/images/cursos/2/CursoTC6.png\" width=\"100%\" height=\"50%\">\r\n                                </div>\r\n\r\n                              </div>\r\n                            </div>\r\n                          </div>\r\n                        </div>\r\n                      </div>\r\n					  <div class=\"col-md-12\">\r\n                        <h3>Beneficios</h3>\r\n                      </div>\r\n                      <div class=\"col-md-12\">\r\n                        <div class=\"dato_empresa\">\r\n                          <div class=\"add-menu-restaurant\">\r\n                            <div class=\"menu-restaurant\">\r\n                              <div class=\"row\">\r\n							  <div class=\"col-md-8 col-sm-7 col-xs-12\">\r\n									<img src=\"assets/images/cursos/2/CursoTC7.png\" width=\"100%\" height=\"50%\">\r\n                                </div>\r\n                                <div class=\"col-md-4 col-sm-5 col-xs-12\">\r\n									<ul>\r\n										<li>Promociones</li>\r\n										<li>Regalos</li>\r\n										<li>Viajes</li>\r\n										<li>Puntos que se vuelven efectivo</li>\r\n									</ul>\r\n                                </div>\r\n\r\n                              </div>\r\n                            </div>\r\n                          </div>\r\n                        </div>\r\n                      </div>'),(3,2,'Línea de Crédito','<div class=\"col-md-12\">\r\n                        <div class=\"dato_empresa\">\r\n                          <div class=\"add-menu-restaurant\">\r\n                            <div class=\"menu-restaurant\">\r\n                              <div class=\"row\">\r\n                                <div class=\"col-md-4 col-sm-5 col-xs-12\">\r\n									<p>Es el dinero que te va a prestar el banco</p>\r\n									<p>Normalmente depende de tu ingreso mensual comprobable</p>\r\n                                </div>\r\n                                <div class=\"col-md-8 col-sm-7 col-xs-12\">\r\n									<img src=\"assets/images/cursos/2/CursoTC8.png\" width=\"100%\" height=\"50%\">\r\n                                </div>\r\n                              </div>\r\n                            </div>\r\n                          </div>\r\n                        </div>\r\n                      </div>\r\n                      <div class=\"col-md-12\">\r\n                        <div class=\"dato_empresa\">\r\n                          <div class=\"add-menu-restaurant\">\r\n                            <div class=\"menu-restaurant\">\r\n                              <div class=\"row\">\r\n							  <div class=\"col-md-12\">\r\n									<center>\r\n										<img src=\"assets/images/cursos/2/CursoTC9.png\" width=\"100%\" height=\"70%\" >\r\n									</center>\r\n                                </div>\r\n                                <div class=\"col-md-12\">\r\n                                  <p>Si tu línea de crédito es de $10,000 y ya has gastado $6000 sólo tienes disponible $4000 hasta que le pagues al banco lo que le debes.</p>\r\n\r\n                                </div>\r\n\r\n                              </div>\r\n                            </div>\r\n                          </div>\r\n                        </div>\r\n                      </div>\r\n					  <div class=\"col-md-12\">\r\n                        <h3>Fecha de Corte y Pagos</h3>\r\n                      </div>\r\n                      <div class=\"col-md-12\">\r\n                        <div class=\"dato_empresa\">\r\n                          <div class=\"add-menu-restaurant\">\r\n                            <div class=\"menu-restaurant\">\r\n                              <div class=\"row\">\r\n\r\n                                <div class=\"col-md-12\">\r\n									<p>La fecha de corte es el día en que se empiezan a hacer cuentas y de ahí para atrás hasta tu fecha de corte anterior es lo que debes pagar en total ese mes</p>\r\n                                  <p>La fecha de pago es el último día que tienes para pagar antes de que te cobren intereses</p>\r\n\r\n                                </div>\r\n								<div class=\"col-md-12\">\r\n									<img src=\"assets/images/cursos/2/CursoTC10.png\" width=\"100%\" height=\"50%\">\r\n                                </div>\r\n\r\n                              </div>\r\n                            </div>\r\n                          </div>\r\n                        </div>\r\n                      </div>\r\n					  <div class=\"col-md-12\">\r\n                        <h3>Tipos de Pagos</h3>\r\n                      </div>\r\n                      <div class=\"col-md-12\">\r\n                        <div class=\"dato_empresa\">\r\n                          <div class=\"add-menu-restaurant\">\r\n                            <div class=\"menu-restaurant\">\r\n                              <div class=\"row\">\r\n							  <div class=\"col-md-4 col-sm-5 col-xs-12\">\r\n									<p>Si pagas el total de tu deuda no te cobraran intereses</p>\r\n                                </div>\r\n                                <div class=\"col-md-4 col-sm-5 col-xs-12\">\r\n									<p>Si pagas menos del total</p>\r\n                                </div>\r\n								<div class=\"col-md-4 col-sm-5 col-xs-12\">\r\n									<p>Si pagas menos del mínimo o nada\r\n</p>\r\n                                </div>\r\n                                <div class=\"col-md-12\">\r\n									<img src=\"assets/images/cursos/2/CursoTC11.png\" width=\"100%\" height=\"50%\">\r\n                                </div>\r\n                              </div>\r\n                            </div>\r\n                          </div>\r\n                        </div>\r\n                      </div>'),(4,2,'Material Apoyo','<iframe src=\"https://onedrive.live.com/embed?cid=85682E2576FD7F4D&amp;resid=85682E2576FD7F4D%21224&amp;authkey=AHb6VbdpbZ1Vk8c&amp;em=2&amp;wdAr=1.7777777777777777\" width=\"1186px\" height=\"691px\" frameborder=\"0\">Esto es un documento de <a target=\"_blank\" href=\"https://office.com\">Microsoft Office</a> incrustado con tecnología de <a target=\"_blank\" href=\"https://office.com/webapps\">Office Online</a>.</iframe>');
/*!40000 ALTER TABLE `contenido_curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cursos`
--

DROP TABLE IF EXISTS `cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `cursos` (
  `idcurso` int(11) NOT NULL,
  `nombrecurso` varchar(35) NOT NULL,
  `imagen_curso` varchar(50) DEFAULT NULL,
  `resumen` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`idcurso`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos`
--

LOCK TABLES `cursos` WRITE;
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
INSERT INTO `cursos` VALUES (1,'Tarjeta de Debito','tarjetadecredito.jpg','Esto es una prueba de resumen'),(2,'Tarjeta de Crédito','tarjetadedebito.png','Esto es una prueba de resumen'),(3,'Cuenta de Ahorro','cuentadeahorro.png','Esto es una prueba de resumen'),(4,'Cuenta de Inversión','cuentadeinversion.png','Esto es una prueba de resumen'),(5,'Sistema de Ahorro para el Retiro','ahorroretiro.png','Esto es una prueba de resumen'),(6,'Seguros','seguros.png','Esto es una prueba de resumen'),(7,'Crédito Automotriz','creditoautomotriz.png','Esto es una prueba de resumen');
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `examenes_cursos`
--

DROP TABLE IF EXISTS `examenes_cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `examenes_cursos` (
  `idexamen` int(11) NOT NULL AUTO_INCREMENT,
  `idcurso` int(11) NOT NULL,
  `encabezado` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idexamen`,`idcurso`),
  KEY `idcurso` (`idcurso`),
  KEY `idexamen` (`idexamen`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `examenes_cursos`
--

LOCK TABLES `examenes_cursos` WRITE;
/*!40000 ALTER TABLE `examenes_cursos` DISABLE KEYS */;
INSERT INTO `examenes_cursos` VALUES (1,1,'Examen: Tarjeta de Debito'),(2,2,'Examen: Tarjeta de Crédito'),(3,6,'Examen: Cuenta de Ahorro');
/*!40000 ALTER TABLE `examenes_cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `info_cursos`
--

DROP TABLE IF EXISTS `info_cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `info_cursos` (
  `idcurso` int(11) NOT NULL,
  `idinfo` int(11) NOT NULL AUTO_INCREMENT,
  `encabezado` varchar(30) DEFAULT NULL,
  `descripcion_informacion` varchar(500) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idcurso`,`idinfo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `info_cursos`
--

LOCK TABLES `info_cursos` WRITE;
/*!40000 ALTER TABLE `info_cursos` DISABLE KEYS */;
INSERT INTO `info_cursos` VALUES (1,1,'TEMA 1','JDIASJDFKLJFKDSJKFJDKSLJFKLDSJFKLSDJFKLSJDKFJSDKFJKSDFJK',NULL),(1,2,'TEMA 2','RJJKLWRKLWEJKRJKWLE',NULL),(1,3,'TEMA 3','FDSNCVNSDHNFJKJSDKJFKSD',NULL);
/*!40000 ALTER TABLE `info_cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inscripcion_cursos`
--

DROP TABLE IF EXISTS `inscripcion_cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `inscripcion_cursos` (
  `idcurso` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `promedio` int(11) DEFAULT '0',
  `puntuacion` int(11) DEFAULT NULL,
  `comentario` varchar(450) DEFAULT NULL,
  `curso` bit(1) DEFAULT b'0',
  `actividades` bit(1) DEFAULT b'0',
  PRIMARY KEY (`idcurso`,`idusuario`),
  KEY `idusuario` (`idusuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inscripcion_cursos`
--

LOCK TABLES `inscripcion_cursos` WRITE;
/*!40000 ALTER TABLE `inscripcion_cursos` DISABLE KEYS */;
INSERT INTO `inscripcion_cursos` VALUES (2,1,3,0,'Esta shidori este curso la netflix',_binary '',_binary '\0'),(2,2,0,NULL,NULL,_binary '\0',_binary '\0'),(1,1,0,NULL,NULL,_binary '\0',_binary '\0'),(3,1,0,NULL,NULL,_binary '\0',_binary '\0'),(4,1,0,NULL,NULL,_binary '\0',_binary '\0');
/*!40000 ALTER TABLE `inscripcion_cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preguntas_cursos`
--

DROP TABLE IF EXISTS `preguntas_cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `preguntas_cursos` (
  `idpregunta` int(11) NOT NULL AUTO_INCREMENT,
  `idexamen` int(11) NOT NULL,
  `pregunta` varchar(200) DEFAULT NULL,
  `respuesta1` varchar(50) DEFAULT NULL,
  `respuesta2` varchar(50) DEFAULT NULL,
  `respuesta3` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idpregunta`,`idexamen`),
  KEY `idexamen` (`idexamen`),
  KEY `idpregunta` (`idpregunta`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preguntas_cursos`
--

LOCK TABLES `preguntas_cursos` WRITE;
/*!40000 ALTER TABLE `preguntas_cursos` DISABLE KEYS */;
INSERT INTO `preguntas_cursos` VALUES (1,2,'¿Cuánto tiempo tienen las instituciones financieras para notificarle al usuario sobre alguna modificación a las comisiones o intereses a su contrato?','45 días','30 días','25 días'),(2,2,'Menciona una SOFOM ER autorizada para otorgar tarjetas de crédito','Sofom Santander','Tarjetas Banamex','Bancomer Consumos'),(3,2,'Es el precio que se paga por usar el dinero recibido en préstamo.','Prima','Crédito','Interés'),(4,2,'Toda cantidad que se paga distinta del interés; es el precio de un servicio.','Comisión','Indemnización','Garantia'),(5,2,'Es un préstamo que hay que pagar.','Tarjeta de débito','Tarjeta de Nómina','Tarjeta de Crédito'),(6,2,'OXXO, Seven Eleven, Soriana, Walmart son ejemplos de:','Establecimientos Comerciales','SOFOM ENR','Instituciones Financieras'),(7,2,'La persona titular de la tarjeta se conoce como:','Contratante','Titular','Tarjetahabiente'),(8,2,'Son algunos ejemplos de instituciones financieras.','Bancomer, Liverpool, Bancoppel','Banco Azteca, Inbursa, Banamex','Elektra, Bancoppel, Banjio'),(9,2,'Es un elemento de la tarjeta de crédito que se encuentra detrás del plástico.','Firma del titular','Nombre del titular','Número de la tarjeta'),(10,2,'Los intereses y comisiones deben de estar pactados en:','La tarjeta','El estado de cuenta','El contrato');
/*!40000 ALTER TABLE `preguntas_cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respuestas_examen`
--

DROP TABLE IF EXISTS `respuestas_examen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `respuestas_examen` (
  `idrespuestas` int(11) NOT NULL AUTO_INCREMENT,
  `idexamen` int(11) NOT NULL,
  `idcurso` int(11) NOT NULL,
  `correcta1` int(11) DEFAULT NULL,
  `correcta2` int(11) DEFAULT NULL,
  `correcta3` int(11) DEFAULT NULL,
  `correcta4` int(11) DEFAULT NULL,
  `correcta5` int(11) DEFAULT NULL,
  `correcta6` int(11) DEFAULT NULL,
  `correcta7` int(11) DEFAULT NULL,
  `correcta8` int(11) DEFAULT NULL,
  `correcta9` int(11) DEFAULT NULL,
  `correcta10` int(11) DEFAULT NULL,
  PRIMARY KEY (`idrespuestas`,`idexamen`,`idcurso`),
  KEY `idexamen` (`idexamen`),
  KEY `idrespuestas` (`idrespuestas`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respuestas_examen`
--

LOCK TABLES `respuestas_examen` WRITE;
/*!40000 ALTER TABLE `respuestas_examen` DISABLE KEYS */;
INSERT INTO `respuestas_examen` VALUES (1,2,2,2,2,3,1,3,1,2,2,1,3),(2,2,2,2,2,3,1,3,1,2,2,1,3),(3,1,1,2,1,1,2,3,3,3,3,2,1),(4,3,6,3,2,1,1,3,2,1,3,2,1);
/*!40000 ALTER TABLE `respuestas_examen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipospago`
--

DROP TABLE IF EXISTS `tipospago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tipospago` (
  `idtipopago` int(11) NOT NULL,
  `tipopago` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idtipopago`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipospago`
--

LOCK TABLES `tipospago` WRITE;
/*!40000 ALTER TABLE `tipospago` DISABLE KEYS */;
INSERT INTO `tipospago` VALUES (1,'Efectivo'),(2,'Tarjeta de Debito'),(3,'Tarjeta de Credito');
/*!40000 ALTER TABLE `tipospago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `appat` varchar(45) NOT NULL,
  `apmat` varchar(45) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `sexo` bit(1) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `passwd` varchar(16) NOT NULL,
  `idtipopago` int(11) NOT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `idtipopago` (`idtipopago`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Andres','Mitzi','Santiago',21,_binary '','jams45072@gmail.com','jams450','jams45072',3),(2,'PRUEBA','Mitzi','Santiago',21,_binary '','jams450@gmail.com','jams','jams45072',2);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-20 23:38:50
