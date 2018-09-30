
	<table class="table table-bordered table-hover">
	<thead>
	  <tr>
	    <th>Moneda</th>
		<th width="20%">Editar</th>

	  </tr>
	</thead>
	<tbody>
	<tr>
<?php
include "../../config.php";
$res = $conn->query("select * from monedas order by codMoneda asc");

while ($row = $res->fetch_assoc()) {
?>



	    <td><?php echo $row['nombreMoneda']; ?></td>
	    <td style="color:black">
	    <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal<?php echo $row['codMoneda']; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
	    <a class="btn btn-danger btn-sm"  onclick="deletedata('<?php echo $row['codMoneda']; ?>')" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>

<!-- Modal -->
<div class="modal fade" id="myModal<?php echo $row['codMoneda']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $row['codMoneda']; ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content"  style="width:700px">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel<?php echo $row['codMoneda']; ?>" required>Editar Datos</h4>
      </div>
      <div class="modal-body">

<form>


<table>


 <div class="form-group">
  <label style="margin:7px" for="NM">Codigo Autor: </label>
    <input class="form-control" type="text" id="NM<?php echo $row['codMoneda']; ?>" value="<?php echo $row['nombreMoneda']; ?>">
  </div>
  </tr>

  </table>
</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" onclick="updatedata('<?php echo $row['codMoneda']; ?>')" class="btn btn-primary">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>

	    </td>
	  </tr>
<?php
}
?>
	</tbody>
      </table>
