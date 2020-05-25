<?php
	class webHome extends template
	{   
		##############################################################################	
		##  Propiedades	
		##############################################################################
	    var $sys_table			="template";
		##############################################################################	
		##  Metodos	
		##############################################################################
		public function __CONSTRUCT($option=NULL)
		{
		    $option=array("set"=>array("sesion"=>"true"));						
		    parent::__CONSTRUCT($option);

            if($this->sys_object!=="template")
            {                
                $option                 =array();
                
                $option["where"]            =array();                
                $option["where"][]          ="modulo='{$this->sys_object}'";
                #$option["where"][]          ="fecha_inicio<='{$this->sys_object}'";                
                
                $datas                      =$this->__BROWSE($option);
                              
                $this->sys_private["id"]    =@$datas["data"][0]["id"];
                
    		    $this->sys_fields["html"]["type"]   ="html";
            }
		    $option=array("set"=>array("fields"=>"true"));						


			return parent::__CONSTRUCT($option);
		}
	}
?>
