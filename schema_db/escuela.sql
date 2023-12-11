CREATE DATABASE escuela;

USE escuela;

CREATE TABLE alumnos (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombres VARCHAR(200) NOT NULL,
    apellido_paterno VARCHAR(50) NOT NULL,
    apellido_materno VARCHAR(50) NOT NULL
);

CREATE TABLE rol (
    idrol INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    rol VARCHAR(30) NOT NULL
);

CREATE TABLE usuario (
    idusuario int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(40) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    usuario VARCHAR(40) NOT NULL,
    rol INT(11) NOT NULL,
    contrasena VARCHAR(50) NOT NULL
);