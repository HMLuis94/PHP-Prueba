<!--Luis Hernandez Morales-->

<html lang="es">
  <head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge" charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../logo.jpg" type="image/jpg" sizes="32x32">
    <title>Biblioteca</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

	<style>
		.ir-arriba {
	background: rgba(0,0,0,0.5) url(../img/iconoarriba.png) no-repeat center center;
	display:none;
	padding:20px;
	font-size:20px;
	color:#fff;
	cursor:pointer;
	position: fixed;
	bottom:20px;
	right:20px;
}
</style>

  </head>


  <body onload="viewdata()">
<?php
include('../menu.html');
?>

<div class="container">
  <h3>Autores</h3>

</div>




    <p><br/></p>
    <div class="container">

<!-- Button trigger modal -->
<span class="ir-arriba icon-arrow-up2"></span>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Añadir Ejemplar
</button>
<br/>

<!-- Modal -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="width:700px">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Añadir Ejemplar</h4>
      </div>
      <div class="modal-body">

<form>


  <td><label for="LB">Libro</label></td>
		<td> <select class="form-control" type="text"  id="LB">
			<?php
			include "../config.php";
								$sqli="select * from libros";
								$resi=mysqli_query($conn, $sqli);

								while($fila=mysqli_fetch_array($resi)){

									echo "<option value=".$fila['codLibro'].">".$fila['nombreLibro']." (".$fila['ISBN'].")</option>";


								}
							?>
							</select>
			</td>

      <div class="form-group">
       <label style="margin:7px" for="IM">Importe</label>
        <input class="form-control" type="Number"  id="IM">
      </div>

      <td><label for="MN">Moneda</label></td>
    		<td> <select class="form-control" type="text"  id="MN">
    			<?php
    			include "../config.php";
    								$sqli="select * from monedas";
    								$resi=mysqli_query($conn, $sqli);

    								while($fila=mysqli_fetch_array($resi)){

    									echo "<option value=".$fila['codMoneda'].">".$fila['nombreMoneda']."</option>";


    								}
    							?>
    							</select>
    			</td>
</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" id="save" class="btn btn-primary">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>
<div id="info"></div>
      <br/>
      <div id="viewdata"></div>
    </div>

    <!-- jQuery -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script>




$('#ejemplares').addClass("active");

    function viewdata(){
       $.ajax({
	   type: "GET",
	   url: "php/getdata.php"
      }).done(function( data ) {
	  $('#viewdata').html(data);
      });
    }
    $('#save').click(function(){

	var LB = $('#LB').val();
var IM = $('#IM').val();
var MN = $('#MN').val();

		var datas="LB="+LB+"&IM="+IM+"&MN="+MN;
      document.getElementById("LB").value = "";
        document.getElementById("IM").value = "";
          document.getElementById("MN").value = "";
	$.ajax({
	   type: "POST",
	   url: "php/newdata.php",
	   data: datas
	}).done(function( data ) {
	  $('#info').html(data);
	  viewdata();
	});
    });
    function updatedata(str){

	var id = str;
  var LB = $('#LB'+str).val();
var IM = $('#IM'+str).val();
var MN = $('#MN'+str).val();
var datas="LB="+LB+"&IM="+IM+"&MN="+MN;

	$.ajax({
	   type: "POST",
	   url: "php/updatedata.php?id="+id,
	   data: datas
	}).done(function( data ) {
	  $('#info').html(data);
	  viewdata();
	});
    }
	   function deletedata(str){
	var r = confirm("¿Deseas eliminar el ejemplar?");
    if (r == true) {
	var id = str;
     $.ajax({
	   type: "GET",
	   url: "php/deletedata.php?id="+id
	}).done(function( data ) {
	  $('#info').html(data);
	  viewdata();
	});
    } else {

    }
  }
  	$(document).ready(function(){

	$('.ir-arriba').click(function(){
		$('body, html').animate({
			scrollTop: '0px'
		}, 300);
	});

	$(window).scroll(function(){
		if( $(this).scrollTop() > 0 ){
			$('.ir-arriba').slideDown(300);
		} else {
			$('.ir-arriba').slideUp(300);
		}
	});

});
    </script>
  </body>

</html>
