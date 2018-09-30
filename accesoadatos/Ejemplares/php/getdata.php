
	<table class="table table-bordered table-hover">
	<thead>
	  <tr>
	    <th width="20%">Nombre del Libro</th>
	    <th>Importe</th>
			<th>Moneda</th>
		<th>Editar</th>

	  </tr>
	</thead>
	<tbody>
	<tr>
<?php
include "../../config.php";
$res = $conn->query("select codEjemplar, ejemplares.codLibro,importe,tipoMoneda,nombreLibro,ISBN,fechaIntro,codMoneda,nombreMoneda from ejemplares inner join libros on ejemplares.codLibro = libros.codLibro inner join monedas on ejemplares.tipoMoneda = monedas.codMoneda order by codEjemplar desc");

while ($row = $res->fetch_assoc()) {
?>



	    <td><?php echo $row['nombreLibro']; ?></td>
	    <td><?php echo $row['importe']; ?></td>
			<td><?php echo $row['nombreMoneda']; ?></td>
	    <td style="color:black">
	    <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal<?php echo $row['codEjemplar']; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
	    <a class="btn btn-danger btn-sm"  onclick="deletedata('<?php echo $row['codEjemplar']; ?>')" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>

<!-- Modal -->
<div class="modal fade" id="myModal<?php echo $row['codEjemplar']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $row['codEjemplar']; ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content"  style="width:700px">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel<?php echo $row['codEjemplar']; ?>">Editar Datos</h4>
      </div>
      <div class="modal-body">

<form>


<table>


	 <label style="margin:7px" for="LB">Nombre del libro: </label>
		 <select class="form-control" type="text" id="LB<?php echo $row['codEjemplar'];?>" value="<?php echo $row['codLibro']; ?>" >
	<?php
			 $sqli="select * from libros";
			 $resi=mysqli_query($conn, $sqli);

			 while($fila=mysqli_fetch_array($resi)){
	if($fila['codLibro']==$row['codLibro']){
	 echo "<option value=".$fila['codLibro']." selected>".$fila['nombreLibro']." (".$fila['ISBN'].")</option>";
	}else{
	echo "<option value=".$fila['codLibro'].">".$fila['nombreLibro']." (".$fila['ISBN'].")</option>";
	}


			 }

			 ?>
	 </select>

	<div class="form-group">
		<label style="margin:7px" for="IM">Importe: </label>
		 <input class="form-control" type="text" id="IM<?php echo $row['codEjemplar']; ?>" value="<?php echo $row['importe']; ?>">
	 </div>

		<label style="margin:7px" for="MN">Moneda: </label>
			<select class="form-control" type="text" id="MN<?php echo $row['codEjemplar'];?>" value="<?php echo $row['nombreMoneda'];?>">
<?php
				$sqli="select * from monedas";
				$resi=mysqli_query($conn, $sqli);

				while($fila=mysqli_fetch_array($resi)){
if($fila['codMoneda']==$row['tipoMoneda']){
		echo "<option value=".$fila['codMoneda']." selected>".$fila['nombreMoneda']."</option>";
}else{
	echo "<option value=".$fila['codMoneda'].">".$fila['nombreMoneda']."</option>";
}


				}

				?>
		</select>
  </tr>

  </table>
</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" onclick="updatedata('<?php echo $row['codEjemplar']; ?>')" class="btn btn-primary">Guardar Cambios</button>
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
