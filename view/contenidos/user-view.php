<?php
$ruta = explode("/", $_GET['ruta']);
require_once './controller/homeController.php'
?>
<div class="container center ">
    <div class="list-group p-4">
        <?php
        $pedi = new homeController();
        $pedi->listPayUser($ruta[1]);
        ?>
    </div>
</div>

<!-- Mostrar el historial de pagos de un cliente -->
