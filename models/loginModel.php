<?php

$errores = '';
$enviado=true;

if (isset($_POST['Login'])) {
    
    $email = $_POST['email'];
    $password = $_POST['contraseña'];

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


        include '..\ddbb\connection.php';

        $sql = "SELECT * FROM clients";

			$connect = $connection->query($sql);

			if($connect->num_rows){ //Con este condicional vamos a comprobar que hay datos en la base de datos
		
				//El método fetch_assoc trae la información del elemento de cada fila que queramos
							$found=false;
							while($fila = $connect->fetch_assoc()){
						
								if($fila['email']==$email && $fila['contraseña']==$password){

							 		if($fila['email']=='admin@admin.com'){

										echo  'Bienvenido, administrador.<br />';

									
									//Aquí tiene que ir la redireccion a la nueva página y al inicio.sesion.php
									
									header('Location: ../controllers/productsCtrl.php');


							
								 	break;

									} else

									$found=true;
								
									echo  'Bienvenido<br />';

							
									//Aquí tiene que ir la redireccion a la nueva página y al inicio.sesion.php
									
									header('Location: productsPublicCtrl.php');


							
								 	break;

								}

							} if($found==false){

								echo 'Este email no está registrado o la contraseña es incorrecta';

							}
						
			}
		}

    }