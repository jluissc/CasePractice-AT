<?php 
  require_once './controller/homeController.php'
?>
<div class="container center p-4">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">PlayerID</th>
        <th scope="col">Amount</th>
        <th scope="col">Bank</th>
        <th scope="col">Medio</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        $pedi = new homeController();
        $pedi->listPayments(5);
      ?>
    </tbody>
  </table>
</div>

<!-- 
Aqui mostrar todos los pagos 


 -->