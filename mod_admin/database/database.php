<?php

class database
{

	public function __construct()
	{

		try {

			$host = 'localhost:3306';
			$db  = 'girona_app';
			$user  = 'root';
			$password =  '';
			$charset  = 'utf8mb4';

			
			$this->con = mysqli_connect($host, $user, $password) or die("error de conexion");
			mysqli_select_db($this->con, $db) or die("error de base de datos");
			//	echo "conexion exitosa"	;
		} catch (Exception $ex) {

			throw $ex;
		}
	}


	function consultar($sql)
	{
		$resp = mysqli_query($this->con, $sql);
		$data = null;
		while ($fila = mysqli_fetch_assoc($resp)) {
			$data[] = $fila;
		}
		return $data;
	}


	function ingresar_institucion($sql)
	{
		mysqli_query($this->con, $sql);
		if (mysqli_affected_rows($this->con) <= 0) {
			$re = mysqli_affected_rows($this->con);
			header('Refresh: 2; URL=http://localhost/intranet/login/');

			echo '<p class="alert alert-danger agileits" role="alert"> Institución NO fue posible guardar';
		} else {      //----redirigir el sitio  con un alerta de 2 segundo---

			header('Refresh: 2; URL=http://localhost/intranet/mod_admin/vista/institucion.php');

			echo '<p class="alert alert-success agileits" role="alert"> Institución ingresada Correctamente!';
		}
	}


	function eliminar_institucion($sql)
	{
		mysqli_query($this->con, $sql);
		if (mysqli_affected_rows($this->con) <= 0) {
			$re = mysqli_affected_rows($this->con);
			header('Refresh: 2; URL=http://localhost/intranet/login/');

			echo '<p class="alert alert-danger agileits" role="alert">  NO fue posible Eliminar el Registro';
		} else {      //----redirigir el sitio  con un alerta de 2 segundo---

			header('Refresh: 2; URL=http://localhost/intranet/mod_admin/vista/institucion.php');

			echo '<h3><p class="alert alert-success agileits" role="alert"> Institución Eliminada Correctamente! </h3>';
		}
	}
	function eliminar_notaventa($sql)
	{
		mysqli_query($this->con, $sql);
		if (mysqli_affected_rows($this->con) <= 0) {
			$re = mysqli_affected_rows($this->con);
			header('Refresh: 2; URL=http://localhost/intranet_copan/mod_admin/vista/ingresoNV.php');

			echo '<p class="alert alert-danger agileits" role="alert">  NO fue posible Eliminar el Registro';
		} else {      //----redirigir el sitio  con un alerta de 2 segundo---

			header('Refresh: 2; URL=http://localhost/intranet_copan/mod_admin/vista/ingresoNV.php');

			echo '<h3><p class="alert alert-success agileits" role="alert"> NOTA DE VENTA Eliminada Correctamente! </h3>';
		}
	}
	function eliminar_parentesco($sql)
	{
		mysqli_query($this->con, $sql);
		if (mysqli_affected_rows($this->con) <= 0) {
			$re = mysqli_affected_rows($this->con);
			header('Refresh: 2; URL=http://localhost/intranet/login/');

			echo '<p class="alert alert-danger agileits" role="alert">  NO fue posible Eliminar el Registro';
		} else {      //----redirigir el sitio  con un alerta de 2 segundo---

			header('Refresh: 2; URL=http://localhost/intranet/mod_admin/vista/parentesco.php');

			echo '<h3><p class="alert alert-success agileits" role="alert">Relacion Familiar Eliminada Correctamente! </h3>';
		}
	}
	function ingresar_parentesco($sql)
	{
		mysqli_query($this->con, $sql);
		if (mysqli_affected_rows($this->con) <= 0) {
			$re = mysqli_affected_rows($this->con);
			header('Refresh: 2; URL=http://localhost/intranet/login/');

			echo '<p class="alert alert-danger agileits" role="alert">  NO fue posible Ingresar el Registro';
		} else {      //----redirigir el sitio  con un alerta de 2 segundo---

			header('Refresh: 2; URL=http://localhost/intranet/mod_admin/vista/parentesco.php');

			echo '<h3><p class="alert alert-success agileits" role="alert"> Relacion Familiar Guardada Correctamente! </h3>';
		}
	}

