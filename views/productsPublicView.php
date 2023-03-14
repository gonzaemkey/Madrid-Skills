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
   
  </style>
</head>
<body>

<div class="jumbotron">
  <div class="container text-center">
    <h1>Madrid Skills</h1>      
  </div>
</div>



    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="../controllers/loginCtrl.php">Volver al LogIn</a></li>
      </ul>
    </div>
</div>

   
    <?php foreach( $products as $product ) {//Para cada product del array products uso los métodos definidos en el MODELO para traerlos de la BBDD : ?>
                <ul class="product-info">
                    <li><span>Name:</span> <?= $product->getProductName();  ?></li>
                    <li><span>PVP:</span> <?= $product->getProductPvp();  ?></li>
                    <li><span>IVA:</span> <?= $product->getProductIVA();  ?></li></li>
                </ul>
                <?php  }?>
    

</body>
</html>