<?php

 //El MODELO se conecta a la BBDD


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
		$sql = "SELECT name, pvp, IVA FROM products";
		$connect = $connection->query($sql);
		$products = array();


//me traigo los elementos de la base de datos y por cada fila me creo un nuevo elemento productos
        while ( $row = $connect->fetch_assoc() ) {
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

?>