	function ingresar_usuario($sql)
	{
		mysqli_query($this->con, $sql);
		if (mysqli_affected_rows($this->con) <= 0) {
			$re = mysqli_affected_rows($this->con);
			
			echo '<p class="alert alert-danger agileits" role="alert">  NO fue posible Registrarlo';
			header('Refresh: 2; URL=http://localhost/intranet_copan/mod_admin/vista/usuario.php');
		} else {      //----redirigir el sitio  con un alerta de 2 segundo---

			header('Refresh: 2; URL=http://localhost/intranet_copan/mod_admin/vista/usuario.php');

			echo '<p class="alert alert-success agileits" role="alert"> Accion Realizada Correctamente!';
		
		}
	}
	function eliminar_usuario($sql)
	{
		mysqli_query($this->con, $sql);
		if (mysqli_affected_rows($this->con) <= 0) {
			$re = mysqli_affected_rows($this->con);
			header('Refresh: 2; URL=http://localhost/intranet_copan/mod_admin/vista/usuario.php');

			echo '<p class="alert alert-danger agileits" role="alert">  NO fue posible Eliminar el Registro';
		} else {      //----redirigir el sitio  con un alerta de 2 segundo---

			header('Refresh: 2; URL=http://localhost/intranet_copan/mod_admin/vista/usuario.php');

			echo '<h4><p class="alert alert-success agileits" role="alert"> Usuari@ Eliminado Correctamente! </h4>';
		}
	}
	function eliminar_asignacomuna($sql)
	{
		mysqli_query($this->con, $sql);
		if (mysqli_affected_rows($this->con) <= 0) {
			$re = mysqli_affected_rows($this->con);
			header('Refresh: 2; URL=http://localhost/intranet/mod_admin/vista/usuario.php');

			echo '<p class="alert alert-danger agileits" role="alert">  NO fue posible Eliminar el Registro';
		} else {      //----redirigir el sitio  con un alerta de 2 segundo---

			header('Refresh: 2; URL=http://localhost/intranet/mod_admin/vista/usuario.php');

			echo '<h4><p class="alert alert-success agileits" role="alert">Comuna Eliminada del Sector Correctamente! </h4>';
		}
	}

	function ingresar_sector($sql)
	{
		mysqli_query($this->con, $sql);
		if (mysqli_affected_rows($this->con) <= 0) {
			$re = mysqli_affected_rows($this->con);

			echo '<p class="alert alert-danger agileits" role="alert">  NO fue posible Registrarlo';
			header('Refresh: 2; URL=http://localhost/intranet/mod_admin/vista/sector.php');
		} else {      //----redirigir el sitio  con un alerta de 2 segundo---

			header('Refresh: 2; URL=http://localhost/intranet/mod_admin/vista/sector.php');

			echo '<p class="alert alert-success agileits" role="alert"> Accion Realizada Correctamente!';
		}
	}
	function ingresar_sector_comuna($sql)
	{
		mysqli_query($this->con, $sql);
		if (mysqli_affected_rows($this->con) <= 0) {
			$re = mysqli_affected_rows($this->con);

			echo '<p class="alert alert-danger agileits" role="alert">  NO fue posible Registrarlo';
			header('Refresh: 2; URL=http://localhost/intranet/mod_admin/vista/asignacomuna.php');
		} else {      //----redirigir el sitio  con un alerta de 2 segundo---

			header('Refresh: 2; URL=http://localhost/intranet/mod_admin/vista/asignacomuna.php');

			echo '<p class="alert alert-success agileits" role="alert"> Comuna Asignada Correctamente!';
		}
	}
	function ingresar_comuna($sql)
	{
		mysqli_query($this->con, $sql);
		if (mysqli_affected_rows($this->con) <= 0) {
			$re = mysqli_affected_rows($this->con);

			echo '<p class="alert alert-danger agileits" role="alert">  NO fue posible Registrarlo';
			header('Refresh: 2; URL=http://localhost/intranet/mod_admin/vista/sector.php');
		} else {      //----redirigir el sitio  con un alerta de 2 segundo---

			header('Refresh: 2; URL=http://localhost/intranet/mod_admin/vista/sector.php');

			echo '<p class="alert alert-success agileits" role="alert"> Accion Realizada Correctamente!';
		}
	}
	function ingresar_persona($sql)
	{
		mysqli_query($this->con, $sql);
		if (mysqli_affected_rows($this->con) <= 0) {
			$re = mysqli_affected_rows($this->con);

			echo '<p class="alert alert-danger agileits" role="alert">  NO fue posible Registrarlo Rut ya existe';
			header('Refresh: 2; URL=http://localhost/intranet/mod_admin/vista/persona.php');
		} else {      //----redirigir el sitio  con un alerta de 2 segundo---

			header('Refresh: 2; URL=http://localhost/intranet/mod_admin/vista/persona.php');

			echo '<p class="alert alert-success agileits" role="alert"> Accion Realizada Correctamente!';
		}
	}
	function ingresar_mod_persona($sql)
	{
		mysqli_query($this->con, $sql);
		if (mysqli_affected_rows($this->con) <= 0) {
			$re = mysqli_affected_rows($this->con);

		//	echo '<p class="alert alert-danger agileits" role="alert">  NO fue posible Registrarlo Rut ya existe';
		//	header('Refresh: 2; URL=http://localhost/intranet/mod_admin/vista/persona.php');
//		} else {      //----redirigir el sitio  con un alerta de 2 segundo---

		header('Refresh: 2; URL=http://localhost/intranet/mod_admin/vista/persona.php');

			echo '<p class="alert alert-success agileits" role="alert"> Accion Realizada Correctamente!';
		}
	}

