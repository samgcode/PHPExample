CREATE TABLE IF NOT EXISTS `People` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `email` varchar(50),
  `password` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

INSERT INTO `People` (`name`, `email`, `password`) VALUES 
('Sam', 'sam@example.com', '123test');