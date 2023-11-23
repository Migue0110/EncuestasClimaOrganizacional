<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Informes</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="../img/ep.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/stylesmario.css" rel="stylesheet">
    <link href="../css/stylesmiguelangel.css" rel="stylesheet">
    <link href="../css/stylenickson.css" rel="stylesheet">
    <link href="../css/stylesmiguelMora.css" rel="stylesheet">

    <style>
    canvas {
      max-width: 600px;
      margin: 20px;
    }
  </style>
</head>


<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <img class="imgheader" src="../img/ep.png" alt="">
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="../img/users/miguel.png" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Recursos Humanos</h6>
                        <span>Admin</span>
                    </div>
                </div>

                <!-- MENU -->
                <div class="navbar-nav w-100">
                    <a href="indexAdmin.html" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Menú</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="iconopregunta"></i>Banco Preguntas</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="agregarPregunta.php" class="dropdown-item">Agregar Preguntas</a>
                            <a href="crearPregunta.php" class="dropdown-item">Crear Preguntas</a>
                            <a href="#" class="dropdown-item">Gestionar Temas</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="iconoempleado"></i>Gestión  empleado</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="importarEmpleado.php" class="dropdown-item">Importar Empleados</a>
                            <a href="crearEmpleado.php" class="dropdown-item">Crear empleados</a>
                            <a href="eliminarEmpleado.php" class="dropdown-item">Eliminar empleados</a>
                            <a href="modificarEmpleado.php" class="dropdown-item">Modificar empleados</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-chart-bar me-2"></i>Informes</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="informes.php" class="dropdown-item">Generar Informe</a>
                            <a href="filtroResultado.php" class="dropdown-item">Filtrar Resultados</a>
                            <a href="" class="dropdown-item">Exportar resultados</a>
                        </div>
                    </div>
                </div>
                <!-- MENU END -->
            </nav>
        </div>

        <div class="content">
            <!-- OCULTAR MENU -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="indexAdmin.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
               
                <div class="navbar-nav align-items-center ms-auto">

                   
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="../img/users/miguel.png" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">Recursos Humanos</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="../index.php" class="dropdown-item">Cerrar Sesión</a>
                        </div>
                    </div>
                </div>

            </nav>