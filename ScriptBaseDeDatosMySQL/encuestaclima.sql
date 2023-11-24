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

select * from SeleccionPregunta;

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

drop table seleccionpregunta;
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
    empleado_idEmpleado INT,
    estado VARCHAR(20) DEFAULT 'Pendiente',
    FOREIGN KEY (tema_IdTema) REFERENCES Tema(idTema),
    FOREIGN KEY (seleccionpregunta_idseleccionPregunta) REFERENCES SeleccionPregunta(idSeleccionPregunta),
    FOREIGN KEY (empleado_idEmpleado) REFERENCES Empleado(idEmpleado)
);

-- Insertar datos en la tabla Area
INSERT INTO Area (nombre_area) VALUES ('Recursos Humanos'), ('Tecnología'), ('Finanzas'), ('Ventas');

-- Insertar datos en la tabla Rol
INSERT INTO Rol (nombre_rol) VALUES ('Administrador'), ('Empleado');

-- Insertar datos en la tabla Cargo
INSERT INTO Cargo (nombre_cargo, area_idArea) VALUES ('Gerente', 1), ('Desarrollador', 2), ('Analista Financiero', 3), ('Asesor comercial', 4);

-- Insertar datos en la tabla Tema
INSERT INTO Tema (nombre_tema) VALUES ('Clima Laboral'), ('Satisfacción del Empleado'), ('Rendimiento Financiero');

