CREATE TABLE product(
    id int AUTO_INCREMENT PRIMARY KEY,
    pname varchar(255),
    image varchar(255),
    price double
);
INSERT INTO `product`(`pname`, `image`, `price`) VALUES ('Pizza','1.png',15.99),
('Spaghetti','2.jpg', 12.99), ('Tagliatelle', '3.jpg', 14.99);
