<?php

require_once "../ddbb/connection.php"; //El MODELO se conecta a la BBDD


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
        $db = DBConexion::connection();
        $data = $db->query("SELECT name, pvp, IVA FROM products");
        $products = array();


//me traigo los elementos de la base de datos y por cada fila me creo un nuevo elemento productos
        while ( $row = $data->fetch_assoc() ) {
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


if (isset($_POST['SubirProducto'])) {
    $name = $_POST['name'];
    $pvp = $_POST['pvp'];
    $IVA = $_POST['IVA'];

 
    $db = DBConexion::connection();
    $data = $db->query("INSERT INTO products(code,name,pvp,IVA) VALUES (NULL,'$name','$pvp','$IVA')");
    $products = array();
                            
                        
                                    echo "hola, has registrado el producto $name con éxito.";
                        
                    }


                