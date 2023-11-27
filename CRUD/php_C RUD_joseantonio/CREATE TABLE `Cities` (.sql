CREATE TABLE `Cities` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
   PRIMARY KEY(id)
);

CREATE TABLE `Stores` (
  `id` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `address` varchar(80) NOT NULL,
  `phone` int(9) NOT NULL,
  `email` varchar(80) NOT NULL,
  `opening_time` time NOT NULL,
  `closing_time` time(11) NOT NULL,
  `last_updated` datetime NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (city) REFERENCES Cities(id)
);

CREATE TABLE `Stores_Products` (
  `id` int(11) NOT NULL,
  `id_store` int(11) NOT NULL,
  `id_product` varchar(80) NOT NULL,
  `stock_quantity` int(9) NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT Stores_Products_fk1 FOREIGN KEY (id_store) REFERENCES Stores(id),
  CONSTRAINT Stores_Products_fk2 FOREIGN KEY (id_product) REFERENCES Products(id)
);

CREATE TABLE `Products` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `description` varchar(200) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `price` float(80) NOT NULL,
  `cost` float NOT NULL,
  `weight` float(11) NOT NULL,
  `dimensions` varchar(50) NOT NULL,
  `last_updated` datetime NOT NULL,
  PRIMARY KEY (id)
);



