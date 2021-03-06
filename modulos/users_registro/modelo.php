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
			parent::__CONSTRUCT(array("set"=>array("sesion"=>"true")));			
            
			$this->sys_fields["sesion"]	    =array(
			    "title"             => "Usuario",
			    "type"              => "input",	   			   
			    "class_name"       	=> "sesion",			    
			);

            parent::__CONSTRUCT();
		}
   		public function __SAVE($datas=NULL,$option=NULL)
    	{
    		## GUARDAR USUARIO
    		if(count($datas)>2)
    		{
        		$option					=array();
        		$option["where"]		=array();    		    		
        		$option["where"][]		="email='{$datas["email"]}'";
        		$option["where"][]		="status=0";
        		        		
			    $return =$this->__BROWSE($option);    				
			    
			    if(isset($return["data"]) AND isset($return["data"][0]))
			    {
                    $this->sys_private["id"]=$return["data"][0]["id"];			    
			    }
			    
    		    
			    $datas["company_id"]    	=1;
			    $datas["status"]    	    =1;
			    $datas["sesion_start"]    	="../bienvenida/&sys_menu=21";

                $datas["usergroup_ids"] = array(
                    "1" => 4,
                    "2" => 5,
                    "13" => 1,
                    "17" => 5,
                    "21" => 4
                );
                /*
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
	            */

                #$this->__PRINT_R($datas);
                
		        $save   = parent::__SAVE($datas,$option);

                if($datas["mail"]!="")
                {
                    $option_mail=array(
                        "to"    =>$datas["mail"],
                        "title" =>"SNTSS XXV :: Registro en sistema web",
                        "html"  =>"<b>Hola {$datas["name"]}.</b><br><br>
Hemos recibido tu <b>solicitud de registro</b> en la plataforma digital de la Seccion XXV Colima.<br>
Tenemos que verificar que seas un trabajador IMSS de la seccion XXV.<br>
<b>Espera el correo de confirmacion</b> de acceso a tu cuenta.<br><br>

Se te otorgo acceso temporal, para que registres a tus hijos para el sorteo que realizaremos<br><br>

Plataforma: <a href=\"http://sntss-xxv.com\">sntss-xxv.com</a><br>
",
                    );
                    $this->send_mail($option_mail);
                }

                #/*
	
	            $data_option=array(
	                "user"=>$datas["email"],
	                "pass"=>$datas["password"],
	            );    
		        
                $this->sys_fields["sesion"]["obj"]->__SAVE($data_option);
  
  
  
  
  		        if($user["sesion_start"]!="")   $locacion	=$user["sesion_start"];
		        else							$locacion	="../bienvenida/&sys_menu=21";
		        
			        	
			    $this->__PRINT_JS				=" window.location =\"$locacion\";  ";			

  
		        return $save;	        		        
		        #*/
	        }
		}
	}
?>
