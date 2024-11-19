<?php
include_once '../BD/Conexion.php';
// Verifica si la variable $pdo está definida
if (!isset($pdo)) {
    die("No se pudo establecer una conexión con la base de datos.");
}
?>

<?php
// Archivo de conexión
try {
    $pdo = new PDO('mysql:host=localhost;dbname=TallerMecanico', 'root', 'root');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}

// Consulta para obtener los datos de la tabla repuestos
try {
    $stmt = $pdo->query("SELECT * FROM repuestos");
    $repuestos = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtiene los resultados como un arreglo asociativo
} catch (PDOException $e) {
    die("Error al obtener los datos: " . $e->getMessage());
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Taller Mecanico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="../Estilos/styles.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.css"
        rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
</head>

<body>
    <!-- Contenido del navbar -->
    <!-- <nav class="navbar navbar-expand-lg bg-body-tertiary rounded" aria-label="Thirteenth navbar example">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample11" aria-controls="navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-lg-flex" id="navbarsExample11">
          <a class="navbar-brand col-lg-3 me-0" href="./index.html">Taller Michel</a>
          <ul class="navbar-nav col-lg-6 justify-content-lg-center">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#inicio">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#nosotros">Sobre Nosotros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#servicios">Servicios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#repuestos">Repuestos</a>
            </li>
            <!-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Servicios</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#"></a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li> -->
    <!-- </ul>
          <div class="d-lg-flex col-lg-3 justify-content-lg-end">
            <button class="btn btn-primary">Contactar</button>
          </div>
        </div>
      </div>
    </nav>  -->
    <!-- Contenido de las cards -->
    <nav class="navbar navbar-expand-md bg-dark sticky-top border-bottom" data-bs-theme="dark">
        <div class="container">
            <!-- Logo y Nombre de la Empresa -->

            <!-- Botón de menú desplegable para móviles -->
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas"
                aria-controls="offcanvas" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menú Offcanvas -->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasLabel">
                        Taller Michel
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav flex-grow-1 justify-content-between">
                        <li class="nav-item">
                            <a class="navbar-brand d-flex align-items-center" href="./index.html">
                                <img src="../imgs/logo.png" alt="Logo" width="40" height="40" class="me-2" />
                                <span class="fw-bold">Michel</span>
                            </a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="./index.html">Inicio</a></li>
                        <li class="nav-item">
                            <a class="nav-link" href="./index.html">Sobre Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#servicios">Servicios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./repuestos.html">Repuestos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contactar</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="./cotizar.html">Cotizar</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
<!-- Sección de Repuestos -->
<section id="repuestos" class="py-5" style="background-color: #f4f7fb;">
    <div class="container">
        <h2 class="text-center text-primary fw-bold mb-4">Repuestos Disponibles para tu Vehículo</h2>
        <p class="text-center text-muted mb-5">Encuentra los repuestos más confiables para la reparación de tu vehículo. Garantizamos calidad y durabilidad.</p>

        <!-- Filtro y Buscador -->
        <div class="row mb-4">
            <div class="col-md-6">
                <!-- Buscador -->
                <input type="text" class="form-control" id="buscador" placeholder="Buscar repuestos..." />
            </div>
            <div class="col-md-6">
                <!-- Filtro -->
                <select class="form-select" id="filtro-categoria">
                    <option value="">Seleccionar Categoría</option>
                    <option value="motor">Motor</option>
                    <option value="suspension">Suspensión</option>
                    <option value="frenos">Frenos</option>
                    <option value="aceite">Aceite</option>
                    <option value="baterias">Baterías</option>
                </select>
            </div>
        </div>

        <div class="container my-5">
        <h1 class="text-center mb-4">Catálogo de Repuestos</h1>
        <div class="row">
            <?php
            if (!empty($repuestos)) {
                foreach ($repuestos as $repuesto) {
            ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm rounded border-light">
                        <!-- Imagen del repuesto -->
                        <img src="<?php echo htmlspecialchars($repuesto['imgaen_url']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($repuesto['nombre']); ?>" style="height: 200px; object-fit: cover;">
                        
                        <div class="card-body text-center">
                            <!-- Título del repuesto -->
                            <h5 class="card-title text-dark"><?php echo htmlspecialchars($repuesto['nombre']); ?></h5>
                            
                            <!-- Descripción del repuesto -->
                            <p class="card-text text-muted"><?php echo htmlspecialchars($repuesto['descripcion']); ?></p>
                            
                            <!-- Precio del repuesto -->
                            <p class="text-success fw-bold">$<?php echo number_format($repuesto['precio'], 2); ?></p>
                            
                            <!-- Botones -->
                            <div class="d-flex justify-content-center align-items-center">
                                <a href="#" class="btn btn-primary me-2">Comprar</a>
                                <button type="button" class="btn btn-outline-dark">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                }
            } else {
                echo "<p class='text-center'>No hay repuestos disponibles en este momento.</p>";
            }
            ?>
        </div>
    </div>
    </div>
</section>


    <!-- Footer -->
    <footer class="footer bg-dark text-white pt-5">
        <div class="container">
            <div class="row">
                <!-- Logo y Descripción -->
                <div class="col-lg-4 mb-4">
                    <div class="d-flex align-items-center mb-3">
                        <img src="../imgs/logo.png" Logo" width="60" height="60" class="me-2">
                        <h3 class="fw-bold mb-0">MULTISERVICIOS MICHEL</h3>
                    </div>
                    <p>
                        Garantizamos mano de obra de la más alta calidad en la industria
                        de servicios en general, establecida en Perú con 16 años de
                        experiencia.
                    </p>
                </div>

                <!-- Servicios -->
                <div class="col-lg-8 text-center pt-4">
                    <div class="row">
                        <div class="col-6 col-md-3">
                            <ul class="list-unstyled">
                                <li>Afinamiento de Motor</li>
                                <li>Revisión de Filtros</li>
                                <li>Sistema Eléctrico</li>
                                <li>Limpieza de Inyectores</li>
                            </ul>
                        </div>
                        <div class="col-6 col-md-3">
                            <ul class="list-unstyled">
                                <li>Planchado y Pintura</li>
                                <li>Lavado de Salón</li>
                                <li>Diagnóstico Computarizado</li>
                                <li>Cambio de Aceite y Filtros</li>
                            </ul>
                        </div>
                        <div class="col-6 col-md-3">
                            <ul class="list-unstyled">
                                <li>Alineación y Balanceo</li>
                                <li>Revisión y Cambio de Frenos</li>
                                <li>Sistema de Suspensión</li>
                                <li>Cambio de Batería</li>
                            </ul>
                        </div>
                        <div class="col-6 col-md-3">
                            <ul class="list-unstyled">
                                <li>Cambio de Neumáticos</li>
                                <li>Reparación de Transmisión</li>
                                <li>Servicio de Clutch</li>
                                <li>Mantenimiento Preventivo</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contacto e Información -->
            <div class="row mt-4">
                <div class="col-md-6 col-lg-4 d-flex align-items-center mb-3">
                    <i class="bi bi-telephone-fill me-2"></i> (+054) 661 237 | +51 985
                    237 237 | +51 985 258 369
                </div>
                <div class="col-md-6 col-lg-4 mb-3">
                    <i class="bi bi-geo-alt-fill me-2"></i>Dirección de Chiclayo: Calle
                    Salas #145 - SJL, PERÚ.
                </div>
                <div class="col-md-6 col-lg-4">
                    <i class="bi bi-geo-alt-fill me-2"></i> Dirección de Lima: Av.
                    Ejemplo de calle #1717 LIMA.
                </div>
            </div>

            <!-- Copyright -->
            <div class="text-center mt-3 pt-3 border-top border-secondary pb-3">
                <p class="mb-0">
                    &copy; 2021 Multiservicios Michel. Todos los Derechos Reservados.
                </p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</body>

</html>