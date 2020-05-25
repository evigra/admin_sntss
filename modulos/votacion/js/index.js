	var mensaje="";
	var obj;

	$(document).ready(function()
	{
	    if($("div.img").length>0)
	    {
		    $("div.img").click(function(e)
		    {				

	            var path			=$(this).attr("path");					
	            var data            ="<img src=\"" + path + "_medium.jpg\">";
	            
	            $("div#message")
	                .html(data)
	                .dialog(
	                    {
					        width:"500px"
					    }
				    );							
		    });
        }
	    if($("#matricula").length>0)
	    {		
		    $("#matricula").focusout(function() 
		    {	
			    if($(this).val()!="")
			    {
				    $.ajax({
					    type:           "GET",
					    url:            "../modulos/plazas/ajax/index.php?time=" + Date.now(),
					    contentType:    "application/json",
					    data:           "&matricula="+$(this).val(),				
					    success:        function (response) 
					    {
						    obj = $.parseJSON( response);				

                            $("#ocupante").val(obj[0].ocupante);
                            $("#categoria").val(obj[0].categoria);
                            $("#horario").val(obj[0].horario);
                            $("#plaza_id").val(obj[0].plaza_id);
                            $("#adscripcion2").val(obj[0].adscripcion2);
                            $("#ar2").val(obj[0].ar2);
                            $("#ads_progra").val(obj[0].ads_progra);
					    }
				    });
			    }	
		    });	
	    }
    });
    
    // ###########################################################################
    // ######################### FUNCIONES #######################################
    // ###########################################################################
