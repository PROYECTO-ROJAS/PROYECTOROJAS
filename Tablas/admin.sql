CREATE TABLE `admin` (
    `id` int(11) auto_increment,
    `nombre` varchar(200) NOT NULL,
    `apellido` varchar(200) NOT NULL,
    `pwd` varchar(200) NOT NULL,
    `dni` int(200) NOT NULL,
    `telefono` int(200) NOT NULL,
    `email` varchar(200) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Insert

INSERT INTO `admin` (`id`, `nombre`, `apellido`, `pwd`, `dni`, `telefono`, `email`) VALUES
(1, 'Coco', 'Gato', '123', 44892988, 22494910, 'coco@gmail.com');