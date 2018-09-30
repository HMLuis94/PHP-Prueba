var productos=[];
var table;
$(document).ready(()=>{
    getClients();
    $('[data-toggle="tooltip"]').tooltip();
    this.table =  $("#dtproductos").DataTable();

    $(document).on('click','#updateButton',()=>updateClients());
    $(document).on('click','#addButton',()=>addClients());

    });

function getClients(){  //Recupera la lista de clientes
    $.getJSON("../php/getClientes.php").done((response)=>{
      this.productos = response;
      
      this.productos.length
        this.productos.forEach(element => {
            this.table.row.add( [  element.id,  
                                   element.nombre,  
                                   element.apellidos,
                                   element.dni,
                                   "<span class='large-devices'> "+element.direccion+"</span>",
                                   "<span class='large-devices'> "+element.telefono+"</span>",
                                   "<a href='mailto:"+element.email+"'>"+element.email+"</a>",
                                   "<button class='btn btn-dark btn-sm ' title='Editar cliente' onClick='updateModalClients(["+element.id+",\""+
                                                                                   element.nombre+"\",\""+
                                                                                   element.apellidos+"\",\""+
                                                                                   element.dni+"\", \""+
                                                                                   element.direccion+"\",\""+
                                                                                   element.telefono+"\",\""+
                                                                                   element.email+"\"])'>✏</button> "+ 
                                   "<button class='btn btn-dark btn-sm '  title='Eliminar cliente' onClick='deleteClients("+element.id+")'>🗑</button> "+
                                   "<button class='btn btn-dark btn-sm '  title='Administrar productos' onClick='administrarProductosModal("+element.id+")'>👜</button>"
                                ] ).draw().node();
        });       
    }); 
}


function deleteClients(id){ // Elimina al cliente seleccionado
    var conf = confirm("Estas seguro de eliminar este campo");
    if (conf == true) {
     txt = "You pressed OK!";
      
    $.ajax({
      data:  {id : id},
      url:   '../php/deleteClientes.php', 
      type:  'post', 
      beforeSend: function () {

    },
      success: (response)=>{ 
        if(response==1){
         
          $('#alerts').html(
            "<div class='alert alert-success' role='alert'>"+
            "<button type='button' class='close' data-dismiss='alert'>x</button> El cliente ha sido borrados correctamente</div>"
          )
         
        }else{
          $('#alerts').html(
            "<div class='alert alert-danger' role='alert'>"+
            "<button type='button' class='close' data-dismiss='alert'>x</button> Ha ocurrido un error a borrar el cliente </div>"
          )
        }
        alertAnimation();
        this.table.rows().remove().draw();
        alertAnimation();
        getClients();
      },
      error: (response)=>{

        $('#alerts').html(
          "<div class='alert alert-danger' role='alert'>"+             
          "<button type='button' class='close' data-dismiss='alert'>x</button> Se ha producido un error: "+response+"</div>"
        )
        this.table.rows().remove().draw();
        alertAnimation();
        getClients();
      }

   });
  }
  
}
this.activeClients;

