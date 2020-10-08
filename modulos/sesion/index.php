<?php
   	require_once("modelo.php");
	$objeto										=new sesion();
	
	$objeto->words["companyHome"]                  ="Aun en las circunstancias adversas hay que tener esperanza y fe. FE en lo que somos capaces de hacer y ESPERANZA en que llegado el momento lo haremos sin titubear";
	$objeto->words["companyMision"]                ="Salvaguardar los derechos de los trabajadores del instituto mexicano del seguro social de la sección XXV colima, contribuyendo a las mejoras laborales de nuestro estado.";
	$objeto->words["companyVision"]                ="Ser un equipo ejecutivo con capacidad de servir y escuchar a cada uno de los trabajadores dando respuesta pronta a cada una de sus necesidades laborales.";
	$objeto->words["companyContact"]               ="<b>LLamanos Aqui </b><br>312 129 0333<br>314 352 0972<br><br><b>Escribenos Aqui</b>contacto@raul.com<br>";
	
	$objeto->words["system_module"]             =$objeto->__VIEW_CREATE();
	$objeto->words                              =$objeto->__INPUT($objeto->words,$objeto->sys_fields);      

	$objeto->words["html_head_js"]              =$objeto->__FILE_JS();								# ARCHIVOS JS DEL MODULO
	$objeto->words["html_head_css"]             =$objeto->__FILE_CSS();
	
	$objeto->words["module_title"]              ="SNTSS XXV :: Iniciar sesion";
	
    $objeto->words["html_head_description"] =   "EN LA EMPRESA SOLESGPS, CONTAMOS CON UN MODULO PARA ADMINISTRAR EL REGISTRO DE POSICIONES RECIBIDAS DURANTE EL RASTREO SATELITAL.";
    $objeto->words["html_head_keywords"]    =   "GPS, RASTREO, MANZANILLO, SATELITAL, CELULAR, VEHICULAR, VEHICULO, TRACTO, LOCALIZACION, COLIMA, SOLES, SATELITE, GEOCERCAS, STREET VIEW, MAPA";
    $objeto->words["html_head_title"]           ="{$objeto->words["module_title"]}";
    
    $objeto->html                               =$objeto->__VIEW_TEMPLATE("system", $objeto->words);
    $objeto->__VIEW($objeto->html);
?>
