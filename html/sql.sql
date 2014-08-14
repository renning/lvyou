CREATE TABLE `pre_yuexiamen_place` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area` varchar(245) DEFAULT NULL,
  `areaid` int(11) DEFAULT NULL,
  `placetype` int(2) DEFAULT NULL,
  `address` varchar(245) DEFAULT NULL,
  `phone` int(12) DEFAULT NULL,
  `introduction` text,
  `site` varchar(245) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `price` varchar(45) DEFAULT NULL,
  `businesshours` varchar(500) DEFAULT NULL,
  `traffic` text,
  `createtime` int(12) DEFAULT NULL,
  `parentplaceid` int(10) DEFAULT NULL,
  `parentplacename` varchar(45) DEFAULT NULL,
  `score` varchar(10) DEFAULT NULL,
  `commentusersnum` int(10) DEFAULT NULL,
  `willgousersnum` int(10) DEFAULT NULL,
  `havegousersnum` int(10) DEFAULT NULL,
  `coordinate` varchar(45) DEFAULT NULL,
  `username` varchar(145) DEFAULT NULL,
  `dateline` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

CREATE TABLE `pre_yuexiamen_poi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area` varchar(245) DEFAULT NULL,
  `areaid` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `introduction` text,
  `dateline` int(12) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `level` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;



CREATE TABLE `pre_area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `countryid` int(11) NOT NULL,
  `provinceid` int(11) NOT NULL,
  `name` varchar(245) NOT NULL,
  `overview` varchar(1000) NOT NULL,
  `mfwid` int(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=557 DEFAULT CHARSET=utf8;
CREATE TABLE `pre_baike` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area` varchar(245) DEFAULT NULL,
  `areaid` int(11) DEFAULT NULL,
  `poiid` int(11) DEFAULT NULL,
  `poiname` text,
  `introduction` text,
  `languages` text,
  `religion` text,
  `history` text,
  `myth` text,
  `besttime` text,
  `bestdays` text,
  `geoandcli` text,
  `dressguide` text,
  `customs` text,
  `intraffic` text,
  `outtraffic` text,
  `festival` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE `pre_country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(245) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
CREATE TABLE `pre_featured` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area` varchar(245) DEFAULT NULL,
  `areaid` int(11) DEFAULT NULL,
  `type` int(2) DEFAULT NULL,
  `poiid` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `introduction` text,
  `createtime` int(12) DEFAULT NULL,
  `poiname` varchar(45) DEFAULT NULL,
  `subitem` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
CREATE TABLE `pre_place` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area` varchar(245) DEFAULT NULL,
  `areaid` int(11) DEFAULT NULL,
  `placetype` int(2) DEFAULT NULL,
  `address` varchar(245) DEFAULT NULL,
  `phone` int(12) DEFAULT NULL,
  `introduction` text,
  `site` varchar(245) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `price` varchar(45) DEFAULT NULL,
  `businesshours` varchar(500) DEFAULT NULL,
  `traffic` text,
  `createtime` int(12) DEFAULT NULL,
  `parentplaceid` int(10) DEFAULT NULL,
  `parentplacename` varchar(45) DEFAULT NULL,
  `score` varchar(10) DEFAULT NULL,
  `commentusersnum` int(10) DEFAULT NULL,
  `willgousersnum` int(10) DEFAULT NULL,
  `havegousersnum` int(10) DEFAULT NULL,
  `coordinate` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
CREATE TABLE `pre_poi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area` varchar(245) DEFAULT NULL,
  `areaid` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `introduction` text,
  `createtime` int(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
CREATE TABLE `pre_province` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `countryid` int(11) NOT NULL,
  `name` varchar(245) NOT NULL,
  `overview` varchar(1000) NOT NULL,
  `mfwid` int(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
CREATE TABLE `pre_raiders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area` varchar(245) DEFAULT NULL,
  `areaid` int(11) DEFAULT NULL,
  `poiid` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `introduction` text,
  `subitem` text,
  `type` int(2) DEFAULT NULL,
  `createtime` int(12) DEFAULT NULL,
  `poiname` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

