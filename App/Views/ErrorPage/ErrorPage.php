<?php 
defined('BASEPATH') or exit('No se permite acceso directo'); 
require ('./App/Views/Templates/Header.php'); ?>
<main class="app-content">
    <div class="page-error tile">
        <h1><i class="fa fa-exclamation-circle"></i> Error 404: Página NO encontrada</h1>
        <p>La pagina solicitada no fue encontrada.</p>
        <p><a class="btn btn-primary" href="javascript:window.history.back();">Regresar</a></p>
    </div>
</main>
<?php require './App/Views/Templates/js.php'; ?>
<?php require ('./App/Views/Templates/Footer.php'); ?>