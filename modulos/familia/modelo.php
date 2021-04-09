<?php
	class familia extends general
	{   
		##############################################################################	
		##  Propiedades	
		##############################################################################
		var $mod_menu=array();
		var $sys_enviroments="DEVELOPER";
		var $sys_fields		=array( 
			"id"	    =>array(
			    "title"             => "id",			    
			    "type"              => "primary key",
			),
			"user_id"	    =>array(
			    "title"             => "Trabajador",
			    "title_filter"      => "Nombre",
			    "type"              => "input",
			),
			"nombre"	    =>array(
			    "title"             => "Nombre",
			    "title_filter"      => "Mail",
			    "type"              => "input",
			    "attr"              => array("required"),
			),
			"fecha_nacimiento"	    =>array(
			    "title"             => "Fecha de Nacimiento",
			    "type"              => "input",
			    "attr"              => array("required"),
			),			
			"sexo"	    =>array(
			    "title"             => "Sexo",
			    "type"              => "input",
			),			
			"parentesco"	    =>array(
			    "title"             => "Parentesco",
			    "type"              => "input",
			),			

			"files_id"	    =>array(
			    "title"             => "Imagen",
			    "type"              => "file",
			    "relation"          => "many2one",
			    "class_name"       	=> "files",
			    "class_field_o"    	=> "files_id",
			    "class_field_m"    	=> "id",			    
			),
			"status"	    =>array(
			    "title"             => "Activo",
			    "type"              => "checkbox",
			),				
		);				
		##############################################################################	
		##  Metodos	
		##############################################################################

        

		//////////////////////////////////////////////////		
    	//////////////////////////////////////////////////	
	    /*
		public function users($option=NULL)		
    	{	
			$return =$this->__VIEW_REPORT($option);    				
			return $return;
		}
		*/				
					
	}
?>
