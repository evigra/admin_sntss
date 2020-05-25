<?php
	class webHome extends users
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
            unset($this->sys_fields["usergroup_ids"]);
            unset($this->sys_fields["sesion_start"]);
            unset($this->sys_fields["company_id"]);

			parent::__CONSTRUCT($option);
		}				
		public function __BROWSE($option=NULL)		
    	{	
    		if(is_null($option))			$option					=array();
    		if(!isset($option))				$option					=array();
    		
    		if(!isset($option["select"]))	$option["select"]		=array();
    		if(!isset($option["where"]))	$option["where"]		=array();
    		
    		$option["select"][]										="p.*";    		
    		if(!isset($option["from"]))	$option["from"]		        ="users u left join plazas p ON u.email=p.matricula";

  
			$option["where"][]	="p.matricula>0";									    														    				

			if(isset($_SESSION["company"]["id"]) AND isset($_SESSION["user"]["id"]))
				$option["where"][]	="(u.company_id={$_SESSION["company"]["id"]} or u.id={$_SESSION["user"]["id"]})";
				

            $return = parent::__BROWSE($option);
    		return $return;
		}				

	}
?>
