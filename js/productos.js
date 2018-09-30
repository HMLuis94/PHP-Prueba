        var productos=[];
        var table;
        $(document).ready(()=>{
            getProducts();
            this.table =  $("#dtproductos").DataTable();
            $('#file-input').on('change',readFile);
            $('#updateButton').click(()=>updateProducts());
        });

        function getProducts(){ //Obtencion de los productos
          

            $.getJSON("../php/getProductos.php").done((response)=>{
              this.productos = response;
              
              this.productos.length
                this.productos.forEach(element => {
                 
                    this.table.row.add( [  element.codigo,  
                                           element.nombre,  
                                           element.descripcion, 
                                          "<button class='btn btn-dark' onClick='updateModalProducts(["+element.codigo+",\""+element.nombre+"\",\""+element.descripcion+"\"])'>✏</button> "+ 
                                          "<button class='btn btn-dark' onClick='deleteProducts("+element.codigo+")'>🗑</button>"
                                          ])
                                          .draw()
                                          .node();
                });       
            }); 

        }

        $(()=>{$("#json-url-button").click( ()=>{  //Insertar productos mediante url
          var TXT_URL = $("#input-url").val();
            $.ajax
            (
              {
              url : TXT_URL,
              dataType: "text",
              success : function (data) 
              {
                setProducts(data);
              }
            }
          );
          $("#input-url").val('');
          });
        });


        function readFile(e) {  //Leer archivo json
          
         var file = e.target.files[0];
         if (file) {
          var lector = new FileReader();
          lector.onload = function(e) {
          var content = e.target.result;
          setProducts(content);
          }
              
        };
         
         lector.readAsText(file);
          $('#file-input').wrap('<form>').closest('form').get(0).reset();
          $('#file-input').unwrap();
        }

        function deleteProducts(codigo){ //Eliminar el producto seleccionado
          var conf = confirm("Estas seguro de eliminar este campo");
          if (conf == true) {
           txt = "You pressed OK!";
            
          $.ajax({
            data:  {codigo : codigo},
            url:   '../php/deleteProductos.php', 
            type:  'post', 
            beforeSend: function () {
            },
            success: (response)=>{ 
              if(response==1){
               
                $('#alerts').html(
                  "<div class='alert alert-success' role='alert'>"+
                  "<button type='button' class='close' data-dismiss='alert'>x</button> Los datos han sido borrados correctamente</div>"
                )
               
              }else{
                $('#alerts').html(
                  "<div class='alert alert-danger' role='alert'>"+
                  "<button type='button' class='close' data-dismiss='alert'>x</button> Ha ocurrido un error a borrar los datos </div>"
                )
              }
              alertAnimation();
              this.table.rows().remove().draw();
              alertAnimation();
              getProducts();
            },
            error: (response)=>{

              $('#alerts').html(
                "<div class='alert alert-danger' role='alert'>"+             
                "<button type='button' class='close' data-dismiss='alert'>x</button> Se ha producido un error: "+response+"</div>"
              )
              this.table.rows().remove().draw();
              alertAnimation();
              getProducts();
            }

         });
        }
        
      }
        
        function setProducts(products){ //Añadir productos
          $.ajax({
            data:  {products : products},
            url:   '../php/setProductos.php', 
            type:  'post', 
            beforeSend: function () {

            },
            success: (response)=>{ 
              if(response != 0){
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
              $('#addProducts').modal('toggle');
              alertAnimation();
              getProducts();
            },
            error: (response)=>{

              $('#alerts').html(
                "<div class='alert alert-danger' role='alert'>"+             
                "<button type='button' class='close' data-dismiss='alert'>x</button> Se ha producido un error: "+response+"</div>"
              )
              this.table.rows().remove().draw();
              $('#addProducts').modal('toggle');
              alertAnimation();
              getProducts();
            }

         });
       
        }
        var activeProduct;

        function updateModalProducts(product){ //Abrir modal editar productos
          this.activeProduct = product;

          $("#actCodigo").val(product[0])
          $("#actNombre").val(product[1])
          $("#actDescripcion").val(product[2])
          $("#updateProducts").modal();

        }
        function updateProducts(){ //Actualizar productos
          this.activeProduct[1] = $("#actNombre").val();
          this.activeProduct[2] = $("#actDescripcion").val();

          $.ajax({
            data:  {codigo : this.activeProduct[0] ,nombre : this.activeProduct[1] ,descripcion : this.activeProduct[2] },
            url:   '../php/updateProductos.php', 
            type:  'post', 
            beforeSend: function () {
            },
            success: (response)=>{ 
              if(response==1){
               
                $('#alerts').html(
                  "<div class='alert alert-success' role='alert'>"+
                  "<button type='button' class='close' data-dismiss='alert'>x</button> Los datos han sido actualizados correctamente</div>"
                )
               
              }else{
                $('#alerts').html(
                  "<div class='alert alert-danger' role='alert'>"+
                  "<button type='button' class='close' data-dismiss='alert'>x</button> Ha ocurrido un error al actualizar los datos </div>"
                )
              }
              alertAnimation();
              this.table.rows().remove().draw();
              $('#updateProducts').modal('toggle');
              alertAnimation();
              getProducts();
            },
            error: (response)=>{

              $('#alerts').html(
                "<div class='alert alert-danger' role='alert'>"+             
                "<button type='button' class='close' data-dismiss='alert'>x</button> Se ha producido un error: "+response+"</div>"
              )
              this.table.rows().remove().draw();
              $('#updateProducts').modal('toggle');
              alertAnimation();
              getProducts();
            }

         });
        }

        
        function alertAnimation(){ //animaciones de feedback
          $("#alerts").fadeTo(2000, 500).slideUp(500, function(){
            $("#alerts").slideUp(500);
         })};

        
    