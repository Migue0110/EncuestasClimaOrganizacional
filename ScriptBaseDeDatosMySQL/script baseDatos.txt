-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS EncuestasClima;

-- Seleccionar la base de datos
USE EncuestasClima;

-- Tabla: Area
CREATE TABLE IF NOT EXISTS Area (
    idArea INT AUTO_INCREMENT PRIMARY KEY,
    nombre_area VARCHAR(45)
);

-- Tabla: Rol
CREATE TABLE IF NOT EXISTS Rol (
    idRol INT AUTO_INCREMENT PRIMARY KEY,
    nombre_rol VARCHAR(45)
);

-- Tabla: Cargo
CREATE TABLE IF NOT EXISTS Cargo (
    idCargo INT AUTO_INCREMENT PRIMARY KEY,
    nombre_cargo VARCHAR(45),
    area_idArea INT,
    FOREIGN KEY (area_idArea) REFERENCES Area(idArea)
);

-- Tabla: Tema
CREATE TABLE IF NOT EXISTS Tema (
    idTema INT AUTO_INCREMENT PRIMARY KEY,
    nombre_tema VARCHAR(45)
);

-- Tabla: BancoPreguntas
CREATE TABLE IF NOT EXISTS BancoPreguntas (
    idPregunta INT AUTO_INCREMENT PRIMARY KEY,
    pregunta VARCHAR(255)
);

-- Tabla: Empleado
CREATE TABLE IF NOT EXISTS Empleado (
    idEmpleado INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(45),
    apellido VARCHAR(45),
    identificacion INT,
    area VARCHAR(45),
    cargo VARCHAR(45),
    correo_electronico VARCHAR(50),
    telefono INT,
    area_idArea INT,
    rol_idRol INT,
    Cargo_idCargo INT,
    FOREIGN KEY (area_idArea) REFERENCES Area(idArea),
    FOREIGN KEY (rol_idRol) REFERENCES Rol(idRol),
    FOREIGN KEY (Cargo_idCargo) REFERENCES Cargo(idCargo)
);

-- Tabla: Usuario
CREATE TABLE IF NOT EXISTS Usuario (
    idUsuario INT AUTO_INCREMENT PRIMARY KEY,
    user VARCHAR(45),
    pass VARCHAR(45),
    rol_idRol INT,
    Empleado_IdEmpleado INT,
    FOREIGN KEY (rol_idRol) REFERENCES Rol(idRol),
    FOREIGN KEY (Empleado_IdEmpleado) REFERENCES Empleado(idEmpleado)
);

-- Tabla: SeleccionPregunta
CREATE TABLE IF NOT EXISTS SeleccionPregunta (
    idSeleccionPregunta INT AUTO_INCREMENT PRIMARY KEY,
    respuesta INT,
    empleado_idEmpleado INT,
    bancopreguntas_idPregunta INT,
    FOREIGN KEY (empleado_idEmpleado) REFERENCES Empleado(idEmpleado),
    FOREIGN KEY (bancopreguntas_idPregunta) REFERENCES BancoPreguntas(idPregunta)
);

-- Tabla: Encuesta
CREATE TABLE IF NOT EXISTS Encuesta (
    idPregunta INT AUTO_INCREMENT PRIMARY KEY,
    tema_IdTema INT,
    seleccionpregunta_idseleccionPregunta INT,
    FOREIGN KEY (tema_IdTema) REFERENCES Tema(idTema),
    FOREIGN KEY (seleccionpregunta_idseleccionPregunta) REFERENCES SeleccionPregunta(idSeleccionPregunta)
);