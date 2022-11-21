<?php

require_once 'model/db.php';

class Salones
{
	private $pdo;
	private $msg;
    
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

    public function ObtenerSalonesFacultad($idFacultad){

        try 
		{
			$stm = $this->pdo
                        ->prepare("SELECT * FROM salon WHERE cod_facultad = ?");

			$stm->execute(array($idFacultad));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}

    }


}