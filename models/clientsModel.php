<?php

//El MODELO se conecta a la BBDD

//Definimos los métodos de la entidad de la BBDD
class Client {
    protected $name;
    protected $email;
    protected $password;

    

    public function __construct($row) {
        $this->name = $row["nombre"];
        $this->email = $row["email"];
        $this->password = $row["contraseña"];

   
    }

    public static function getAllClients() {
		require_once "../ddbb/connection.php";
		$sql = "SELECT * FROM clients";
		$connect = $connection->query($sql);
		$clients = array();

//me traigo los elementos de la base de datos y por cada fila me creo un nuevo elemento productos
        while ( $row = $connect->fetch_assoc()) {
            $client = new Client($row);
            $clients[] = $client;
        }

        return $clients;
    }

    public function getClientID() {
        return $this->id;
    }

    public function getClientName() {
        return $this->name;
    }

    public function getClientEmail() {
        return $this->email;
    }


}



//Aquí metemos las comprobaciones de los campos introducidos en el view
$errores = '';
$enviado=true;

if (isset($_POST['Enviar'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['contraseña'];
  
    if (!empty($name)) { //podemos combrobar con el apellido también

		$name = filter_var($name, FILTER_SANITIZE_SPECIAL_CHARS);//limpia o verifica que es un texto
	
		
	} else {
		$errores .= 'Por favor ingresa un nombre <br />';
		$enviado=false;
	}

	if (!empty($email)) { //comprobamos que es un email válido y que lo ha enviado
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$errores .= 'Por favor ingresa un correo valido <br />';
			$enviado=false;
		} 

	} else {
		$errores .= 'Por favor ingresa un correo <br />';
		$enviado=false;
	}

	if(empty($password)){

		$errores .= 'Por favor ingresa una contraseña <br />';
		$enviado=false;

	}

	else{
		$password = crypt($password,'');
	}

	if($enviado==false){ //lanzamos los errores que hayan podido ocurrir
		echo "$errores";
	}

	else{ //si todo ok


	//conectamos con la base de datos que se llama 'prueba_datos'	
				require "../ddbb/connection.php";
		
				$sql = "SELECT * FROM clients"; //Traemos los elementos de la base de datos
	
				$connect = $connection->query($sql); //La conexión se ejecuta
	
				if($connect->num_rows){ //Con este condicional vamos a comprobar que hay datos en la base de datos
		
		//El método fetch_assoc trae la información del elemento de cada fila que queramos
					$found=false;
					while($fila = $connect->fetch_assoc()){
				
						if($fila['email']==$email){
							$found=true;
						
							echo  "Hola ". $fila['name'] . ' este usuario ya se encuentra registrado<br />';
					 	break;
						}

					}
					if($found==false){
						
                        $sql1 = "INSERT INTO clients(id,nombre,email,contraseña) VALUES (NULL,'$name','$email','$password')";
                        $connect = $connection->query($sql1);
							
						if($connection->affected_rows >= 1){ 
							$var = "usuario registrado con exito";
         					echo "<script> alert('".$var."'); </script>";
									
						header('Location: ../controllers/loginCtrl.php');
						} 
					}
					else{
						
						header('Location: ../controllers/loginCtrl.php');
					

					}	
				}
			else {
				echo 'No hay datos en la base de datos';
			}
		}	
	
}


                