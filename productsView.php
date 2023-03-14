<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/style.css">
    <title>products</title>
</head>
<body>
    <main class="wrapper">
        <section class="products-container">
            <header>
                <h1>List of products</h1>
            </header>
            <?php foreach( $products as $product ) {//Para cada product del array products uso los métodos definidos en el MODELO para traerlos de la BBDD : ?>
                <ul class="product-info">
                    <li><span>Name:</span> <?= $product->getProductName();  ?></li>
                    <li><span>PVP:</span> <?= $product->getProductPvp();  ?></li>
                    <li><span>IVA:</span> <?= $product->getProductIVA();  ?></li></li>
                </ul>
                <?php  }?>

                
        
                <H1> subir productos </H1> <!-- Titulo de la web -->

		
	<form action=" " name="formulario" method="post"> <!-- Usamos el método post para recoger lo que seleccione el usuario en unas variables -->

<!-- Placeholder es lo que le aparece al usuario en la web,
 name es como se llama la variable que recogeremos con post y type el tipo de datos que introduce el usuario -->
		<!-- precio tipo float -->
		<input type="text" placeholder="name:" name="name" id="name">
		<br>
        <input type="int" placeholder="pvp:" name="pvp" id="pvp">
		<br>		
        <input type="int" placeholder="IVA:" name="IVA" id="IVA">
		<br>
	
	
		<input type="submit" name="SubirProducto" class="btn btn-primary" value="SubirProducto">  <!-- boton para enviar los datos -->
        
	</form>
    </div>
	



               
            
        </section>
    </main>
</body>
</html>