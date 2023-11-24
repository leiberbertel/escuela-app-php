CREATE DATABASE escuela;

USE escuela;

CREATE TABLE alumnos(
    id INT AUTO_INCREMENT NOT NULL,
    nombres VARCHAR(200) NOT NULL,
    apellido_materno VARCHAR(50) NOT NULL,
    apellido_paterno VARCHAR(50),
);