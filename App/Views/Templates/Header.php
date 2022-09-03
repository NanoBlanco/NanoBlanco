<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description" content="">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RB Servicios</title>
    
    <!-- Bootstrap 4.6.1 -->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- JQuery Steps CSS -->
    <link href="<?= ASSETS.'/js/plugins/jquery-steps/jquery.steps.css' ?>" rel="stylesheet" />
    <link href="<?= ASSETS.'/js/plugins/jquery-steps/steps.css' ?>" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?= ASSETS.'/js/plugins/select2/dist/css/select2.min.css' ?>" />

    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?= ASSETS.'/css/main.css' ?>">
</head>

<body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="index.html"><strong>RB</strong> Servicios</a>
        <!-- Sidebar toggle button-->
        <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
        <!-- Navbar Right Menu-->
        <ul class="app-nav">
            <!-- User Menu-->
            <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu dropdown-menu-right">
                    <li><a class="dropdown-item" href="<?= FOLDER_PATH.'/Usuarios/perfil'; ?>"><i class="fa-solid fa-user-gear"></i> Perfil</a></li>
                    <li><a class="dropdown-item" href="<?= FOLDER_PATH.'/Home/logout'; ?>"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div>
            <!-- <div class="app-sidebar__user"> -->
            <div>
                <p class="app-sidebar__user-name" style="color:white; text-align:center;"><?= $_SESSION['user'] ?></p>
                <p class="app-sidebar__user-designation" style="color:white; text-align:center;"><?= $_SESSION['rol'] ?></p>
            </div>
        </div>
        <ul class="app-menu">
            <li><a class="app-menu__item" href="<?= FOLDER_PATH.'/Home'; ?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Tablero</span></a></li>
            <?php if(isset($_SESSION['permisos'][1]['vw']) == 1 || $_SESSION['id_rol'] = 100) {?>
            <li><a class="app-menu__item" href="<?= FOLDER_PATH.'/Usuarios'; ?>"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Usuarios</span></a></li>
            <?php }?>
            <?php if(isset($_SESSION['permisos'][8]['vw']) == 1 || $_SESSION['id_rol'] = 100) {?>
            <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa-solid fa-book-open"></i><span class="app-menu__label">Catalogo</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="<?= FOLDER_PATH.'/Items'; ?>"><i class="app-menu__icon fa-brands fa-buffer"></i>Items</a></li>
                    <li><a class="treeview-item" href="<?= FOLDER_PATH.'/SubItems'; ?>"><i class="app-menu__icon fa-brands fa-buromobelexperte"></i>Sub-Items</a></li>
                    <li><a class="treeview-item" href="<?= FOLDER_PATH.'/Detalles'; ?>"><i class="app-menu__icon fa-solid fa-bullseye"></i>Detalle</a></li>
                </ul>
            </li>
            <?php }?>
            <?php if(isset($_SESSION['permisos'][3]['vw']) == 1 || $_SESSION['id_rol'] = 100) {?>
            <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa-solid fa-building"></i><span class="app-menu__label">Ubicaciones</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="<?= FOLDER_PATH.'/Ubicaciones'; ?>"><i class="app-menu__icon fa-solid fa-building"></i>Edificio</a></li>
                    <li><a class="treeview-item" href="<?= FOLDER_PATH.'/Departamentos'; ?>"><i class="app-menu__icon fa-solid fa-sitemap"></i>Departamentos</a></li>
                    <li><a class="treeview-item" href="<?= FOLDER_PATH.'/Secciones'; ?>"><i class="app-menu__icon fa-solid fa-store"></i>Secciones</a></li>
                </ul>
            </li>
            <?php }?>
            <?php if(isset($_SESSION['permisos'][5]['vw']) == 1 || $_SESSION['id_rol'] = 100) {?>
                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa-solid fa-barcode"></i><span class="app-menu__label">Ingresos</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="<?= FOLDER_PATH.'/Inmuebles'; ?>"><i class="app-menu__icon fa-solid fa-building-circle-check"></i>Inmuebles</a></li>
                    <li><a class="treeview-item" href="<?= FOLDER_PATH.'/Vehiculos'; ?>"><i class="app-menu__icon fa-solid fa-car-side"></i>Vehiculos</a></li>
                    <li><a class="treeview-item" href="<?= FOLDER_PATH.'/Bienes'; ?>"><i class="app-menu__icon fa-solid fa-circle"></i>Bienes</a></li>
                </ul>
            </li>
            <?php }?>
            <?php if(isset($_SESSION['permisos'][4]['vw']) == 1 || $_SESSION['id_rol'] = 100) {?>
            <li><a class="app-menu__item" href="<?= FOLDER_PATH.'/Pruebas'; ?>"><i class="app-menu__icon fa-regular fa-circle-check"></i><span class="app-menu__label">Procesos</span></a></li>
            <?php }?>
            <?php if(isset($_SESSION['permisos'][6]['vw']) == 1 || $_SESSION['id_rol'] = 100) {?>
            <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa-solid fa-gears"></i><span class="app-menu__label">Seguridad</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="<?= FOLDER_PATH.'/Modulos'; ?>"><i class="app-menu__icon fa-solid fa-folder-tree"></i>Modulos</a></li>
                    <li><a class="treeview-item" href="<?= FOLDER_PATH.'/Roles'; ?>"><i class="app-menu__icon fa-regular fa-address-card"></i>Roles</a></li>
                </ul>
            </li>
            <?php }?>
            <?php if(isset($_SESSION['permisos'][9]['vw']) == 1 || $_SESSION['id_rol'] = 100) {?>
                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa-solid fa-chart-pie"></i><span class="app-menu__label">Listados</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="<?= FOLDER_PATH.'/Modulos'; ?>"><i class="app-menu__icon fa-solid fa-list"></i></i>Hoja Mural</a></li>
                    <li><a class="treeview-item" href="<?= FOLDER_PATH.'/Roles'; ?>"><i class="app-menu__icon fa-solid fa-table-list"></i>Bienes</a></li>
                    <li><a class="treeview-item" href="<?= FOLDER_PATH.'/Roles'; ?>"><i class="app-menu__icon fa-solid fa-list-ul"></i>Inmuebles</a></li>
                    <li><a class="treeview-item" href="<?= FOLDER_PATH.'/Roles'; ?>"><i class="app-menu__icon fa-solid fa-clipboard-list"></i>Vehiculos</a></li>
                    <li><a class="treeview-item" href="<?= FOLDER_PATH.'/Roles'; ?>"><i class="app-menu__icon fa-solid fa-list-check"></i>Depreciación</a></li>
                    <li><a class="treeview-item" href="<?= FOLDER_PATH.'/Roles'; ?>"><i class="app-menu__icon fa-solid fa-list-ol"></i>Actualización</a></li>
                </ul>
            </li>
            <?php }?>
            <li><a class="app-menu__item" href="<?= FOLDER_PATH.'/Home/logout'; ?>"><i class="app-menu__icon fa fa-sign-out fa-lg"></i><span class="app-menu__label">Logout</span></a></li>
        </ul>
    </aside>