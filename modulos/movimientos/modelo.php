<?php
	class movimientos extends general
	{   
		##############################################################################	
		##  Propiedades	
		##############################################################################
		var $mod_menu=array();
		
		var $sys_fields		=array( 
			"id"	    =>array(
			    "title"             => "id",
			    "type"              => "primary key",
			),			
			#######################################################################
			"movimiento_id"	    =>array(
				"title"             => "Calculo ID",			    
			    "type"              => "input",								
			    "attr"             => array(		
					"required",
					"tabindex"		=>"1",
			    	"grupo"=>"1"
			    ),				
			),
			"item_id"	=>array(
			    "title"             => "ARTICULO",
			    "description"       => "Encargado de supervisar distintos dispositivos",
			    "type"              => "autocomplete",
			    "procedure"       	=> "autocomplete_item",
			    #"relation"          => "one2many",			    
			    "relation"          => "many2one",
			    "class_name"       	=> "item",
			    "class_field_l"    	=> "nombre",				# Label
			    "class_field_o"    	=> "item_id",
			    "class_field_m"    	=> "id",			    
			),			
			"mercancia_ids"	    =>array(
			    "type"              => "form",
			    "relation"          => "one2many",
			    "class_name"       	=> "item_compra",			    
			    "class_field_o"    	=> "id",
			    "class_field_m"    	=> "item_id",				
			),

			"cantidad"	    =>array(
				"title"             => "CANTIDAD",			    
			    "type"              => "input",								
			    "attr"             => array(						
					"tabindex"		=>"1",			    	
			    ),				
			),
			"precio"	    =>array(
				"title"             => "PRECIO",			    
			    "type"              => "input",								
			    "attr"             => array(		
					"tabindex"		=>"1",			    	
			    ),				
			),
			"subtotal"	    =>array(
				"title"             => "SUBTOTAL",			    
			    "type"              => "input",								
			    "attr"             => array(		
					"tabindex"		=>"1",			    	
			    ),				
			),
			"impuesto"	    =>array(
				"title"             => "IVA",			       
			    "type"              => "input",								
			    "attr"             => array(		
					"tabindex"		=>"1",			    	
			    ),				
			),
			"descuento"	    =>array(
				"title"             => "DESCUENTO",			        
			    "type"              => "input",								
			    "attr"             => array(						
					"tabindex"		=>"1",			    	
			    ),				
			),
			#######################################################################
		);				
		##############################################################################	
		##  Metodos	
		##############################################################################
		public function __CONSTRUCT($option=array())
		{	
			parent::__CONSTRUCT($option);			
			$this->words["html_head_js"]              	=$this->__FILE_JS();			
		}
   		public function __SAVE($datas=NULL,$option=NULL)
    	{    		
    	    return parent::__SAVE($datas,$option);
		}
		/*
		public function __VIEW_REPORT($option)
		{
			if(!is_array($option))	$option=array();
			$option["type_view"]="report";

			return $this->__SYS_REPORT($option);
		}
		*/		
   		public function __VIEW_REPORT($option="")
    	{    		
			if(!is_array($option))	$option=array();

			$return		=parent::__VIEW_REPORT($option);			
			if(isset($this->class_one))
			{						
				$datas		=$return["data"];
				
				$subtotal	=0;
				$impuesto	=0;
				foreach($datas as $data)
				{
					$subtotal+=$data["subtotal"];
					$impuesto+=$data["impuesto"];
				}
				$total=$subtotal+$impuesto;
				
				$datas=array(
					"subtotal[name='{$this->class_one}_subtotal']"	=>"$subtotal",
					"iva[name='{$this->class_one}_iva']"			=>"$impuesto",
					"total[name='{$this->class_one}_total']"		=>"$total"
				);
				$option["js"]	=$this->__JS_SET_INPUT($datas);				
				
				$return		=parent::__VIEW_REPORT($option);			

			}			
    	    return $return;
		}
	}
?>
