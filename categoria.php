<?php

class Categoria {
    private $id;
    private $nombre;
    private $categoria_padre;

    // Constructor de la clase
    public function __construct($id, $nombre, $categoria_padre = null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->categoria_padre = $categoria_padre;
    }

    // Métodos para obtener y establecer los valores de los atributos
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getCategoriaPadre() {
        return $this->categoria_padre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setCategoriaPadre($categoria_padre) {
        $this->categoria_padre = $categoria_padre;
    }
}

?>