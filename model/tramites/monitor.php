<?php
    include('../../controller/tramites/funciones_tramites.php');
    header('Content-Type: text/event-stream');
    header('Cache-Control: no-cache');

    $total = get_usuarios_pendientes();
        
    var_dump($total);
    if($total['pendientes'] <=0){
        echo "data: <a data-toggle=\"dropdown\" class=\"dropdown-toggle\" href=\"#\"><i class=\"ace-icon fa fa-bell icon-animated-bell\"></i><span class=\"badge\"><input type=\"hidden\" id=\"noti\" name=\"noti\" value=\"0\"/>0</span></a><ul class=\"dropdown-menu-right dropdown-navbar navbar-green dropdown-menu dropdown-caret dropdown-close\"><li class=\"dropdown-header\"><i class=\"ace-icon fa fa-check\"></i>Todo en orden</li><li class=\"dropdown-content\"><ul class=\"dropdown-menu dropdown-navbar navbar-pink\"></ul><li></ul> \n\n";

    //Si existen nuevos registros
    }else{
        echo "data: <a data-toggle=\"dropdown\" class=\"dropdown-toggle\" href=\"#\"><i class=\"ace-icon fa fa-bell icon-animated-bell\"></i><span class=\"badge badge-important\"><input type=\"hidden\" id=\"noti\" name=\"noti\" value=\"1\"/>".$total['pendientes']."</span></a><ul class=\"dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close\"><li class=\"dropdown-header\"><i class=\"ace-icon fa fa-exclamation-triangle\"></i>".$total['pendientes']." Nuevas Solicitudes</li><li class=\"dropdown-content\"><ul class=\"dropdown-menu dropdown-navbar navbar-pink\"></ul></li><li class=\"dropdown-footer\"><a href=\"javascript:cambiarcont('view/estudiantes/listado.php');\">Ver las Nuevas Solicitudes<i class=\"ace-icon fa fa-arrow-right\"></i></a></li></ul> \n\n";
    }
    flush();
?>