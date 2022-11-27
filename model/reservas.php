<?php

require_once 'model/db.php';

class Reservas
{
	private $pdo;
	private $salon;

	public function __CONSTRUCT()
	{
		try {
			$this->pdo = Db::StartUp();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}


	public function ObtenerReservasActivas()
	{

		try {
			$sql = "SELECT  cod_reservacion, usuario.nombre, cod_salon,fecha_reserva,tiempo_inicio,tiempo_final,descripcion,cantidad,estado 
			FROM reservacion INNER JOIN usuario ON usuario.id_usuario = reservacion.id_usuario";

			$stm = $this->pdo
				->prepare($sql);
			$stm->execute(array());
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function GuardarReserva(reservas $data)
	{
		try {
			$sql = "INSERT INTO reservacion(id_usuario,cod_salon,fecha_reserva,tiempo_inicio,tiempo_final,descripcion,cantidad) VALUES (?,?,?,?,?,?,?)";

			$this->pdo->prepare($sql)
				->execute(
					array(
						$data->id_usuario,
						$data->cod_salon,
						$data->fecha_reserva,
						$data->tiempo_inicio,
						$data->tiempo_final,
						$data->descripcion_reserva,
						$data->cantidad_reserva,

					)
				);
			$this->msg = "La reserva se ha guardado exitosamente!&icon=success&titulo=Exito!";
		} catch (Exception $e) {
			$line_error = $e;
			$this->msg = $line_error;
		}
		return $this->msg;
	}


	public function ObtenerSolicitudesUser($id_usuario)
	{

		try {
			$sql = "SELECT  cod_reservacion, usuario.nombre, cod_salon,fecha_reserva,tiempo_inicio,tiempo_final,descripcion,cantidad,estado 
			FROM reservacion INNER JOIN usuario ON usuario.id_usuario = reservacion.id_usuario
			WHERE usuario.id_usuario =?";
			$stm = $this->pdo
				->prepare($sql);
			$stm->execute(array($id_usuario));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	public function Calendario($salon)
	{

		try {
			//$sql = "SELECT fecha_Reserva, SUM(1) AS cantidad, cod_salon  FROM reservacion where cod_salon = ? GROUP BY fecha_Reserva";
			$sql = "SELECT cod_salon, fecha_reserva, tiempo_inicio, tiempo_final FROM reservacion WHERE cod_salon = ?";
			$stm = $this->pdo
				->prepare($sql);
			$stm->execute(array($salon));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}
