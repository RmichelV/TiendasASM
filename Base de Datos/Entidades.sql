--------------------------- 1   ----------
-- Crear la tabla 'plataformas'
CREATE TABLE plataformas (
    id_plataforma INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(20)
);

-- Insertar los datos en la tabla 'plataformas'
INSERT INTO plataformas (id_plataforma, nombre) VALUES
(1, 'Pc'),
(2, 'PlayStation 5'),
(3, 'PlayStation 4'),
(4, 'Xbox One'),
(5, 'Xbox Series XS'),
(6, 'Nintendo Switch');

------------------------------------ 2 -------------------------------------

-- Crear la tabla 'generos'
CREATE TABLE generos (
    id_genero INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50)
);

-- Insertar los datos en la tabla 'generos'
INSERT INTO generos (id_genero, nombre) VALUES
(1, 'Acción'),
(2, 'Aventura'),
(3, 'Carreras'),
(4, 'Deportes'),
(5, 'Educacionales'),
(6, 'Indie'),
(7, 'Lucha'),
(8, 'MMO (Multijugador Masivo Online)'),
(9, 'Mundo abierto'),
(10, 'Musicales'),
(11, 'Novela visual'),
(12, 'Puzzle'),
(13, 'Plataforma'),
(14, 'Rol (RPG)'),
(15, 'Sandbox'),
(16, 'Simulación'),
(17, 'Shooter'),
(18, 'Supervivencia'),
(19, 'Terror');


---------------------------- 3 --------------------------------

-- Crear la tabla 'metodo_de_pagos'
CREATE TABLE metodo_de_pagos (
    id_metodop INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(20)
);

-- Insertar los datos en la tabla 'metodo_de_pagos'
INSERT INTO metodo_de_pagos (id_metodop, nombre) VALUES
(1, 'Visa'),
(2, 'MasterCard'),
(3, 'Credito'),
(4, 'Efectivo');

----------------------------- 4 ---------------------------------

-- Crear la tabla 'estados'
CREATE TABLE estados (
    id_estado INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(20)
);

-------------------------- 5 ----------------------------

-- Crear la tabla 'rols'
CREATE TABLE rols (
    id_rol INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50)
);

-- Insertar los datos en la tabla 'rols'
INSERT INTO rols (id_rol, nombre) VALUES
(1, 'usuario Administrador'),
(2, 'usuario Empresa'),
(3, 'usuario Comun');

---------------------------- 6 ---------------------------------
-- Actualizar la tabla users tras la migracion -----
// agregar last_name varchar 255 y birthday date ( habilitar null) 
// ambos campos despues de name 
// agregar tambien: id_rol tipo int al final de la tabla users
----------------------------- 7 -------------------------------

CREATE TABLE tiendas (
    id_tienda INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    direccion VARCHAR(200),
    user_id BIGINT UNSIGNED,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

---------------------- 8 -----------------------------------------
-- Crear la tabla 'juegos'

CREATE TABLE juegos (
    id_juego INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) UNIQUE,
    descripcion VARCHAR(500),
    cantidad_de_jugadores VARCHAR(255), 
    precio DECIMAL(8,2),
    stock INT,
    imagen VARCHAR(200),
    id_tienda INT,
    FOREIGN KEY (id_tienda) REFERENCES tiendas(id_tienda) ON DELETE CASCADE
);

---------------------- 9 -----------------------------------------
CREATE TABLE juegos_plataformas (
    id_juego INT,
    id_plataforma INT,
    FOREIGN KEY (id_juego) REFERENCES juegos(id_juego) ON DELETE CASCADE,
    FOREIGN KEY (id_plataforma) REFERENCES plataformas(id_plataforma) ON DELETE CASCADE
);

----------------------------- 10 ----------------------------
CREATE TABLE juegos_generos (
    id_juego INT,
    id_genero INT,
    FOREIGN KEY (id_juego) REFERENCES juegos(id_juego) ON DELETE CASCADE,
    FOREIGN KEY (id_genero) REFERENCES generos(id_genero) ON DELETE CASCADE
);

-------------------11------------------------------------------

-- tabla de carrito actualizada 
CREATE TABLE carritos (
    id_carrito INT AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED,
    id_juego INT,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (id_juego) REFERENCES juegos(id_juego) ON DELETE CASCADE
);

CREATE TABLE Datos_Qr(
    id_datos_qr INT PRIMARY KEY,
    user_id BIGINT UNSIGNED,
    imagen_qr VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    
)

CREATE TABLE venta (
    id_venta INT AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED,
    fecha_de_compra DATE,
    precio_total DECIMAL,
    id_metodop INT,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (id_metodop) REFERENCES metodo_de_pagos(id_metodop) ON DELETE CASCADE,
)

CREATE TABLE Detale_De_Venta(
    id_detalle_de_venta INT AUTO_INCREMENT PRIMARY KEY,
    id_juego INT,
    cantidad INT,
    precio_total DECIMAL(10,2),
    id_venta INT,
    FOREIGN KEY (id_juego) REFERENCES juegos (id_juego) ON DELETE CASCADE,
    FOREIGN KEY (id_venta) REFERENCES venta(id_venta) ON DELETE CASCADE,
)