-- Insertar datos en la tabla Area
INSERT INTO Area (nombre_area) VALUES ('Recursos Humanos'), ('Tecnología'), ('Finanzas'), ('Ventas');

-- Insertar datos en la tabla Rol
INSERT INTO Rol (nombre_rol) VALUES ('Administrador'), ('Empleado');

-- Insertar datos en la tabla Cargo
INSERT INTO Cargo (nombre_cargo, area_idArea) VALUES ('Gerente', 1), ('Desarrollador', 2), ('Analista Financiero', 3), ('Asesor comercial', 4);

-- Insertar datos en la tabla Tema
INSERT INTO Tema (nombre_tema) VALUES ('Clima Laboral'), ('Satisfacción del Empleado'), ('Rendimiento Financiero');

-- Insertar datos en la tabla BancoPreguntas (40 preguntas)
INSERT INTO BancoPreguntas (pregunta) VALUES
    ('¿Cómo calificaría su satisfacción en el trabajo?'),
    ('¿Está satisfecho con el entorno laboral?'),
    ('¿Cuál es su opinión sobre el rendimiento financiero de la empresa?'),
    ('¿Cómo calificaría la comunicación interna en la empresa?'),
    ('¿Está de acuerdo con las políticas de conciliación trabajo-vida personal?'),
    ('¿Qué sugerencias tendría para mejorar el ambiente laboral?'),
    ('¿Cómo evaluaría la capacitación proporcionada por la empresa?'),
    ('¿Está satisfecho con las oportunidades de desarrollo profesional?'),
    ('¿Qué aspectos destacaría como positivos en su experiencia laboral?'),
    ('¿Cómo describiría la cultura organizacional de la empresa?'),
    ('¿En qué medida se siente valorado como empleado?'),
    ('¿Está conforme con la compensación salarial que recibe?'),
    ('¿Cómo calificaría la equidad en el trato dentro del equipo de trabajo?'),
    ('¿Considera que hay suficiente reconocimiento a los logros individuales?'),
    ('¿Cómo describiría la relación con sus superiores directos?'),
    ('¿Se siente motivado/a para contribuir al éxito de la empresa?'),
    ('¿Está al tanto de las políticas de diversidad e inclusión de la empresa?'),
    ('¿Qué importancia le da a la flexibilidad en el horario de trabajo?'),
    ('¿Ha participado en programas de bienestar organizacional?'),
    ('¿Cómo evaluaría la gestión de conflictos dentro del equipo?'),
    ('¿Está satisfecho/a con las prestaciones y beneficios ofrecidos?'),
    ('¿Cómo calificaría la gestión del tiempo en su área de trabajo?'),
    ('¿Se siente cómodo/a expresando sus ideas y opiniones en el trabajo?'),
    ('¿Está al tanto de las metas y objetivos de la empresa a corto plazo?'),
    ('¿Qué medidas sugiere para mejorar la conciliación trabajo-familia?'),
    ('¿Cómo calificaría la transparencia en la toma de decisiones en la empresa?'),
    ('¿Qué importancia le da al desarrollo sostenible en el entorno laboral?'),
    ('¿Está satisfecho/a con las oportunidades de liderazgo y crecimiento?'),
    ('¿Considera que hay un equilibrio adecuado entre trabajo y descanso?'),
    ('¿Cómo evaluaría la implementación de tecnologías en su área de trabajo?'),
    ('¿Está satisfecho/a con las oportunidades de formación y capacitación?'),
    ('¿Qué medidas sugiere para mejorar la colaboración entre departamentos?'),
    ('¿Cómo calificaría la implementación de políticas de igualdad de género?'),
    ('¿Está conforme con el nivel de autonomía en su trabajo diario?'),
    ('¿Qué importancia le da al reconocimiento público de los logros del equipo?'),
    ('¿Cómo evaluaría la gestión de la diversidad cultural en la empresa?'),
    ('¿Está satisfecho/a con las oportunidades de participación en proyectos?'),
    ('¿Qué medidas sugiere para fomentar un ambiente de trabajo inclusivo?'),
    ('¿Cómo calificaría la gestión de la carga de trabajo en su área?'),
    ('¿Está al tanto de las iniciativas de responsabilidad social de la empresa?');

-- Insertar datos en la tabla Empleado
INSERT INTO Empleado (nombre, apellido, identificacion, area, cargo, correo_electronico, telefono, area_idArea, rol_idRol, Cargo_idCargo) VALUES
    ('Juan', 'Pérez', 123456789, 'Recursos Humanos', 'Gerente', 'juan.perez@example.com', 123456789, 1, 1, 1),
    ('María', 'Gómez', 987654321, 'Tecnología', 'Desarrollador', 'maria.gomez@example.com', 987654321, 2, 2, 2),
    ('Carlos', 'López', 456789012, 'Finanzas', 'Analista Financiero', 'carlos.lopez@example.com', 456789012, 3, 2, 3);

-- Insertar datos en la tabla Usuario
INSERT INTO Usuario (user, pass, rol_idRol, Empleado_IdEmpleado) VALUES ('admin', 'adminpass', 1, 1), ('usuario1', 'userpass', 2, 2), ('usuario2', 'userpass', 2, 3);

-- Insertar datos en la tabla SeleccionPregunta
INSERT INTO SeleccionPregunta (respuesta, empleado_idEmpleado, bancopreguntas_idPregunta) VALUES (5, 1, 1), (4, 2, 2), (3, 3, 3);

-- Insertar datos en la tabla Encuesta
INSERT INTO Encuesta (tema_IdTema, seleccionpregunta_idseleccionPregunta) VALUES (1, 1), (2, 2), (3, 3);
