
CREATE TABLE Productos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT,
    precio INT NOT NULL,
    descuento INT DEFAULT 0,
    activo INT DEFAULT 1,
    imagen INT
);

-- Inserts para la tabla Productos
INSERT INTO Productos (nombre, descripcion, precio, descuento, activo, imagen) VALUES
('Vans Old Skool Negras', 'Zapatillas Vans Old Skool color negras', 150000, 0, 1, 1),
('Vans Authentic Blancas', 'Zapatillas Vans Authentic color blancas', 120000, 10, 1, 2),
('Vans Sk8-Hi Rojas', 'Zapatillas Vans Sk8-Hi color rojas', 180000, 20, 1, 3),
('Vans Era Azules', 'Zapatillas Vans Era color azules', 140000, 0, 1, 4),
('Vans Slip-On Negras', 'Zapatillas Vans Slip-On color negras', 160000, 30, 1, 5),
('Vans Old Skool Checkerboard', 'Zapatillas Vans Old Skool estampado checkerboard', 170000, 0, 1, 6),
('Vans Authentic Verde Militar', 'Zapatillas Vans Authentic color verde militar', 130000, 40, 1, 7),
('Vans Sk8-Hi MTE Negras', 'Zapatillas Vans Sk8-Hi MTE color negras', 200000, 0, 1, 8),
('Vans Era 95 DX Azul y Rojo', 'Zapatillas Vans Era 95 DX colores azul y rojo', 190000, 0, 1, 9),
('Vans Slip-On Flame', 'Zapatillas Vans Slip-On estampado flame', 220000, 50, 1, 10),
('Vans Old Skool Pro Negro y Blanco', 'Zapatillas Vans Old Skool Pro colores negro y blanco', 210000, 0, 1, 11),
('Vans Sk8-Hi Pro Rojas y Negras', 'Zapatillas Vans Sk8-Hi Pro colores rojas y negras', 230000, 0, 1, 12),
('Vans Era 59 C&L Negro', 'Zapatillas Vans Era 59 color negro', 160000, 0, 1, 13),
('Vans Slip-On Pro Checkerboard', 'Zapatillas Vans Slip-On Pro estampado checkerboard', 180000, 0, 1, 14),
('Vans Old Skool Lite Negro y Blanco', 'Zapatillas Vans Old Skool Lite colores negro y blanco', 200000, 0, 1, 15),
('Vans Sk8-Hi Lite Rojas', 'Zapatillas Vans Sk8-Hi Lite color rojas', 170000, 0, 1, 16),
('Vans Era Pro Azules', 'Zapatillas Vans Era Pro color azules', 150000, 0, 1, 17),
('Vans Slip-On ComfyCush Checkerboard', 'Zapatillas Vans Slip-On ComfyCush estampado checkerboard', 220000, 0, 1, 18),
('Vans Old Skool 36 DX Anaheim Factory Rojas', 'Zapatillas Vans Old Skool 36 DX Anaheim Factory color rojas', 190000, 0, 1, 19),
('Vans Sk8-Hi 46 MTE DX Negro', 'Zapatillas Vans Sk8-Hi 46 MTE DX color negro', 210000, 0, 1, 20),
('Vans Era ComfyCush Azul y Amarillo', 'Zapatillas Vans Era ComfyCush colores azul y amarillo', 230000, 0, 1, 21),
('Vans Slip-On 47 V DX Azul Marino', 'Zapatillas Vans Slip-On 47 V DX color azul marino', 240000, 0, 1, 22),
('Vans Old Skool 36 DX Anaheim Factory Blanco y Negro', 'Zapatillas Vans Old Skool 36 DX Anaheim Factory colores blanco y negro', 260000, 0, 1, 23);