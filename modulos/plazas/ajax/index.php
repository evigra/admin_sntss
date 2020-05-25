<?php

    #print_r($_REQUEST);

	require_once("../../../nucleo/sesion.php");	

	$option             =array(
	    #"echo"          =>"ajax plazas",
    	"where"         =>array(),
    );	    
	$option["where"][]  ="matricula='{$_REQUEST["matricula"]}'";




	$objeto				=new plazas();		
	$datas              =$objeto->__BROWSE($option);
	
	#$objeto->__PRINT_R($datas);

	echo json_encode($datas["data"]);
?>  
