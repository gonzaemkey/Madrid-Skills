<?php

// El CONTROLADOR llama al MODELO 
require_once "../models/productsModel.php";

//Le pasa la información de la BBDD a la vista, a través del siguiente array $products donde están los elementos de la BBDD
$products = Product::getAllProducts();

// El CONTROLADOR llama a la VISTA
require_once "../views/productsView.php";

