	var mensaje="";
	var obj;

	$(document).ready(function()
	{
	
	    if($("#email").length>0)
	    {		
		    $("#email").focusout(function() 
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
                            $("#name").val(obj[0].ocupante);
					    }
				    });
			    }	
		    });	
	    }
    });
    
    // ###########################################################################
    // ######################### FUNCIONES #######################################
    // ###########################################################################
