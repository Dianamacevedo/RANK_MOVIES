<?php

$conexion= mysqli_connect('localhost','root','','rak_moviles');
?>
<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1,maximum-scale=no"/>

<link rel="stylesheet" href="jqm/jquery.mobile-1.3.2.min.css"/>
  <script src="jquery/jquery-3.4.1.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
                               if (data.status == 'ok') {
                            $('#ID_GENERO').text(data.result.ID);
                            $('#NOM_PELI').text(data.result.NOMBRE);
                            $('#DESC_PELI').text(data.result.DESCRIPCION);
                                                      
                            $('.user-content').slideDown();
                        } else {
                            $('.user-content').slideUp();
                            alert("Genero no encon.");
                        }
                    }
                });
            });
        });
    </script>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50" style="height:1500px">

<nav class="navbar navbar-expand-md bg-info navbar-dark text-white fixed-top justify-content-center ">
    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle bg-info text-white" href="#" id="navbardrop" data-toggle="dropdown">Seleccione Genero</a>
      <div class="dropdown-menu">
        <a href="aventura.php"  center class=" dropdown-item">AVENTURA</a>
        <a href="comedia.php"  center class=" dropdown-item">COMEDIA</a>
        <a href="drama.php"  center class=" dropdown-item">DRAMA</a>
        <a href="terror.php"  center class=" dropdown-item">TERROR</a>
        <a href="ciencia.php"  center class=" dropdown-item">CIENCIA FICCION</a>
        <a href="accion.php"  center class=" dropdown-item">ACCION</a>
        <a href="infantiles.php"  center class=" dropdown-item">INFANTILES</a>
        <a href="OTROS.php"  center class=" dropdown-item">OTROS</a>
      </div>
    </li>

<a class="navbar-brand" href="#">RANK-MOVIES</a>

  <form class="form-inline" action="/action_page.php">
    <input class="form-control mr-sm-2" type="text" placeholder="Search">
    <button class="btn btn-dark" type="submit">Search</button>
  </form>
</nav>
<br>
  </ul>
</nav>
<br>



<div class="container text-center">       
  <table class="table table-dark table-striped">
    <thead>
      <tr>
        <th>DRAMA</th>
		
		
        <td>ID</td>
        <td>NOMBRE</td>
        <td>DESCRIPCION</td>
        
		</tr>
			
			<?php

			$sql="select * from peliculas WHERE ID_GENERO = '3'";
			$result = mysqli_query($conexion,$sql);
			
			while ($mostrar=mysqli_fetch_array($result) ){
				
				
				?>
			
			
		    <tr>
        <td><?php echo $mostrar['ID_PELICULAS']?></td>
        <td><?php echo $mostrar['NOM_PELI']?></td>
        <td><?php echo $mostrar['DESC_PELI']?></td>
        <td><?php echo $mostrar['ID_GENERO']?></td>
		</tr>
		
		<?php
			}
		
		?>

		
		
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
</div>




<nav class="navbar navbar-expand-sm bg-info navbar-dark text-white fixed-bottom justify-content-center">
  <a class="navbar-brand" href="#">Logo</a>
  <ul class="navbar-nav">
    <li class="nav-item">
      <a href="index.php"  center class=" btn-primary btn-lg">INICIO</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="javascript:void(0)">SIGUIENTE</a>
    </li>
  </ul>
</nav>



</body>
</html>