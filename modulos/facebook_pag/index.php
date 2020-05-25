<?php
   	require_once("modelo.php");
	$objeto										=new facebook_pag();
		
	$objeto->words["system_module"]             =$objeto->__VIEW_SHOW();
	$objeto->words                              =$objeto->__INPUT($objeto->words,$objeto->sys_fields);      

	$objeto->words["html_head_js"]              =$objeto->__FILE_JS();								# ARCHIVOS JS DEL MODULO
	$objeto->words["html_head_css"]             =$objeto->__FILE_CSS();
	
	$objeto->words["module_title"]              ="Facebook :: Paginas RML";
	
    $objeto->words["html_head_description"] =   "Raul Martinez Llereas :: Aun en las circunstancias adversas hay que tener esperanza y fe. FE en lo que somos capaces de hacer y ESPERANZA en que llegado el momento lo haremos sin titubear";
    $objeto->words["html_head_keywords"]    =   "SNTSS, IMSS, raul martinez llerenas";
    $objeto->words["html_head_title"]           ="RML :: {$objeto->words["module_title"]}";
    
    $objeto->html                               =$objeto->__VIEW_TEMPLATE("system", $objeto->words);
    $objeto->__VIEW($objeto->html);
?>
