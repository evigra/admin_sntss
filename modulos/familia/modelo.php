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
			    "type"              => "date",
			    "attr"              => array("required","placeholder"=>"AAAA-MM-DD"),
			),			
			"sexo"	    =>array(
			    "title"             => "Sexo",
			    "type"              => "select",
			    "source"            =>array(
			    	""=>"Seleccione una opcion",
			    	"Masculino",
			    	"Femenino",
			    ),

			),			
			"parentesco"	    =>array(
			    "title"             => "Parentesco",
			    "type"              => "select",
			    "source"            =>array(
			    	""=>"Seleccione una opcion",
			    	"Hij@",
			    	"Papa",
			    	"Mama",			    	
			    	"Herman@",
			    ),
			),			

			"files_id"	    =>array(
			    "title"             => "Imagen",
			    "type"              => "file",
			    "relation"          => "many2one",
			    "class_name"       	=> "files",
			    "class_field_o"    	=> "files_id",
			    "class_field_m"    	=> "id",			    
			),
		);				
		##############################################################################	
		##  Metodos	
		##############################################################################

   		public function __SAVE($datas=NULL,$option=NULL)
    	{    		    		
            $datas["user_id"]			=$_SESSION["user"]["id"];

  
      	    $save	= parent::__SAVE($datas,$option);
    	    
    	    return $save;
    	}
    	##############################################################################
   		public function __REPORTE($datas=NULL,$option=NULL)
    	{    		    		


  
      	    $save	= parent::__VIEW_REPORT();    	    
    	    return $save;
    	}

		//////////////////////////////////////////////////		
    	//////////////////////////////////////////////////	
				
	}
?>
