<?php
        $this->sys_fields_l18n["id"]                ="";
        $this->sys_fields_l18n["name"]              ="Nombre";
        $this->sys_fields_l18n["email"]             ="Matricula";
        $this->sys_fields_l18n["password"]          ="Password";
        $this->sys_fields_l18n["files_id"]          ="Imagen";
        $this->sys_fields_l18n["sesion_start"]      ="Modulo de inicio";
        $this->sys_fields_l18n["company_id"]        ="Compañia";
        
        $this->sys_view_l18n["module_title"]                    ="Administracion de votos";
        $this->sys_view_l18n[""]                    ="";

		$this->sys_view_l18n["html_head_title"]="SOLES GPS";
		if(@$_SESSION["company"] and @$_SESSION["company"]["razonSocial"])
			$this->sys_view_l18n["html_head_title"].=" :: {$_SESSION["company"]["razonSocial"]} :: {$this->sys_view_l18n["module_title"]}";
?>
