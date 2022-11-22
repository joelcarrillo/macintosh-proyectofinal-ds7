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
                        ->prepare("SELECT salon.cod_salon AS salon, piso.numero_piso AS numero_piso, numero_edificio, facultad.nombre AS nombre_facultad FROM salon INNER JOIN piso ON salon.cod_piso = piso.cod_piso INNER JOIN facultad ON salon.cod_facultad = facultad.cod_facultad WHERE salon.cod_facultad = ?");
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
			$stm = $this->pdo->prepare("SELECT * FROM horarios_salon WHERE id_salon = ?");
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

	public function Salones(){

        $idFac = $_GET['id_facultad'];

        $nombreFacultad = new Salones();
        $nombreFacultad = $this->modeloSalones->nombreFacultad($idFac);

        $referenciaSalones = new Salones();
        $referenciaSalones = $this->modeloSalones->ObtenerSalonesFacultad($idFac);
        
        //Le paso los datos a la vista
        require("view/elegirSalon.php");

    }


    public function Horarios(){

        $cod_salon = $_GET['cod_salon'];

        $listaHorasGenerales = new Usuario();
        $listaHorasGenerales = $this->modeloSalones->ObtenerHorasGenerales();

        
        $listaHorarioSalones = new Usuario();
        $listaHorarioSalones = $this->modeloSalones->ObtenerHorariosSalones($cod_salon);

        $listaDiasSemana = new Usuario();
        $listaDiasSemana = $this->modeloSalones->ObtenerDiasSemana();
        //Le paso los datos a la vista
        require("view/horarios.php");

    }


}