
CREATE DATABASE /*!32312 IF NOT EXISTS*/ `yakhubAgents` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `yakhubAgents`;

--
-- Table structure for table `Agent`
--

CREATE TABLE `Agent` (
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `timeCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `Called`
--

CREATE TABLE `Called` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `agentname` varchar(100) DEFAULT NULL,
  `number` varchar(100) DEFAULT NULL,
  `businessname` varchar(100) DEFAULT NULL,
  `clientname` varchar(100) DEFAULT NULL,
  `pickedup` varchar(100) DEFAULT NULL,
  `interested` varchar(100) DEFAULT NULL,
  `appointment` varchar(100) DEFAULT NULL,
  `notes` text,
  `recordingURL` text,
  `recordingDuration` varchar(100) DEFAULT NULL,
  `callStatus` varchar(100) DEFAULT NULL,
  `timeCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `Calling`
--

CREATE TABLE `Calling` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(100) NOT NULL,
  `businessname` varchar(100) DEFAULT NULL,
  `agentname` varchar(100) DEFAULT NULL,
  `clientname` varchar(100) DEFAULT NULL,
  `timeCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Table structure for table `Client`
--

CREATE TABLE `Client` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `timeCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `Contract`
--

CREATE TABLE `Contract` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `agentname` varchar(100) DEFAULT NULL,
  `clientname` varchar(100) DEFAULT NULL,
  `timeCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Table structure for table `Numbers`
--

CREATE TABLE `Numbers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(100) NOT NULL,
  `businessname` varchar(100) NOT NULL,
  `clientname` varchar(100) DEFAULT NULL,
  `called` varchar(100) NOT NULL,
  `timeCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=320 DEFAULT CHARSET=latin1;

--
-- Table structure for table `Recordings`
--

CREATE TABLE `Recordings` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `agentname` varchar(100) DEFAULT NULL,
  `clientname` varchar(100) DEFAULT NULL,
  `numberCalled` varchar(100) DEFAULT NULL,
  `recordingURL` text,
  `recordingDuration` varchar(100) DEFAULT NULL,
  `callStatus` varchar(100) DEFAULT NULL,
  `timeCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Table structure for table `Twilio`
--

CREATE TABLE `Twilio` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `number` varchar(100) DEFAULT NULL,
  `authtoken` varchar(100) DEFAULT NULL,
  `accountsid` varchar(100) DEFAULT NULL,
  `appid` varchar(100) DEFAULT NULL,
  `timeCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `help` text,
  `timeCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

