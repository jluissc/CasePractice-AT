<?php
$ruta = explode("/", $_GET['ruta']); 
require_once './controller/homeController.php';

$homeCon = new homeController();
$infoPay = $homeCon->infoPayment($ruta[1]);
?>
<div class="container center p-4"> 
    <h1 class="container center">Monto a editar : <?php echo $infoPay->amount ?></h1>
    <div id="alert">

    </div>
    <div class="form-row">
        <div class="form-group col-md-3 container center">
            <label for="amount_pay">Amount</label>
            <input type="number" class="form-control" value="<?php echo $infoPay->amount ?>" id="amount_pay" name="amount_pay" placeholder="Amount">
        </div>
    </div>
    <div class="form-group">
        <label for="description_pay">Description</label>
        <textarea cols="30" rows="2" class="form-control" id="description_pay" name="description_pay" placeholder="Change Description"></textarea>
    </div>
    <input type="button" class="btn btn-primary" 
        value="CHANGE"
        onclick="changePayment()">
    <a href="" class="btn btn-danger">CANCEL</a>
</div>

<script>
    function changePayment(){
        hmtlAlert = document.getElementById('alert');
        let amount_pay = document.getElementById('amount_pay').value;
        let description_pay = document.getElementById('description_pay').value;
        let id_pay = '<?php echo $ruta[1]?>';
        let id_user = '<?php echo $ruta[3]?>';
        DATOS = new FormData();
        DATOS.append('amount_pay', amount_pay)
        DATOS.append('description_pay', description_pay)
        DATOS.append('id_pay', id_pay)
        fetch(URL +'/ajax/homeAjax.php',{
            method : 'post',
            body : DATOS
        })
        .then( r => r.text())
        .then( r => {        
            if (r) {
                hmtlAlert.innerHTML = '<span class="btn btn-success">Editado correctamente</span>';
                setTimeout(() => {
                    window.location.href = URL+'user/'+id_user;
                }, 1500);
            }
            else hmtlAlert.innerHTML = '<span class="btn btn-danger">Editado correctamente</span>';
        })    
}

</script>

<!-- 

Editar algun pago seleccionado
 -->