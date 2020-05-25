<?php	
	$objeto											=new users_apoyamos();


	$data_js=array(	    
	    "../sitio_web/js/jquery.flipping_gallery",
	    "../" . $objeto->sys_var["module_path"] . "js/index"
	);
	$data_css=array(	    
	    "../sitio_web/css/galerias/flipping_gallery"
	);

    $template                                   =$objeto->sys_var["module_path"]."html/show";
    $objeto->words["system_module"]	            =$objeto->__TEMPLATE($template);	



    $option=array("header"=>"false");
	$data										=$objeto->__VIEW_GALERY($option);		
	$objeto->words["galery"]				    =$data["html"];


    
	$objeto->words["html_head_js"]              =$objeto->__FILE_JS($data_js);								# ARCHIVOS JS DEL MODULO
	$objeto->words["html_head_css"]             =$objeto->__FILE_CSS($data_css);

	$objeto->words["html_head_description"]	=	"Todos formamos parte de este proyecto, y apoyamos a RML en el SNTSS Colima";
	$objeto->words["html_head_keywords"] 	=	"SNTSS, IMSS";

	$objeto->words["html_head_title"]           ="{$objeto->words["module_title"]}";
    
    $objeto->html                               =$objeto->__VIEW_TEMPLATE("system", $objeto->words);
    $objeto->__VIEW($objeto->html);    
?>
