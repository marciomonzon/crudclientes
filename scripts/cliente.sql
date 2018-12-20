CREATE TABLE `cliente` (
  `ClienteId` int(11) NOT NULL AUTO_INCREMENT,
  `CpfCnpj` varchar(14) DEFAULT NULL,
  `Tipo` varchar(10) DEFAULT NULL,
  `Nome` varchar(45) DEFAULT NULL,
  `Sexo` char(1) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Telefone` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ClienteId`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4