<?php

require_once 'model/db.php';

class Reservas
{
	private $pdo;


	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Db::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}


    public function ObtenerReservasActivas(){

        try 
		{
			$stm = $this->pdo
                        ->prepare("SELECT reservacion.cod_reservacion AS codigo_reserva, usuario.correo AS usuario, salon.cod_salon AS salon, tiempo_inicio, tiempo_final, reservacion.descripcion AS breve_descripcion, reservacion.cantidad AS cantidad_equipos, estado.estado AS estado FROM reservacion INNER JOIN usuario ON reservacion.id_usuario = usuario.id_usuario INNER JOIN salon ON reservacion.cod_salon = salon.cod_salon INNER JOIN estado ON reservacion.estado = estado.id_estado;");
			$stm->execute(array());
				return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}

    }

	public function GuardarReserva(reservas $data){
		try 
		{
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
		$this->msg="La reserva se ha guardado exitosamente!&icon=success&titulo=Exito!";
		} catch (Exception $e) 
		{
				$line_error = $e;
				$this->msg= $line_error;
			
		}
		return $this->msg;
	}

}