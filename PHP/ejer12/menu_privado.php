<?php
session_start();


if(isset($_REQUEST["logout"])){
  session_destroy(); 
  setcookie("password",0,1);
  setcookie("nomusuari",0,1);
  header('Location:login.php'); 
}


if(((isset($_SESSION["pass"]) 
  && $_SESSION["pass"]=='700c8b805a3e2a265b01c77614cd8b21'
  && isset($_SESSION["nom"]) 
  && $_SESSION["nom"]=='nando')) ||

  ((isset($_COOKIE["password"]) 
    && isset($_COOKIE["nomusuari"]) 
    && $_COOKIE["password"]=='700c8b805a3e2a265b01c77614cd8b21' 
    && $_COOKIE["nomusuari"]=='nando'))){

  if(isset($_SESSION["nom"])){
    $_nombre=$_SESSION["nom"];
  } else{
    $_nombre=$_COOKIE["nomusuari"];
  }   


  
  

  ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <title>Area privada</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="lib/css/bootstrap.min.css">
    <script src="lib/js/jquery-3.3.1.min.js"></script>
    <script src="lib/js/bootstrap.min.js"></script>

  </head>
  <body>
    <div class="container">
      <nav class="navbar navbar-primary" role="navigation">
  <!-- El logotipo y el icono que despliega el menú se agrupan
   para mostrarlos mejor en los dispositivos móviles -->
   <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse"
    data-target=".navbar-ex1-collapse">
    <span class="sr-only">Desplegar navegación</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
  <a class="navbar-brand" href="#">FakeBook</a>
</div>

  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
   otro elemento que se pueda ocultar al minimizar la barra -->
   <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li><a href="menu_privado.php">Publicaciones</a></li>
      <li><a href="publicacion.php">Nueva publicación</a></li>
      <li><a href="#">Eliminar publicación</a></li>
      
    </ul>

    
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><?php  print_r($_nombre)?></a></li>
      <li><a href="menu_privado.php?logout">Logout</a></li>
      

    </ul>
  </li>
</ul>
</div>
</nav>
</div>
<div class="container"> 
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Título del panel con estilo h3</h3>
    </div>
    <div class="panel-body">
      <p>
        Si ya has estado en Montserrat, sabrás que es uno de los lugares más bonitos de Cataluña (Si no, no esperes más, y ¡reserva ya uno de nuestros tours!). Se dice que es una montaña mágica, donde se unen la naturaleza, la cultura, la historia y la religión. El monasterio Benedictino, que es la parte de la montaña más visitada en la mayoría de los tours, es considerado un hito. Sin embargo, lo que no saben la mayoría de aquellas personas que visitan Montserrat es que también es un Parque Natural con muchos caminos para hacer senderismo
      </p>
      <div class="panel-footer">
      <div class="form-group">
                   <label class="control-label" class="has-success">Comentarios:</label> 
                   <input class="form-control" type="text" name="email" value="">
                   
                </div>

      </div>
      <p>
        <input type="submit" name="contador" value="Likes 12" class="btn btn-primary" class="badge badge-light">
      </p>
    </div>
  </div>

  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Título del panel con estilo h3</h3>
    </div>
    <div class="panel-body">
      <p>
        Si ya has estado en Montserrat, sabrás que es uno de los lugares más bonitos de Cataluña (Si no, no esperes más, y ¡reserva ya uno de nuestros tours!). Se dice que es una montaña mágica, donde se unen la naturaleza, la cultura, la historia y la religión. El monasterio Benedictino, que es la parte de la montaña más visitada en la mayoría de los tours, es considerado un hito. Sin embargo, lo que no saben la mayoría de aquellas personas que visitan Montserrat es que también es un Parque Natural con muchos caminos para hacer senderismo
      </p>
      <img src="../imgs/flor.jpg">
      <p>
        <input type="submit" name="contador" value="Likes 23" class="btn btn-primary" class="badge badge-light">
      </p>
    </div>
  </div>
</div>



</body>
<div class="container">
  <div class="panel panel-danger">
    <div class="panel-footer">
      <label class="control-label" class="has-success">Información legal
      </label> 
    </div>
  </div>
</div>
</html>
<?php
}else{
  header('Location:login.php');
}

?>