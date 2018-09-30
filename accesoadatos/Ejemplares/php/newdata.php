<?php
include "../../config.php";
$LB = $_POST['LB'];
$IM = $_POST['IM'];
$MN = $_POST['MN'];

$stmt = $conn->prepare("INSERT INTO ejemplares VALUES ('',?,?,?)");
$stmt->bind_param('dsd', $LB,$IM,$MN);

if($stmt->execute()){
?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Exito!</strong> Se ha registrado el ejemplar.
</div>
<?php
} else{
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Error!</strong> Hubo un error al registrar el ejemplar.
</div>
<?php
}
?>
