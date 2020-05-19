CREATE DATABASE pruebasimagen;
USE pruebasimagen

CREATE TABLE Categoria (
id_categoria INT(11) NOT NULL AUTO_INCREMENT,
nom_categoria VARCHAR(100) NOT NULL,
PRIMARY KEY (id_categoria)
)

CREATE TABLE Proveedor(
id_proveedor INT(11) NOT NULL AUTO_INCREMENT,
nom_proveedor VARCHAR(45) NOT NULL,
PRIMARY KEY (id_proveedor)
)

CREATE TABLE Productos(
id_producto INT(11) NOT NULL AUTO_INCREMENT,
id_categoria INT(11) NOT NULL,
id_proveedor INT(11) NOT NULL,
nom_producto VARCHAR(50) NOT NULL,
imagen VARCHAR(200) NOT NULL,
descripcion VARCHAR(200) NOT NULL,
precio DECIMAL(5,2) NOT NULL,	
stock INT(9) NOT NULL,
sistema_de_medida VARCHAR(10) NOT NULL,
fecha_ingreso DATE NOT NULL,
PRIMARY KEY (id_producto),
CONSTRAINT FK_id_categoria FOREIGN KEY(id_categoria) REFERENCES Categoria (id_categoria),
CONSTRAINT FK_id_proveedor FOREIGN KEY(id_proveedor) REFERENCES Proveedor (id_proveedor)
)

SELECT * FROM productos


INSERT INTO productos (id_categoria,id_proveedor,nom_producto,imagen,descripcion,precio,stock,sistema_de_medida,fecha_ingreso)
VALUES ('1','1','Comida para Gato','fotos/FELMEN85.png','comida para animal','2.00','12','libra','2020-05-19')



SELECT * FROM productos WHERE id_producto = '2'
SELECT * FROM productos INNER JOIN Categoria ON Productos.`id_categoria` = Categoria.`id_categoria` INNER JOIN Proveedor ON Productos.`id_proveedor` = Proveedor.`id_proveedor`