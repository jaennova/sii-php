-- Crear tabla de estudiantes
CREATE TABLE estudiantes (
    id SERIAL PRIMARY KEY,
    no_control VARCHAR(10) UNIQUE NOT NULL,
    pin VARCHAR(4) DEFAULT '9999',
    nombre VARCHAR(100) NOT NULL,
    carrera VARCHAR(100) NOT NULL,
    semestre INT NOT NULL,
    promedio DECIMAL(4, 2),
    horario JSONB -- Guardamos las materias y horarios en formato JSON
);

-- Insertar datos de prueba
INSERT INTO estudiantes (no_control, nombre, carrera, semestre, promedio, horario)
VALUES
('20321107', 'Jaen Nova', 'Ingeniería en Sistemas', 5, 9.1, 
    '[{"materia": "Matemáticas Avanzadas", "hora": "8:00-10:00"},
      {"materia": "Programación Web", "hora": "10:00-12:00"}]');
