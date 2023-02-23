<?php

class Pedido {
    private $id;
    private $usuario;
    private $fecha;
    private $precio;
    private $productos;
    private $estado;

    // Constructor de la clase
    public function __construct($usuario, $fecha, $productos, $estado) {
        $this->id = null; // Se inicializa en null para que se genere automáticamente al crear el pedido
        $this->usuario = $usuario;
        $this->fecha = $fecha;
        $this->productos = $productos;
        $this->estado = $estado;

        // Calcular el precio total del pedido a partir de los productos
        $this->precio = 0;
        foreach ($productos as $producto) {
            $this->precio += $producto->getPrecio();
        }
    }

    // Métodos para obtener y establecer los valores de los atributos
    public function getId() {
        return $this->id;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getProductos() {
        return $this->productos;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setProductos($productos) {
        $this->productos = $productos;
        $this->precio = 0;
        foreach ($productos as $producto) {
            $this->precio += $producto->getPrecio();
        }
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }
}

?>