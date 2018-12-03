CREATE TABLE `efficiency` (
 `system power` double NOT NULL,
 `annual production` double NOT NULL,
 `CO2 avoided` double NOT NULL,
 `reimbursement` double NOT NULL,
 `pvID` int(11) NOT NULL AUTO_INCREMENT,
 PRIMARY KEY (`pvID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8

INSERT INTO `efficiency` (`system power`, `annual production`, `CO2 avoided`, `reimbursement`) VALUES
(20700, 17595, 8, 100),
(5000, 8000, 0, 120);

CREATE TABLE `general` (
 `name` varchar(50) NOT NULL,
 `photo` blob NOT NULL,
 `address` varchar(100) NOT NULL,
 `latitude` double NOT NULL,
 `longitude` double NOT NULL,
 `operator` varchar(100) NOT NULL,
 `commission date` date NOT NULL,
 `description` text NOT NULL,
 `pvID` int(11) NOT NULL AUTO_INCREMENT,
 PRIMARY KEY (`pvID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8

INSERT INTO `general` (`name`, `address`, `address`, `latitude`, `longitude`, `operator`, `commission date`, `description`) VALUES
('PV1', 'panepistimiou 1', 35.09744, 393.423157, 'COPRO A.S.B.L.', 2018-10-23, 'Installation photovoltaïque sur le toit de la soci...'),
('PV2','diagorou 3', 35.052484, 392.879333, 'BELPOWER INTERNATIONAL S.A.', 2018-11-09, 'installation photovoltaïque sur toiture tuiles 2...');

CREATE TABLE `hardware` (
 `solar panel modules` varchar(50) NOT NULL,
 `azimuth angle` double NOT NULL,
 `inclination angle` double NOT NULL,
 `communication` varchar(50) NOT NULL,
 `inverter` int(11) NOT NULL,
 `sensors` int(11) NOT NULL,
 `pvID` int(11) NOT NULL AUTO_INCREMENT,
 PRIMARY KEY (`pvID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8

INSERT INTO `hardware` (`solar panel modules`, `azimuth angle`, `inclination angle`, `communication`, `inverter`, `sensors`) VALUES
('polycrystalline silicon', 270, 330, 'Sunny WebBox', 7000, 300),
('polycrystalline silicon', 200, 150, 'SMA Webconnect', 5000, 500);
