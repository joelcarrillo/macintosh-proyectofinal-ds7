<?php

require_once 'model/db.php';

class Usuario
{
	private $pdo;
	private $msg;

	public $id;
	public $nombre;
	public $apellido;
	public $correo;
	public $pass;
	public $foto;


	public function __CONSTRUCT()
	{
		try {
			$this->pdo = Db::StartUp();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}


	public function Registrar(usuario $data)
	{
		try {
			$sql = "INSERT INTO usuario (correo,nombre,apellido,pass,telefono) 
		        VALUES (?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql)
				->execute(
					array(
						$data->correo,
						$data->nombre,
						$data->apellido,
						$data->pass,
						$data->telefono,
					)
				);
			$this->msg = "Su registro se ha guardado exitosamente!&t=text-success";
		} catch (Exception $e) {
			if ($e->errorInfo[1] == 1062) { // error 1062 es de duplicación de datos 
				$this->msg = "Correo electrónico ya está registrado en el sistema&t=text-danger";
			} else {
				$this->msg = "Error al guardar los datos&t=text-danger";
			}
		}
		return $this->msg;
	}

	public function Consultar(usuario $data)
	{
		try {
			$stm = $this->pdo->prepare("SELECT * FROM usuario WHERE correo = ? AND pass=?");
			$stm->execute(array($data->correo, $data->pass));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}


	public function Obtener($id)
	{
		try {
			$stm = $this->pdo
				->prepare("SELECT * FROM usuario WHERE id_usuario = ?");


			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function ObtenerTodosLosUsuarios()
	{
		try {
			$stm = $this->pdo->prepare("SELECT * FROM usuario");

			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Actualizar(usuario $data)
	{
		try {
			$sql = "UPDATE usuario SET nombre = ?, apellido = ?, telefono = ? , foto = ? 
		        WHERE id_usuario = ?";

			$this->pdo->prepare($sql)
				->execute(
					array(
						$data->nombre,
						$data->apellido,
						$data->telefono,
						$data->foto,
						$data->id_usuario
					)
				);
			$this->msg = "Su registro se ha Actualizado exitosamente!&t=text-success";
		} catch (Exception $e) {
			$this->msg = "Error al actualizar los datos&t=text-danger";
		}
		return $this->msg;
	}

	public function BorrarUsuario(usuario $data)
	{
		try {
			$sql = "DELETE FROM usuario WHERE id_usuario = ?";

			$this->pdo->prepare($sql)
				->execute(
					array(
						$data->id
					)
				);

			$this->msg = "Su registro se ha Eliminado exitosamente!&t=text-success";
		} catch (Exception $e) {
			$this->msg = "Error al actualizar los datos&t=text-danger";
		}
		return $this->msg;
	}


	public function ConsultarEmail($email)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM usuario WHERE correo = ?");
			$stm->execute(array($email));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function ConsultarHash($email, $hash)
	{
		try {
			$stm = $this->pdo->prepare("SELECT * FROM usuario WHERE correo = ? AND restablecer = ?");
			$stm->execute(array($email, $hash));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function IncluirHash(usuario $data)
	{
		try {
			$sql = "UPDATE usuario SET restablecer = ? WHERE correo = ?";

			$this->pdo->prepare($sql)
				->execute(
					array(
						$data->restablecer,
						$data->correo
					)
				);
			$this->msg = "ok";
		} catch (Exception $e) {
			$this->msg = "Error";
		}
		return $this->msg;
	}

	public function ActualizarContra(usuario $data)
	{
		try {
			$sql = "UPDATE usuario SET pass = ? WHERE correo = ?";

			$this->pdo->prepare($sql)
				->execute(
					array(
						$data->pass,
						$data->correo
					)
				);
			$this->msg = "Su cambio de contraseña se ha ejecutado exitosamente!&t=text-success";
		} catch (Exception $e) {
			$this->msg = "Error al cambiar contraseña&t=text-danger";
		}
		return $this->msg;
	}
}
