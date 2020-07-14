<?php
	class users_registro extends users
	{   
		##############################################################################	
		##  Propiedades	
		##############################################################################
		var $mod_menu       =array();
		var $sys_table		="users";
		##############################################################################	
		##  Metodos	
		##############################################################################
		public function __CONSTRUCT($option=null)
		{			    
            $this->sys_fields["files_id"]["agua"]       =1;

			parent::__CONSTRUCT($option);
		}
   		public function __SAVE($datas=NULL,$option=NULL)
    	{
    		## GUARDAR USUARIO
    		if(count($datas)>2)
    		{
			    $datas["company_id"]    	=1;
			    $datas["status"]    	    =1;
			    $datas["sesion_start"]    	="../votacion/&sys_menu=21";

                $datas["usergroup_ids"] = array(
                    "1" => 4,
                    "2" => 5,
                    "13" => 1,
                    "17" => 5,
                    "21" => 4
                );
                if($datas["celular"]!="")
                {	
                    $vars["telefono"]   ="521".$datas["celular"];                    
	                $vars["mensaje"]	="Muchas gracias {$datas["name"]} por apoyarnos.                 
SolesGPS, tambien esta apoyando a RAUL ML para la secretaria SNTSS. 

Comparte este proyecto 
http://raulmartinez.solesgps.com/webHome/

Registrate para apoyar el proyecto
http://raulmartinez.solesgps.com/users_registro/
";
	                $this->__WA($vars);
	            }
	
		        return parent::__SAVE($datas,$option);
	        }
		}
	}
?>
