<?php
class Ubicacion
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

	public function ConsultarProvincia()
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM provincia");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function ConsultarDistrito()
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM distritos");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}


}