<?php	
	$objeto											=new users();
	#$objeto->device_obj								=new devices();

	$objeto->__SESSION();
	
	# TEMPLATES O PLANTILLAS ELEJIDAS PARA EL MODULO
	$objeto->words["system_body"]	=	$objeto->__TEMPLATE($objeto->sys_html."system_body");	
	$objeto->words["system_module"]	=	$objeto->__TEMPLATE($objeto->sys_html."system_module");
	
	# CARGA DE ARCHIVOS EXTERNOS JS, CSS
	$objeto->words["html_head_js"]	=	$objeto->__FILE_JS();
	#$objeto->words["html_head_css"]	=	$objeto->__FILE_CSS(array("../sitio_web/css/basicItems"));
		
	$module_center	="";	
	$module_left	="";
    $module_right	="";
        
    $module_title	="";

		# PRECARGANDO LOS BOTONES PARA LA VISTA SELECCIONADA
    	$module_right=array(
			array("create"=>"Crear"),
			#array("write"=>"Modificar"),
			array("kanban"=>"Kanban"),
			array("report"=>"Reporte"),
	    );
	
    if($objeto->sys_private["section"]=="create")
	{
		# TITULO DEL MODULO
		$module_title                	=	"Crear ";

		# PRECARGANDO LOS BOTONES PARA LA VISTA SELECCIONADA
		$module_left=array(
			array("action"=>"Guardar"),
			array("cancel"=>"Cancelar"),
		);

		# CARGANDO VISTA Y CARGANDO CAMPOS A LA VISTA
		$objeto->words["module_body"]				=$objeto->__VIEW_CREATE();	    	
		$objeto->words               				=$objeto->__INPUT($objeto->words,$objeto->sys_fields);    
    	
    	#$objeto->words["permisos"]	            	=$objeto->menu_obj->grupos_html();
    	#$objeto->words["flotilla"]	            	=$objeto->device_obj->devices_user();
    }	
    elseif($objeto->sys_private["section"]=="show")
	{
	    $objeto->sys_private["action"]=="print_pdf";
		# TITULO DEL MODULO
		$module_title                	=	"Modificar ";

		# PRECARGANDO LOS BOTONES PARA LA VISTA SELECCIONADA
		$module_left=array(
			array("action"=>"Guardar"),
			array("cancel"=>"Cancelar"),
		);

		# CARGANDO VISTA Y CARGANDO CAMPOS A LA VISTA
		$objeto->words["module_body"]				=$objeto->__VIEW_WRITE();	 
		$objeto->words               				=$objeto->__INPUT($objeto->words,$objeto->sys_fields);    
    	
	    
    	$module_title								="Modificar ";
    }	

    elseif($objeto->sys_private["section"]=="write")
	{
		# TITULO DEL MODULO
		$module_title                	=	"Modificar ";

		# PRECARGANDO LOS BOTONES PARA LA VISTA SELECCIONADA
		$module_left=array(
			array("action"=>"Guardar"),
			array("cancel"=>"Cancelar"),
		);
		# CARGANDO VISTA Y CARGANDO CAMPOS A LA VISTA
		$objeto->words["module_body"]				=$objeto->__VIEW_WRITE();	 
		$objeto->words               				=$objeto->__INPUT($objeto->words,$objeto->sys_fields);    
    	
    	$objeto->words["permisos"]	            	=$objeto->menu_obj->grupos_html(@$objeto->sys_fields["usergroup_ids"]["values"]);
    	#$objeto->words["flotilla"]	            	=$objeto->device_obj->devices_user($objeto->sys_primary_id);
    	
    	#if(isset($objeto->sys_fields["files_id"]["value"]))    	
	    #	$objeto->words["img_files_id"]	            =$objeto->files_obj->__GET_FILE($objeto->sys_fields["files_id"]["value"]);
	    #else	$objeto->words["img_files_id"]="";	
	    
    	$module_title								="Modificar ";
    }	
	elseif($objeto->sys_private["section"]=="kanban")
	{
		# TITULO DEL MODULO
    	$module_title                	=	"Reporte Modular de ";

		# CARGANDO VISTA Y CARGANDO CAMPOS A LA VISTA
    	$option										=array();
		$data										=$objeto->__VIEW_KANBAN($option);		
		$objeto->words["module_body"]				=$data["html"];
    }        
    elseif($objeto->sys_private["section"]=="section_pendiente")
    {    		
		#CARGANDO VISTA PARTICULAR Y CAMPOS			
		$data										= $objeto->__REPORT_PENDIENTE();
		$objeto->words["module_body"]				=$data["html"];
		$module_title								="Reporte de Pendientes de ";
    }
    elseif($objeto->sys_private["section"]=="section_valido")
    {    		
		#CARGANDO VISTA PARTICULAR Y CAMPOS			
		$data										= $objeto->__REPORT_VALIDO();
		$objeto->words["module_body"]				=$data["html"];
		$module_title								="Reporte de Pendientes de ";
    }
    elseif($objeto->sys_private["section"]=="section_novalido")
    {    		
		#CARGANDO VISTA PARTICULAR Y CAMPOS			
		$data										= $objeto->__REPORT_NOVALIDO();
		$objeto->words["module_body"]				=$data["html"];
		$module_title								="Reporte de Pendientes de ";
    }

	else
	{
		# TITULO DEL MODULO
    	$module_title                	=	"Reporte de ";

	    # CARGANDO VISTA Y CARGANDO CAMPOS A LA VISTA  
		$option     								=	array();		
		$data										=$objeto->__VIEW_REPORT($option);
		$objeto->words["module_body"]				=$data["html"];
		$module_title								="Reporte de ";
    }
  
	if(!($objeto->sys_private["section"]=="create" OR $objeto->sys_private["section"]=="show"))
	{
		if(!($objeto->sys_private["section"]=="write"))
		{
			$module_center[]=array("section_pendiente"	=>"Por Validar",			"icon"=>"ui-icon-help");
		}
		$module_center[]=array("section_valido"		    =>"Usuario Valido",		    "icon"=>"ui-icon-check" );
		$module_center[]=array("section_novalido"		=>"Usuario NO Valido",	    "icon"=>"ui-icon-check" );
	}    
    
	$objeto->words["module_title"]              ="$module_title Usuarios";
	
	$objeto->words["module_left"]               =$objeto->__BUTTON($module_left);
	$objeto->words["module_center"]             =$objeto->__BUTTON($module_center);
	$objeto->words["module_right"]              =$objeto->__BUTTON($module_right);
	
	$objeto->words["html_head_description"]	=	"Administracion de usuarios de la plataforma";
	$objeto->words["html_head_keywords"] 	=	"SNTSS, IMSS";

	$objeto->words["html_head_title"]           ="{$objeto->words["module_title"]}";
    
    $objeto->html                               =$objeto->__VIEW_TEMPLATE("system", $objeto->words);
    $objeto->__VIEW($objeto->html);    
?>
