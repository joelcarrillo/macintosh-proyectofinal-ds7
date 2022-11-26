<?php

require_once 'model/db.php';

class Salones
{
	private $pdo;
	public $idFacultad;


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

	public function nombreFacultad($idFacultad){

        try 
		{
			$stm = $this->pdo
                        ->prepare("SELECT nombre FROM facultad WHERE cod_facultad = ?");
			$stm->execute(array($idFacultad));
				return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}

    }

    public function ObtenerSalonesFacultad($idFacultad){

        try 
		{
			$stm = $this->pdo
                        ->prepare("SELECT salon.cod_salon AS salon, 
								   piso.numero_piso AS numero_piso, 
								   numero_edificio, 
								   facultad.nombre AS nombre_facultad FROM salon 
								   INNER JOIN piso ON salon.cod_piso = piso.cod_piso 
								   INNER JOIN facultad ON salon.cod_facultad = facultad.cod_facultad 
								   WHERE salon.cod_facultad = ?");

			$stm->execute(array($idFacultad));
				return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}

    }

	public function ObtenerHorasGenerales()
	{
		try 
		{
			$stm = $this->pdo->prepare("SELECT * FROM horas_general");
			          
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	
	
	public function ObtenerHorariosSalones($cod_salon)
	{
		try 
		{
			$stm = $this->pdo->prepare("SELECT hs.id, hs.id_salon, hs.id_hora_general,hs.dia_semana,ds.dia_semana as nombre_semana FROM horarios_salon as hs INNER JOIN dias_semana as ds ON hs.dia_semana = ds.id WHERE id_salon = ?");
			$stm->execute(array($cod_salon));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function ObtenerDiasSemana()
	{
		try 
		{
			$stm = $this->pdo->prepare("SELECT * FROM dias_semana");
			          
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}