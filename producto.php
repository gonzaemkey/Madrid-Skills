<?php

class Producto {
    private $id;
    private $nombre;
    private $precio;
    private $categoria;
    private $stock;

    // Constructor de la clase
    public function __construct($nombre, $precio, $categoria, $stock) {
        $this->id = null; // Se inicializa en null para que se genere automáticamente al agregar un nuevo producto
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->categoria = $categoria;
        $this->stock = $stock;
    }

    // Métodos para obtener y establecer los valores de los atributos
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function getStock() {
        return $this->stock;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public function setStock($stock) {
        $this->stock = $stock;
    }
}


?>