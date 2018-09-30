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
  Añadir autor
</button>
<br/>

<!-- Modal -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="width:700px">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Añadir autor</h4>
      </div>
      <div class="modal-body">

<form>

  <div class="form-group">

	<label style="margin:7px" for="CA">Codigo autor: </label>
  <input class="form-control" type="text"  id="CA">
	</div>
  <div class="form-group">

  <label style="margin:7px" for="NA">Nombre autor</label>
   <input class="form-control" type="text"  id="NA">
  </div>
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



$('#autor').addClass("active");

    function viewdata(){
       $.ajax({
	   type: "GET",
	   url: "php/getdata.php"
      }).done(function( data ) {
	  $('#viewdata').html(data);
      });
    }
    $('#save').click(function(){

	var CA = $('#CA').val();
var NA = $('#NA').val();

		var datas="CA="+CA+"&NA="+NA;
      document.getElementById("CA").value = "";
        document.getElementById("NA").value = "";
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
  var CA = $('#CA'+str).val();
  var NA = $('#NA'+str).val();

var datas="CA="+CA+"&NA="+NA;

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
       
	var r = confirm("¿Deseas eliminar este autor?");
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
