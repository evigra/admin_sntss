<?php

        $this->sys_fields_l18n["id"]                ="";

        $this->sys_fields_l18n["name"]              ="Nombre";
        $this->sys_fields_l18n["email"]             ="Matricula";
        $this->sys_fields_l18n["password"]          ="Password";
        $this->sys_fields_l18n["files_id"]          ="Imagen";
        $this->sys_fields_l18n["sesion_start"]      ="Modulo de inicio";
        $this->sys_fields_l18n["company_id"]        ="Compañia";



        
        if($this->sys_private["section"]=="create")
	    {
            $this->sys_view_l18n["action"]              ="Guardar configuracion";        
        }
        else
        {
            $this->sys_view_l18n["action"]              ="Probar conexion";
        }	


?>
