<?php	
	$objeto											=new users_registro();
	
	# TEMPLATES O PLANTILLAS ELEJIDAS PARA EL MODULO
	$objeto->words["system_body"]	=	$objeto->__TEMPLATE($objeto->sys_html."system_body");	
	#$objeto->words["system_module"]	=	$objeto->__TEMPLATE($objeto->sys_html."system_module");
	$objeto->words["system_module"]             =$objeto->__VIEW_CREATE();
	
	# CARGA DE ARCHIVOS EXTERNOS JS, CSS
	$objeto->words["html_head_js"]	=	$objeto->__FILE_JS();
	#$objeto->words["html_head_css"]	=	$objeto->__FILE_CSS(array("../sitio_web/css/basicItems"));
		
	$module_center	="";	
	$module_left	="";
    $module_right	="";
        
    $module_title	="";

	
	# TITULO DEL MODULO
	$module_title                	=	"Crear ";

	# PRECARGANDO LOS BOTONES PARA LA VISTA SELECCIONADA
	$module_left=array(
		array("action"=>"Guardar"),
		array("cancel"=>"Cancelar"),
	);
	$module_right=array(
		#array("create"=>"Crear"),
		#array("write"=>"Modificar"),
		array("kanban"=>"Kanban"),
		array("report"=>"Reporte"),
	);

	# CARGANDO VISTA Y CARGANDO CAMPOS A LA VISTA
	#$objeto->words["module_body"]				=$objeto->__VIEW_CREATE();	    	
	$objeto->words               				=$objeto->__INPUT($objeto->words,$objeto->sys_fields);    
    	    
    
	$objeto->words["module_title"]              ="$module_title Usuarios";
	
	$objeto->words["module_left"]               =$objeto->__BUTTON($module_left);
	$objeto->words["module_center"]             ="";
	$objeto->words["module_right"]              =$objeto->__BUTTON($module_right);
	
	$objeto->words["module_title"]              ="Registrate en nuestra plataforma";
	
    $objeto->words["html_head_description"] =   "En el SNTSS XXV tenemos la mision de ser un equipo con capacidad de servir y escuchar a cada uno de los trabajadores dando respuesta pronta a cada una de sus necesidades laborales";
    $objeto->words["html_head_keywords"]    =   "SNTSS, XXV, Colima";
    $objeto->words["html_head_title"]           ="SNTSS XXV :: {$objeto->words["module_title"]}";
    
    $objeto->html                               =$objeto->__VIEW_TEMPLATE("system", $objeto->words);
    $objeto->__VIEW($objeto->html);    
?>
