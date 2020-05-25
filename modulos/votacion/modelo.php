<?php
	class votacion extends general
	{   
		##############################################################################	
		##  Propiedades	
		##############################################################################
		var $mod_menu=array();
		var $sys_fields		=array( 
			"plaza_id"	    =>array(
			    "title"             => "plaza",
				"title_filter"		=> "Matricula",
			    "type"              => "primary key",
			    "import"            => "10",			  
			),
			"files_id"	    =>array(
			    "title"             => "Imagen",
			    "type"              => "file",
			    "relation"          => "many2one",
			    "class_name"       	=> "files",
			    "class_field_o"    	=> "files_id",
			    "class_field_m"    	=> "id",	
			),
			"matricula"	    =>array(
			    "title"             => "Matricula",
			    "title_filter"		=> "Matricula",
			    "type"              => "input",
  			    "style"             => array(			    	
					"color"			=>array("red"=>"1==1"),
					"font-size"		=>array("25px"=>"1==1"),					
			    ),			    			    

			),
			"ocupante"	    =>array(
			    "title"             => "Ocupante",
				"title_filter"		=> "Ocupante",
			    "type"              => "input",
	    	    "attr"            	=> array(					
			    	"readonly"		=>"readonly"
			    ),			    			    
  			    "style"             => array(			    	
					"color"			=>array("red"=>"1==1"),
					"font-size"		=>array("25px"=>"1==1"),					
			    ),			    			    

			),			
			"categoria"	    =>array(
			    "title"             => "Categoria",
				"title_filter"		=> "Categoria",
			    "type"              => "input",
			),			
			"jornada"	    =>array(
			    "title"             => "Jornada",
			    "type"              => "input",
			),			
			"horario"	    =>array(
			    "title"             => "Horario",
			    "type"              => "input",
			),			
			"ar2"	    =>array(
			    "title"             => "Departamento",
			    "type"              => "input",
			),			
			"adscripcion2"	    =>array(
			    "title"             => "Jefatura",
			    "type"              => "input",
			),			
			"ads_progra"	    =>array(
			    "title"             => "Adscripcion",
			    "type"              => "input",
			),			

		);				
		##############################################################################	
		##  Metodos	
		##############################################################################
		
   		public function __SAVE($datas=NULL,$option=NULL)
    	{
            return parent::__SAVE($datas);	
        }
   		public function __REPORT($option=NULL)
    	{
    	    $option["select"]=array();
    	    
			#if($this->__NIVEL_SESION(">=20")==true)	 // NIVEL ADMINISTRADOR 			
			{	
			    $option["select"][]                     ="v.ads_progra";
			    $option["select"][]                     ="v.todos";								
			    $option["select"][]                     ="v.votos";
			    $option["select"][]                     ="v.faltantes";
			    $option["from"]                        ="
			    (
                    SELECT
                    p.ads_progra as ads_progra, 
                    count(p.ads_progra) as todos, 
                    count(v.ads_progra) as votos,   
                    count(p.ads_progra) - count(v.ads_progra) as faltantes 
                    FROM plazas p LEFT JOIN votacion v ON v.matricula=p.matricula  
                    WHERE 1=1 and !(p.ads_progra ='' OR p.ads_progra ='#N/D')  
                    GROUP BY p.ads_progra 
                    HAVING todos>5
                    ORDER BY count(p.ads_progra) DESC                    
                ) v    
			    ";		 
			}		
			return $this->__VIEW_REPORT($option);
		}				

	}
?>
