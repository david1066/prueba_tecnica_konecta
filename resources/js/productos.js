


function eliminarproducto(id){
    $.ajax({ 
        url : ('/producto/delete/'+id), 
        type : 'DELETE', 
        dataType : 'json', 
        success : function(e) {
          console.log(e)
        }
      });
}