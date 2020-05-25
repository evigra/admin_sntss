<?php	
	$objeto											=new votacion();
	$objeto->__SESSION();

    #$objeto->__PRINT_R($_SESSION);
		
	# CARGANDO PLANTILLAS GENERALES
	$objeto->words["system_body"]               	=$objeto->__TEMPLATE($objeto->sys_html."system_body"); 		
	$objeto->words["system_module"]             	=$objeto->__TEMPLATE($objeto->sys_html."system_module");	
	
	# CARGANDO ARCHIVOS PARTICULARES		
	$objeto->words["html_head_js"]              	=$objeto->__FILE_JS();
	$objeto->words["html_head_css"]             	=$objeto->__FILE_CSS();
		
	$module_left		="";	
	$module_right		="";	
	$module_center		="";
	
	$module_title									="";

	if($objeto->__NIVEL_SESION("<=20")==true)	 // NIVEL ADMINISTRADOR 
	{
	    $module_right=array(
	        array("create"=>"Crear"),
	        array("kanban"=>"Kanban"),
	        array("report"=>"Reporte"),
	    );    
    	$module_center=array(
		    array("report_pendiente"=>" ","icon"=>"ui-icon-help", "title"=>"Pendientes"),
		    array("report_cancelados"=>" ","icon"=>"ui-icon-closethick", "title"=>"Cancelados"),
		    array("report_group"=>"Estadisticas","icon"=>"ui-icon-check", "title"=>"Aprobados", "text"=>false ),
		);	    


    }	











	
    if($objeto->sys_private["section"]=="write")
	{
		#CARGANDO VISTA PARTICULAR Y CAMPOS
    	$objeto->words["module_body"]               =$objeto->__VIEW_WRITE();	
    	$objeto->words                              =$objeto->__INPUT($objeto->words,$objeto->sys_fields);
    }	
    elseif($objeto->sys_private["action"]=="report_group")
    {       
		#CARGANDO VISTA PARTICULAR Y CAMPOS
		$option                                     =array("");
		$data										= $objeto->__REPORT($option);		
		$objeto->words["module_body"]				=$data["html"];
    }
	elseif($objeto->sys_private["section"]=="kanban")
	{
		#CARGANDO VISTA PARTICULAR Y CAMPOS
    	$option										=array();
		$data										=$objeto->__VIEW_KANBAN($option);		
		$objeto->words["module_body"]				=$data["html"];
    }    
    elseif($objeto->sys_private["section"]=="report")
    {       
		#CARGANDO VISTA PARTICULAR Y CAMPOS
    	$option										=array();
		$data										= $objeto->__VIEW_REPORT($option);		
		$objeto->words["module_body"]				=$data["html"];
    }

    else
    {	
        #CARGANDO VISTA PARTICULAR Y CAMPOS
		$module_title								="Crear ";
    	$objeto->words["module_body"]               =$objeto->__VIEW_CREATE();	
    	$objeto->words                              =$objeto->__INPUT($objeto->words,$objeto->sys_fields);    
    }
    
	$objeto->words["module_title"]              ="$module_title Voto";
	
	$objeto->words["module_left"]               =$objeto->__BUTTON($module_left);
	$objeto->words["module_center"]             =$objeto->__BUTTON($module_center);
	$objeto->words["module_right"]              =$objeto->__BUTTON($module_right);
	
	$objeto->words["html_head_description"]	=	"Registra tu voto con una foto, para poder defender tus derechos";
	$objeto->words["html_head_keywords"] 	=	"SNTSS, IMSS";

	$objeto->words["html_head_title"]           ="{$objeto->words["module_title"]}";
    
    $objeto->html                               =$objeto->__VIEW_TEMPLATE("system", $objeto->words);
    $objeto->__VIEW($objeto->html);    
?>
