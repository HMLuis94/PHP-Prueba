<?php
include "../../config.php";
$NL = $_POST['NL'];
$ISBN = $_POST['ISBN'];
$FI = $_POST['FI'];
$stmt = $conn->prepare("INSERT INTO libros VALUES ('',?,?,?)");
$stmt->bind_param('sss', $NL,$ISBN,$FI);
if($stmt->execute()){
?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Exito!</strong> Se ha registrado el libro.
</div>
<?php
} else{
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Error!</strong> Hubo un error al registrar el libro, revise sus datos.
</div>
<?php
}

?>
