<?php
	class instalacion extends general
	{   
		##############################################################################	
		##  Propiedades	
		##############################################################################
		var $sys_fields		=array(
			"user"	    	=>array(
			    "title"             => "User",
			    "type"              => "input",
			    "htmlentities"      => "false",
			    
			),
			"pass"	    	=>array(
			    "title"             => "Password",
			    "type"              => "input",
			    "htmlentities"      => "false",
			),
			"name"	    	=>array(
			    "title"             => "Base de datos",
			    "type"              => "input",
			    "htmlentities"      => "false",
			),
			"host"	    	=>array(
			    "title"             => "Host",
			    "type"              => "input",
			    "htmlentities"      => "false",			    
			),
			"server_produccion"	    	=>array(
			    "title"             => "Server Produccion",
			    "type"              => "input",
			    "htmlentities"      => "false",			    
			),
			"server_developer"	    	=>array(
			    "title"             => "Server Developer",
			    "type"              => "input",
			    "htmlentities"      => "false",			    
			),

		);				
		##############################################################################	
		##  Metodos	
		##############################################################################
		public function __CONSTRUCT($option=NULL)
		{
			return parent::__CONSTRUCT($option);
		}
		##############################################################################	
   		public function __TEST_CONECCION($datas=NULL)
    	{
			$eval="
				$"."OPHP_database=array(
					\"user\"		=> \"{$datas["user"]}\",
					\"pass\"		=> \"{$datas["pass"]}\",
					\"name\"		=> \"{$datas["name"]}\",
					\"host\"		=> \"{$datas["host"]}\",
					#\"host\"		=> \"localhost\",
					\"type\"		=> \"mysql\",
				);
			";
			eval($eval);
			
			$this->OPHP_conexion	= @mysqli_connect($OPHP_database["host"], $OPHP_database["user"], $OPHP_database["pass"], $OPHP_database["name"]) OR $this->reconexion();				
			$basededatos			= $this->__EXECUTE("show databases");			    	

			if(count($basededatos)>0)
			{
				$option["message"]	="La coneccion fue un EXITO";
				$option["time"]		=1500;
				$option["title"]	="TEST DE CONECCION";
				
				$valores=array(""=>"Selecciona una BD");
				foreach($basededatos as $bd)			$valores[$bd["Database"]]=$bd["Database"];	
				$this->sys_fields["name"]=array(
					"title"             => "Base de datos",
					"type"              => "select",
					"source"			=>$valores
				);
			}
			else
			{
				$option["message"]	="La coneccion fue un FRACASO";
				$option["time"]		=1500;
				$option["title"]	="TEST DE CONECCION";
			}
			$this->__MESSAGE_OPTION["text"]		=$option["message"];
			$this->__MESSAGE_OPTION["time"]		=$option["time"];																	
			$this->__MESSAGE_OPTION["title"]	=$option["title"];
    	 	
		}
		##############################################################################	
   		public function __PROCCESS_SERVER($datas=NULL)
    	{    	    
            foreach($datas as $index=>$data)
            {
                $datas[$index]="\"$data\"";
            }            
            return "array(" . implode(",",$datas) . ");";
        }
		##############################################################################	
   		public function __CREAR_CONECCION($datas=NULL)
    	{
			rename("modulos/instalacion/", "modulos/instalacion(0)/");
            
            $server_produccion  =$this->__PROCCESS_SERVER(explode(",",$datas["server_produccion"]));
            $server_developer   =$this->__PROCCESS_SERVER(explode(",",$datas["server_developer"]));



    		$txt="<?php	
		        $"."_SESSION[\"var\"][\"server_true\"]		=$server_produccion
		        $"."_SESSION[\"var\"][\"server_error\"]	    =$server_developer

				class basededatos 
				{    
					public function __SYS_DB()
					{  
						return array(
							\"user\"		=> \"{$datas["user"]}\",
							\"pass\"		=> \"{$datas["pass"]}\",
							\"name\"		=> \"{$datas["name"]}\",
							\"host\"		=> \"{$datas["host"]}\",
							#\"host\"		=> \"localhost\",
							\"type\"		=> \"mysql\",
						);
					}
				}
?>";
			$f = fopen("nucleo/basededatos.php", "w+");
			fwrite($f,$txt,strlen($txt));
			fclose($f);    
			 		    	
			//rename("modulos/instalacion/", "modulos/instalacion(0)/");
			header("Location:../company/");			
		}
		##############################################################################	
   		public function __SAVE($datas=NULL,$option=NULL)
    	{ 	
    		if($this->sys_fields["name"]["value"]=="")
    		{
				$this->__TEST_CONECCION($datas);
			}
			else
			{
				$this->__CREAR_CONECCION($datas);		
			}			
		}			
	}
?>
