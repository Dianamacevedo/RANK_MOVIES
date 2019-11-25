<?php

$conexion= mysqli_connect('localhost','root','','rank_movies');

if ($conexion->connect_error) {
    die("conexion fallida: " . $conn->connect_error);
    echo "conexion exitosa";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1,maximum-scale=no"/>
  <link rel="stylesheet" href="jqm/jquery.mobile-1.3.2.min.css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="jquery/jquery-3.4.1.min.js"></script>
  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript">
    $('dodument').ready(function(){
      $(#lista).load("server/genero.php")
    })
  </script>

</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50" style="height:900px">

<nav class="navbar navbar-expand-md bg-info navbar-dark text-white fixed-top justify-content-center mr-sm-2">

<!---------------------encabezado-->

    <!-- Dropdown -->
  
   
    <form method="POST" >
      <select name = "GENERO" onchange='submit()' class="bg-info text-white mr-sm-5"  >
        <?php
          $sql = "select GENERO FROM GENERO";
          $rec = mysqli_query($conexion,$sql);
          while ($row=mysqli_fetch_array($rec))
          {
            echo "<option value='".$row['ID_GENERO']."' >";
            echo $row['GENERO'] ;
            echo "</option>";
          }
          ?>
      </select>  
    </form>

      <!-- END Dropdown --> 

<a class="navbar-brand mr-sm-5" href="#">  RANK-MOVIES</a>

<!-- Buscador -->
  <form class="form-inline" action="/action_page.php">
    <input class="form-control mr-sm-2" type="text" placeholder="Buscar">
    <button class="btn btn-dark" type="submit">BUSCAR</button>
  </form>

</nav>
<br>
  </ul>
</nav>
<br>

<!-------------------contenedor -->


<div class="container text-center">       
  <table id="lista"   class="table table-dark table-striped" >
    <thead>
      <tr>

        <th>ACUMULADO</th>
        <th>NOMBRE</th>
        <th>DESCRIPCION</th>
        <th>GENERO</th>
		</tr>
			
			<?php
			$sql=" SELECT D.VOTO,D.NOM_PELI,D.DESC_PELI,D.GENERO FROM 
( SELECT S.NOM_PELI,S.DESC_PELI,S.GENERO, CASE WHEN VT IS NOT NULL THEN TRUNCATE(S.VT/S.PG,0) END AS VOTO FROM ( SELECT P.NOM_PELI,p.DESC_PELI,g.GENERO, SUM(V.voto) AS VT, V.ID_PELICULA,COUNT(V.ID_PELICULA) AS PG FROM VOTO V INNER JOIN peliculas P ON (P.ID_PELICULAS = V.ID_PELICULA) INNER JOIN genero G ON (P.ID_GENERO = G.ID_GENERO) GROUP BY ID_PELICULA)S ) D ORDER BY VOTO DESC";
			$result = mysqli_query($conexion,$sql);
			
			while ($mostrar=mysqli_fetch_array($result) ){
				
				
				?>
			
			
		    <tr>
        <td><?php echo $mostrar['VOTO']?></td>
        <td href = "/voto.php"><?php echo $mostrar['NOM_PELI']?></td>
        <td><?php echo $mostrar['DESC_PELI']?></td>
        <td><?php echo $mostrar['GENERO']?></td>
		</tr>
		
		<?php
			}
		
		?>

		
		
      </tr>
    </thead>
  </table>
  <script src="jquery.min.js"></script>
<script src="ddtf.js"></script>
<script>
  $('#lista').ddTableFilter();
</script>
</div>





<nav class="navbar navbar-expand-sm bg-info navbar-dark text-white fixed-bottom justify-content-center">
  <a class="navbar-brand" href="#">Logo</a>
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="javascript:void(0)">ATRAS</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="javascript:void(0)">SIGUIENTE</a>
    </li>
  </ul>
</nav>



</body>
</html>