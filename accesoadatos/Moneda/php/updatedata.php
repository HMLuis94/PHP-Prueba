<?php
include "../../config.php";
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$NM = $_POST['NM'];
	
$stmt = $conn->prepare("update monedas set nombreMoneda=? where codMoneda=?");
$stmt->bind_param('sd', $NM,$id);
if($stmt->execute()){
?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Exito!</strong> Se han actualizado los datos.
</div>
<?php
} else{
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Error!</strong> Se ha producido un error.
</div>
<?php
}
} else{
?>
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Alerta!</strong>Revise los datos
</div>
<?php
}
?>
