<?php



//Definimos los métodos de la entidad de la BBDD
class Product {
    protected $name;
    protected $pvp;
    protected $IVA;
    

    public function __construct($row) {
        $this->name = $row["name"];
        $this->pvp = $row["pvp"];
        $this->IVA = $row["IVA"];
   
    }

    public static function getAllProducts() {
        require_once "../ddbb/connection.php";
		$sql = "SELECT * FROM products";
		$connect = $connection->query($sql);
		$products = array();


//me traigo los elementos de la base de datos y por cada fila me creo un nuevo elemento productos
        while ($row = $connect->fetch_assoc()) {
            $product = new Product($row);
            $products[] = $product;
        }

        return $products;
    }

    public function getProductName() {
        return $this->name;
    }

    public function getProductCode() {
        return $this->code;
    }

    public function getProductPvp() {
        return $this->pvp;
    }

    public function getProductIVA() {
        return $this->IVA;
    }
}

$errores = '';
$enviado=true;


if (isset($_POST['SubirProducto'])) {
    $name = $_POST['name'];
    $pvp = $_POST['pvp'];
    $IVA = $_POST['IVA'];

    if (!empty($name)) { //podemos combrobar con el apellido también

		$name = filter_var($name, FILTER_SANITIZE_SPECIAL_CHARS);//limpia o verifica que es un texto
	
		
	} else {
		$errores .= 'Por favor ingresa un nombre <br />';
		$enviado=false;
	}

    if(empty($pvp)){
        $errores .= "Ingresa un precio";
        $enviado = false;
    }

    if(empty($IVA)){
        $errores .= "Ingresa un IVA";
        $enviado = false;
    }

    if($enviado==false){ //lanzamos los errores que hayan podido ocurrir
		echo "$errores";
	}
    else{

				require "../ddbb/connection.php";
		
				$sql = "SELECT * FROM products"; //Traemos los elementos de la base de datos
	
				$connect = $connection->query($sql); //La conexión se ejecuta
	
				if($connect->num_rows){ //Con este condicional vamos a comprobar que hay datos en la base de datos
		
		//El método fetch_assoc trae la información del elemento de cada fila que queramos
					$found=false;
					while($fila = $connect->fetch_assoc()){
				
						if($fila['name']==$name){
							$found=true;
						
							echo  "El producto ". $fila['name'] . ' ya se encuentra registrado<br />';
					 	break;
						}

					}
					if($found==false){
						
                        $sql1 = "INSERT INTO products(code,name,pvp,IVA) VALUES (NULL,'$name','$pvp','$IVA')";
                        $connect = $connection->query($sql1);
							
						if($connection->affected_rows >= 1){ 
									echo "Producto registrado con éxito.";
									
						} 
					}
	
				}
			else {
				echo 'No hay datos en la base de datos';
			}
		}	


}

                