CREATE TABLE repuestos (
    id_repuesto INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10, 2) NOT NULL,
    stock INT NOT NULL DEFAULT 0
    imgaen_url VARCHAR(255)
);
INSERT INTO repuestos (nombre, descripcion, precio, stock, imagen_url)
VALUES 
('Filtro de Aceite', 'Filtro diseñado para garantizar un óptimo funcionamiento del motor eliminando impurezas del aceite.', 30.00, 50, 'imgs/filtro_aceite.jpg'),
('Juego de Pastillas de Frenos', 'Pastillas de freno de alta calidad para una frenada segura y precisa.', 120.00, 20, 'imgs/pastillas_frenos.jpg'),
('Bujías de Encendido', 'Bujías de alta eficiencia para un encendido óptimo y un menor consumo de combustible.', 15.50, 100, 'imgs/bujias.jpg'),
('Amortiguadores Delanteros', 'Amortiguadores de alto rendimiento para una conducción más suave y estable.', 250.00, 10, 'imgs/amortiguadores.jpg'),
('Batería de Alto Rendimiento', 'Batería con capacidad extendida y gran durabilidad.', 120.00, 15, 'imgs/bateria.jpg'),
('Radiador Universal', 'Radiador diseñado para mantener una temperatura óptima en diferentes tipos de motores.', 300.00, 8, 'imgs/radiador.jpg'),
('Juego de Luces LED', 'Luces LED de larga duración para una visibilidad mejorada durante la conducción nocturna.', 85.00, 30, 'imgs/luces_led.jpg'),
('Correa de Distribución', 'Correa de distribución resistente al desgaste para un rendimiento duradero.', 65.00, 25, 'imgs/correa_distribucion.jpg'),
('Aceite para Motor Sintético', 'Aceite de motor sintético para una mayor protección y durabilidad.', 45.00, 40, 'imgs/aceite_motor.jpg'),
('Espejo Retrovisor Derecho', 'Espejo retrovisor ajustable con alta resistencia y visibilidad.', 75.00, 12, 'imgs/espejo_retrovisor.jpg');