function updateModalClients(clients){ //Abre la ventana modal y añade los datos del cliente a actualizar
    this.activeClients = clients;

    $("#actId").val(clients[0]);
    $("#actNombre").val(clients[1]);
    $("#actApellidos").val(clients[2]);
    $("#actDni").val(clients[3]);
    $("#actDireccion").val(clients[4]);
    $("#actTelefono").val(clients[5]);
    $("#actEmail").val(clients[6]);

    $("#updateClients").modal();

  }
  function updateClients(){ //Actualiza los clientes
    this.activeClients[1] = $("#actNombre").val();
    this.activeClients[2] = $("#actApellidos").val();
    this.activeClients[3] = $("#actDni").val();
    this.activeClients[4] = $("#actDireccion").val();
    this.activeClients[5] = $("#actTelefono").val();
    this.activeClients[6] = $("#actEmail").val();

    $.ajax({
      data:  {id : this.activeClients[0] ,
              nombre : this.activeClients[1] ,
              apellidos : this.activeClients[2],
              dni : this.activeClients[3],
              direccion : this.activeClients[4],
              telefono : this.activeClients[5],
              email : this.activeClients[6] 
            },
      url:   '../php/updateClientes.php', 
      type:  'post', 
      beforeSend: function () {
      },
      success: (response)=>{ 
        if(response==1){
         
          $('#alerts').html(
            "<div class='alert alert-success' role='alert'>"+
            "<button type='button' class='close' data-dismiss='alert'>x</button> El cliente han sido actualizado correctamente</div>"
          )
         
        }else{
          $('#alerts').html(
            "<div class='alert alert-danger' role='alert'>"+
            "<button type='button' class='close' data-dismiss='alert'>x</button> Ha ocurrido un error al actualizar el cliente </div>"
          )
        }
        alertAnimation();
        this.table.rows().remove().draw();
        $('#updateClients').modal('toggle');
        alertAnimation();
        getClients();
      },
      error: (response)=>{

        $('#alerts').html(
          "<div class='alert alert-danger' role='alert'>"+             
          "<button type='button' class='close' data-dismiss='alert'>x</button> Se ha producido un error: "+response+"</div>"
        )
        this.table.rows().remove().draw();
        $('#updateClients').modal('toggle');
        alertAnimation();
        getClients();
      }

   });
  }

  function addClients(){ //Añade nuevos clientes


    $.ajax({
      data:  {
              nombre : $("#addNombre").val()  ,
              apellidos : $("#addApellidos").val() ,
              dni : $("#addDni").val() ,
              direccion : $("#addDireccion").val() ,
              telefono :$("#addTelefono").val() ,
              email : $("#addEmail").val()} ,
      url:   '../php/setClientes.php', 
      type:  'post', 
      beforeSend: function () {

      },
      success: (response)=>{ 
        if(response==1){
         
          $('#alerts').html(
            "<div class='alert alert-success' role='alert'>"+
            "<button type='button' class='close' data-dismiss='alert'>x</button> Los datos han sido añadidos correctamente</div>"
          )
         
        }else{
          $('#alerts').html(
            "<div class='alert alert-danger' role='alert'>"+
            "<button type='button' class='close' data-dismiss='alert'>x</button> Ha ocurrido un error al insertar los datos </div>"
          )
        }
        alertAnimation();
        this.table.rows().remove().draw();
        $('#addClient').modal('toggle');
        alertAnimation();
        getClients();
      },
      error: (response)=>{

        $('#alerts').html(
          "<div class='alert alert-danger' role='alert'>"+             
          "<button type='button' class='close' data-dismiss='alert'>x</button> Se ha producido un error: "+response+"</div>"
        )
        this.table.rows().remove().draw();
        $('#addClient').modal('toggle');
        alertAnimation();
        getClients();
      }   
   });
 
   $("#addId").val('');
   $("#addNombre").val('');
   $("#addApellidos").val('');
   $("#addDni").val('');
   $("#addDireccion").val('');
   $("#addTelefono").val('');
   $("#addEmail").val('');
  }


    function administrarProductosModal(id){ //Abre el modal de productos y actualiza su informacion
      $('#clientsProducts').empty();
      $('#addProducts').empty();
      getAvailableProducts(id);
      getProductsClients(id);

      $('#admProductos').modal('toggle');

    }

  function getProductsClients(id){ //Obtencion de los productos enlazados al cliente
    
  $.ajax({
    data:  { id : id} ,
    url:   '../php/getProductosClientes.php', 
    type:  'post', 
    beforeSend: function () {

    },
    success: (response)=>{ 
      
      $.each(response,(i, product)=>{
        $('#clientsProducts').append("<tr> <td class='col-xs-2'>"+product.cod_producto+"</td><td  class='col-xs-8'>"
        +product.nombre_producto+"</td>  <td  class='col-xs-2'>"
        +" <button class='btn btn-dark v-center h-center' onClick='deleteProductClient("+product.cod_cliente+","+product.cod_producto+")'> ➖ </button></td></tr>");
      });
      
    }  
  });
 }

  function getAvailableProducts(id){ //Obtencion de los productos que el cliente no dispone
    
    $.ajax({
      data:  { id : id} ,
      url:   '../php/getAvailableProducts.php', 
      type:  'post', 
      beforeSend: function () {

      },
      success: (response)=>{ 
        
        $.each(response,(i, product)=>{
          $('#addProducts').append("<tr> <td class='col-xs-2'>"+product.cod_producto+"</td><td  class='col-xs-8'>"
          +product.nombre_producto+"</td>  <td  class='col-xs-2'>"
          +" <button class='btn btn-dark' onClick='addProductClient("+product.cod_cliente+","+product.cod_producto+")'> ➕ </button></td></tr>");
        });
        
      },
      error: (response)=>{

      }   
    });
 }

 function addProductClient(cliente, producto){ //Añade el producto al cliente

  $.ajax({
    data:  {
            cod_cliente : cliente  ,
            cod_producto : producto 
    },
    url:   '../php/setProductosClientes.php', 
    type:  'post', 
    beforeSend: function () {

    },
    success: ()=>{ 
     
      $('#clientsProducts').empty();
      $('#addProducts').empty();
      getAvailableProducts(cliente);
      getProductsClients(cliente);

    }
   });

 }
 function deleteProductClient(cliente, producto){ //Elimina el producto del cliente

  $.ajax({
    data:  {
            cod_cliente : cliente  ,
            cod_producto : producto 
    },
    url:   '../php/deleteProductosClientes.php', 
    type:  'post', 
    beforeSend: function () {

    },
    success: ()=>{ 
     
      $('#clientsProducts').empty();
      $('#addProducts').empty();
      getAvailableProducts(cliente);
      getProductsClients(cliente);

    }
   });

 }


function alertAnimation(){ //Animacion feedback
    $("#alerts").fadeTo(2000, 500).slideUp(500, function(){
      $("#alerts").slideUp(500);
   })};

  