	function ingresar_denuncia($sql)
	{
		mysqli_query($this->con, $sql);
		if (mysqli_affected_rows($this->con) <= 0) {
			$re = mysqli_affected_rows($this->con);

			echo '<p class="alert alert-danger agileits" role="alert">  NO fue posible Registrarlo ';
		/*	header('Refresh: 2; URL=http://localhost/intranet/mod_admin/vista/denuncia.php');*/
		} else {      //----redirigir el sitio  con un alerta de 2 segundo---

			header('Refresh: 2; URL=http://localhost/intranet/mod_admin/vista/denuncia.php');

			echo '<p class="alert alert-success agileits" role="alert"> Accion Realizada Correctamente!';
		}
	}
	function ingresar_delito($sql)
	{
		mysqli_query($this->con, $sql);
		if (mysqli_affected_rows($this->con) <= 0) {
			$re = mysqli_affected_rows($this->con);
			header('Refresh: 2; URL=http://localhost/intranet/mod_admin/vista/delito.php');

			echo '<p class="alert alert-danger agileits" role="alert"> Delito NO fue posible Guardarlo';
		} else {      //----redirigir el sitio  con un alerta de 2 segundo---

			header('Refresh: 2; URL=http://localhost/intranet/mod_admin/vista/delito.php');

			echo '<p class="alert alert-success agileits" role="alert"> Delito ingresado Correctamente!';
		}
	}
	function eliminar_delitos($sql)
	{
		mysqli_query($this->con, $sql);
		if (mysqli_affected_rows($this->con) <= 0) {
			$re = mysqli_affected_rows($this->con);
			header('Refresh: 2; URL=http://localhost/intranet/mod_admin/vista/delito.php');

			echo '<p class="alert alert-danger agileits" role="alert">  NO fue posible Eliminar el Registro';
		} else {      //----redirigir el sitio  con un alerta de 2 segundo---

			header('Refresh: 2; URL=http://localhost/intranet/mod_admin/vista/delito.php');

			echo '<h3><p class="alert alert-success agileits" role="alert"> Delito Eliminado Correctamente! </h3>';
		}
	}
	function ingresardetalletemporal($sql)
	{
		mysqli_query($this->con, $sql);
		if (mysqli_affected_rows($this->con) <= 0) {
			$re = mysqli_affected_rows($this->con);
		//	header('Refresh: 2; URL=http://localhost/intranet_copan/mod_admin/vista/delito.php');

			echo '<p class="alert alert-danger agileits" role="alert">  NO agregado Registro';
		} else {      //----redirigir el sitio  con un alerta de 2 segundo---

		//	header('Refresh: 2; URL=http://localhost/intranet_copan/mod_admin/vista/delito.php');

			echo '<h3><p class="alert alert-success agileits" role="alert"> agregado Correctamente! </h3>';
		}
	}


	function eliminar_detalle($sql)
	{
		mysqli_query($this->con, $sql);
		if (mysqli_affected_rows($this->con) <= 0) {
			$re = mysqli_affected_rows($this->con);
			header('Refresh: 2; URL=http://localhost/intranet_copan/mod_admin/vista/ingresoNV.php');

			echo '<p class="alert alert-danger agileits" role="alert">  NO fue posible Eliminar el Registro';
		} else {      //----redirigir el sitio  con un alerta de 2 segundo---

			header('Refresh: 2; URL=http://localhost/intranet_copan/mod_admin/vista/ingresoNV.php');

			echo '<h4><p class="alert alert-success agileits" role="alert"> Usuari@ Eliminado Correctamente! </h4>';
		}
	}
}
?>