-- Insertar datos en la tabla BancoPreguntas (80 preguntas)
INSERT INTO BancoPreguntas (pregunta) VALUES
    ('¿Cómo evalúa la efectividad de las reuniones de equipo en su área de trabajo?'),
    ('¿Está satisfecho con el nivel de soporte tecnológico que recibe en su trabajo?'),
    ('¿Cómo calificaría la calidad de las instalaciones de trabajo en su empresa?'),
    ('¿Qué tan bien se manejan las situaciones de estrés en su lugar de trabajo?'),
    ('¿Considera que su opinión es valorada en las decisiones de equipo?'),
    ('¿Cómo describiría el equilibrio entre trabajo individual y colaborativo en su equipo?'),
    ('¿Está contento con los métodos de retroalimentación que se utilizan en su trabajo?'),
    ('¿Qué tan efectiva cree que es la comunicación entre diferentes departamentos?'),
    ('¿Cómo evaluaría la accesibilidad de los líderes y gerentes en su empresa?'),
    ('¿Está satisfecho con el proceso de evaluación de desempeño en su trabajo?'),
    ('¿Cuál es su percepción sobre la innovación y creatividad en su área de trabajo?'),
    ('¿Qué tan bien cree que se manejan los cambios organizacionales en su empresa?'),
    ('¿Considera que se promueve adecuadamente el trabajo en equipo en su área?'),
    ('¿Está satisfecho con las estrategias de manejo del estrés en su trabajo?'),
    ('¿Cómo evaluaría la eficiencia de los procesos laborales en su área?'),
    ('¿Qué tan bien cree que se manejan las quejas y sugerencias de los empleados?'),
    ('¿Está conforme con el enfoque de la empresa hacia la innovación?'),
    ('¿Cómo calificaría el nivel de seguridad en su lugar de trabajo?'),
    ('¿Qué importancia le da a las actividades de team building en su empresa?'),
    ('¿Está satisfecho con la forma en que se manejan los recursos en su área?'),
    ('¿Cómo evaluaría el impacto de las políticas de salud y bienestar en su trabajo?'),
    ('¿Está satisfecho con la claridad de los roles y responsabilidades en su equipo?'),
    ('¿Cómo calificaría la oportunidad de trabajar en proyectos transversales?'),
    ('¿Qué tan efectiva considera la estrategia de la empresa para atraer talento?'),
    ('¿Está satisfecho con la cultura de aprendizaje y desarrollo en su trabajo?'),
    ('¿Cómo evaluaría la adaptabilidad de su empresa a nuevas tendencias del mercado?'),
    ('¿Qué tan bien se promueve el equilibrio entre la vida laboral y personal?'),
    ('¿Está satisfecho con las oportunidades para proponer nuevas ideas en su trabajo?'),
    ('¿Cómo calificaría el manejo de la diversidad de habilidades en su equipo?'),
    ('¿Qué tan bien cree que se fomenta la colaboración interdepartamental?'),
    ('¿Está conforme con las políticas de privacidad y confidencialidad en su trabajo?'),
    ('¿Cómo evaluaría la efectividad de los canales de comunicación interna?'),
    ('¿Está satisfecho con el reconocimiento que recibe por su trabajo?'),
    ('¿Qué tan bien se manejan los recursos humanos en su empresa?'),
    ('¿Cómo calificaría las oportunidades de mentoría y coaching en su trabajo?'),
    ('¿Qué importancia le da a la responsabilidad social corporativa de su empresa?'),
    ('¿Está satisfecho con los procesos de toma de decisiones en su área?'),
    ('¿Cómo evaluaría el soporte para el desarrollo de habilidades técnicas?'),
    ('¿Está conforme con la forma en que se manejan las licencias y permisos?'),
    ('¿Qué tan efectivo encuentra el soporte para el bienestar emocional en su trabajo?'),
    ('¿Cómo evalúa la efectividad de las reuniones de equipo en su área de trabajo?'),
    ('¿Está satisfecho con el nivel de soporte tecnológico que recibe en su trabajo?'),
    ('¿Cómo calificaría la calidad de las instalaciones de trabajo en su empresa?'),
    ('¿Qué tan bien se manejan las situaciones de estrés en su lugar de trabajo?'),
    ('¿Considera que su opinión es valorada en las decisiones de equipo?'),
    ('¿Cómo describiría el equilibrio entre trabajo individual y colaborativo en su equipo?'),
    ('¿Está contento con los métodos de retroalimentación que se utilizan en su trabajo?'),
    ('¿Qué tan efectiva cree que es la comunicación entre diferentes departamentos?'),
    ('¿Cómo evaluaría la accesibilidad de los líderes y gerentes en su empresa?'),
    ('¿Está satisfecho con el proceso de evaluación de desempeño en su trabajo?'),
    ('¿Cuál es su percepción sobre la innovación y creatividad en su área de trabajo?'),
    ('¿Qué tan bien cree que se manejan los cambios organizacionales en su empresa?'),
    ('¿Considera que se promueve adecuadamente el trabajo en equipo en su área?'),
    ('¿Está satisfecho con las estrategias de manejo del estrés en su trabajo?'),
    ('¿Cómo evaluaría la eficiencia de los procesos laborales en su área?'),
    ('¿Qué tan bien cree que se manejan las quejas y sugerencias de los empleados?'),
    ('¿Está conforme con el enfoque de la empresa hacia la innovación?'),
    ('¿Cómo calificaría el nivel de seguridad en su lugar de trabajo?'),
    ('¿Qué importancia le da a las actividades de team building en su empresa?'),
    ('¿Está satisfecho con la forma en que se manejan los recursos en su área?'),
    ('¿Cómo evaluaría el impacto de las políticas de salud y bienestar en su trabajo?'),
    ('¿Está satisfecho con la claridad de los roles y responsabilidades en su equipo?'),
    ('¿Cómo calificaría la oportunidad de trabajar en proyectos transversales?'),
    ('¿Qué tan efectiva considera la estrategia de la empresa para atraer talento?'),
    ('¿Está satisfecho con la cultura de aprendizaje y desarrollo en su trabajo?'),
    ('¿Cómo evaluaría la adaptabilidad de su empresa a nuevas tendencias del mercado?'),
    ('¿Qué tan bien se promueve el equilibrio entre la vida laboral y personal?'),
    ('¿Está satisfecho con las oportunidades para proponer nuevas ideas en su trabajo?'),
    ('¿Cómo calificaría el manejo de la diversidad de habilidades en su equipo?'),
    ('¿Qué tan bien cree que se fomenta la colaboración interdepartamental?'),
    ('¿Está conforme con las políticas de privacidad y confidencialidad en su trabajo?'),
    ('¿Cómo evaluaría la efectividad de los canales de comunicación interna?'),
    ('¿Está satisfecho con el reconocimiento que recibe por su trabajo?'),
    ('¿Qué tan bien se manejan los recursos humanos en su empresa?'),
    ('¿Cómo calificaría las oportunidades de mentoría y coaching en su trabajo?'),
    ('¿Qué importancia le da a la responsabilidad social corporativa de su empresa?'),
    ('¿Está satisfecho con los procesos de toma de decisiones en su área?'),
    ('¿Cómo evaluaría el soporte para el desarrollo de habilidades técnicas?'),
    ('¿Está conforme con la forma en que se manejan las licencias y permisos?'),
    ('¿Qué tan efectivo encuentra el soporte para el bienestar emocional en su trabajo?');


-- Insertar datos en la tabla Empleado
INSERT INTO Empleado (nombre, apellido, identificacion, area, cargo, correo_electronico, telefono, area_idArea, rol_idRol, Cargo_idCargo) VALUES
	('felipe', 'sanchez', 987654321, 'Tecnología', 'Desarrollador', 'maria.gomez@example.com', 987654321, 2, 2, 2),
	('Dario', 'Gómez', 987654321, 'Tecnología', 'Desarrollador', 'maria.gomez@example.com', 987654321, 2, 2, 2),
    ('Juan', 'Pérez', 123456789, 'Recursos Humanos', 'Gerente', 'juan.perez@example.com', 123456789, 1, 1, 1),
    ('María', 'Gómez', 987654321, 'Tecnología', 'Desarrollador', 'maria.gomez@example.com', 987654321, 2, 2, 2),
    ('Carlos', 'López', 456789012, 'Finanzas', 'Analista Financiero', 'carlos.lopez@example.com', 456789012, 3, 2, 3);



