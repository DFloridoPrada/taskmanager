DROP DATABASE if exists tareas_app;
CREATE DATABASE tareas_app;
USE tareas_app;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE tareas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    descripcion TEXT NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_fin TIMESTAMP NULL,
    estado ENUM('pendiente', 'en_progreso', 'completada', 'archivada') DEFAULT 'pendiente',
    usuario VARCHAR(50) NOT NULL,
    FOREIGN KEY (usuario) REFERENCES usuarios(usuario)
);

CREATE USER 'tareas_app'@'localhost' identified by '1234';
GRANT SELECT, INSERT, UPDATE, DELETE on tareas_app.* to 'tareas_app'@'localhost';