<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    <style>
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    .jumbotron {
      background: black;
      color: white;
      margin-bottom: 0;
    }
   
    footer {
      background-color: black;
      color: white;
      padding: 25px;
    }
  </style>
</head>
<body>

<div class="jumbotron">
  <div class="container text-center">
    <h1>Madrid Skills</h1>      
  </div>
</div>


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="../controllers/productsPublicCtrl.php">Ir a la Pagina Inicial</a></li>
      </ul>
    </div>
</div>

   



                
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
    

</body>
</html>