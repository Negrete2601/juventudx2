<?php

function fill_menu($tipo_usuario)
{
	switch ($tipo_usuario) {
	  	case 2:
		    $menu='<li class="">
						<a href="javascript:cambiarcont(\'view/reportes/reporte.php\');">
							<i class="menu-icon fa fa-line-chart"></i>
							<span class="menu-text"> Reportes </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="javascript:cambiarcont(\'view/usuarios/listado.php\');">
							<i class="menu-icon fa fa-user"></i>
							<span class="menu-text"> Usuarios </span>
						</a>

						<b class="arrow"></b>
					</li>';
		    break;
		default:
			$menu = '';
			break;
	}
	return $menu;
}