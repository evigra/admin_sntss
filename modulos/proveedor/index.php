<?php
	require_once("modulos/customer/modelo.php");
	require_once("modelo.php");

	$objeto							=	new proveedor();

	$objeto->__SESSION();
	#$objeto->__PRINT_R($objeto);
	
	$objeto->words["system_body"]	=	$objeto->__TEMPLATE($objeto->sys_html."system_body");	# TEMPLATES ELEJIDOS PARA EL MODULO
	$objeto->words["system_module"]	=	$objeto->__TEMPLATE($objeto->sys_html."system_module");
	
	
	$objeto->words["html_head_js"]	=	$objeto->__FILE_JS(array("../".$objeto->sys_module."js/index"));
	$objeto->words["html_head_css"]	=	$objeto->__FILE_CSS(array("../sitio_web/css/basicItems"));
	
	$module_left=array(
        array("action"=>"Guardar"),
        array("cancel"=>"Cancelar"),
    );

    $module_right=array(
        array("create"=>"Crear"),
        #array("write"=>"Modificar"),
        array("kanban"=>"Kanban"),
        array("report"=>"Reporte"),
    );

    $module_center	=	"";
    $module_title	=	"";

    if($objeto->sys_section=="create")
	{
    	$module_title                	=	"Crear ";

    	$module_right=array(
			#array("create"=>"Crear"),
			#array("write"=>"Modificar"),
			array("kanban"=>"Kanban"),
			array("report"=>"Reporte"),
	    	);

    	$objeto->words["module_body"]	=	$objeto->__VIEW_CREATE($objeto->sys_module."html/create");	
    	$objeto->words               	=	$objeto->__INPUT($objeto->words,$objeto->sys_fields);    
    	
    }	
    elseif($objeto->sys_section=="write")
	{
    	$module_title                	=	"Modificar ";

    	$module_right=array(
			array("create"=>"Crear"),
			#array("write"=>"Modificar"),
			array("kanban"=>"Kanban"),
			array("report"=>"Reporte"),
	    	);	

    	$objeto->words["module_body"]	=	$objeto->__VIEW_WRITE($objeto->sys_module."html/write");	    	
    	$objeto->words               	=	$objeto->__INPUT($objeto->words,$objeto->sys_fields);
    	#$objeto->tab_files();
    	
    }
	elseif($objeto->sys_section=="kanban")
	{
	    $module_title			="Reporte Modular de ";

	    $module_left	=	"";

	   	$module_right=array(
        array("create"=>"Crear"),        
        array("report"=>"Reporte"),
    	); 	

		$template_body					=	$objeto->sys_module."html/kanban";	
	   	$data							=	$objeto->cars();        	
    	$objeto->words["module_body"]	=	$objeto->__VIEW_KANBAN($template_body,$data["data"]);	
    }	
	else
	{
	    $module_left	=	"";
		$option     	=	array();

		$option["template_title"]		=	$objeto->sys_module."html/report_title";
		$option["template_body"]		=	$objeto->sys_module."html/report_body";
		
		$data							=	$objeto->reporte($option);
		
		$objeto->words["module_body"]	=	$data["html"];	
		$module_title                	=	"Reporte de ";
    }
	
	$objeto->words["module_title"]	=	"$module_title Dispositivos";
	$objeto->words["module_left"]  	=	$objeto->__BUTTON($module_left);
	$objeto->words["module_center"]	=	$module_center;
	$objeto->words["module_right"]	=	$objeto->__BUTTON($module_right);;
		
	#$objeto->__PRINT_R($_SESSION["user"]);
	$objeto->words["html_head_title"]		=	"SOLES GPS :: {$_SESSION["company"]["razonSocial"]} :: {$objeto->words["module_title"]}";
	
	$objeto->words["html_head_description"]	=	"EN LA EMPRESA SOLESGPS, CONTAMOS CON UN MODULO PARA ADMINISTRAR EL REGISTRO DE DISPOSITIVOS GPS.";
	$objeto->words["html_head_keywords"]	=	"GPS, RASTREO, MANZANILLO, SATELITAL, CELULAR, VEHICULAR, VEHICULO, TRACTO, LOCALIZACION, COLIMA, SOLES, SATELITE, GEOCERCAS, STREET VIEW, MAPA";
	
    $objeto->html                       	=	$objeto->__VIEW_TEMPLATE("system", $objeto->words);
    $objeto->__VIEW($objeto->html);
	#$objeto->__PRINT_R($objeto->sys_fields);
    
    
?>

