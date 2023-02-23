<?php
/**
* Modelo para el acceso a la base de datos y funciones CRUD (crear, leer, actualizar y borrar)

*/
class Usuario
{
	//atributos
	public $id;
	public $nick;
	public $nombre;
	public $apellido;
	public $contraseña;

	//constructor de la clase
	function __construct($id, $nick, $nombre, $apellido, $contraseña)
	{
		$this->id=$id;
		$this->nick=$nick;
		$this->nombre=$nombre;
		$this->apellido=$apellido;
		$this->contraseña=$contraseña;
	}

	//función para obtener todos los usuario
	public static function all(){
		$listausuario =[];
		$db=Db::getConnect();
		$sql=$db->query('SELECT * FROM usuario');

		// carga en la $listausuario cada registro desde la base de datos
		foreach ($sql->fetchAll() as $usuario) {
			$listausuario[]= new Usuario($usuario['id'],$usuario['nick'], $usuario['nombre'],$usuario['apellido'], $usuario['contraseña']);
		}
		return $listausuario;
	}

	//la función para registrar un usuario
	public static function save($usuario){
			$db=Db::getConnect();
			$insert=$db->prepare('INSERT INTO usuario VALUES(NULL, :nick, :nombre, :apellido, :contraseña)');
			$insert->bindValue('nick',$usuario->nick);
			$insert->bindValue('nombre',$usuario->nombre);
			$insert->bindValue('apellido',$usuario->apellido);
			$insert->bindValue('contraseña',$usuario->contraseña);
			$insert->execute();
		}

	//la función para actualizar 
	public static function update($usuario){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE usuario SET nick=:nick, nombre=:nombre, apellido=:apellido, contraseña=:contraseña WHERE id=:id');
		$update->bindValue('id',$usuario->id);
		$update->bindValue('nick',$usuario->nick);
		$update->bindValue('nombre',$usuario->nombre);
		$update->bindValue('apellido',$usuario->apellido);
		$update->bindValue('contraseña',$usuario->contraseña);
		$update->execute();
	}

	// la función para eliminar por el id
	public static function delete($id){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE FROM usuario WHERE ID=:id');
		$delete->bindValue('id',$id);
		$delete->execute();
	}

	//la función para obtener un usuario por el id
	public static function getById($id){
		//buscar
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM usuario WHERE ID=:id');
		$select->bindValue('id',$id);
		$select->execute();
		//asignarlo al objeto usuario
		$usuarioDb=$select->fetch();
		$usuario= new Usuario($usuarioDb['id'],$usuarioDb['nick'],$usuarioDb['nombre'],$usuarioDb['apellido'],$usuarioDb['contraseña']);
		return $usuario;
	}
}
?>