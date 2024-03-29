<?php 
  require 'php/conexion_sql_server.php';
  require 'php/createembarque.php';
  $sql = "SELECT id, cui FROM cliente";
  $statement = $conn->prepare($sql);
  $statement->execute();
  $clientes = $statement->fetchAll(PDO::FETCH_OBJ);

  $sql2 = "SELECT cod FROM resevas";
  $statement2 = $conn->prepare($sql2);
  $statement2->execute();
  $reservas = $statement2->fetchAll(PDO::FETCH_OBJ);

  $sql3 = "SELECT cod FROM vuelo";
  $statement3 = $conn->prepare($sql3);
  $statement3->execute();
  $vuelos = $statement3->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crear Embarque</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="index.jsp">Aeropuerto</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Inicio</a>
              </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Clientes
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="crearcliente.php">Crear Nuevo Cliente</a>
                <a class="dropdown-item" href="consultarcliente.php">Consultar Clientes</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Reservas<span class="sr-only">(current)</span>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="crearreserva.php">Crear Nueva Reserva</a>
                <a class="dropdown-item" href="consultarreserva.php">Consultar Reservas</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Embarques
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="crearembarque.php">Crear Nuevo Embarque</a>
                <a class="dropdown-item" href="consultarembarque.php">Consultar Embarques</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Aviones
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="crearavion.php">Registrar Nuevo Avion</a>
                <a class="dropdown-item" href="consultaravion.php">Consultar Aviones</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Aeropuertos
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="crearaeropuerto.php">Registrar Nuevo Aeropuerto</a>
                <a class="dropdown-item" href="consultaraeropuerto.php">Consultar Aeropuertos</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Vuelos
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="crearvuelo.php">Registrar Nuevo Vuelo</a>
                <a class="dropdown-item" href="consultarvuelo.php">Consultar Vuelos</a>
              </div>
            </li>      

            </ul>
          </div>
        </nav>
      <!-- Formulario para registro de nuevo cliente -->
  <form method="POST" name="crearCliente" enctype="multipart/form-data">
          <h2 class="text-primary"> Nuevo Embarque</h2>  
          <div class="form-group">
            <label for="CampoCui">CUI</label><br>
            <select name="cui_cliente" id="cui" class="form-control">
            <?php foreach($clientes as $cliente): ?> 
              <option value="<?= $cliente->cui; ?>"><?= $cliente->cui; ?></option>
            <?php endforeach; ?> 
            </select>
          </div>
          <div class="form-group">
            <label for="NombreCliente">Número de Reservación</label><br>
            <select name="reserva_cliente" id="reservacion" class="form-control" >
              <?php foreach($reservas as $reserva): ?>
                <option value="<?= $reserva->cod; ?>"><?= $reserva->cod; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="NombreCliente">Id Vuelo</label><br>
            <select name="id_vuelo" id="reservacion" class="form-control" >
              <?php foreach($vuelos as $vuelo): ?>
                <option value="<?= $vuelo->cod; ?>"><?= $vuelo->cod; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        <div class="form-group">
          <label for="campoPlazas">Precio</label>
          <input 
            type="text" 
            class="form-control" 
            id="plazas" 
            name="costo" 
            placeholder="4" 
            required
          >
      </div>
      <div class="form-group">
          <label for="campoPlazas">Fecha Compra</label>
          <input 
            type="date" 
            class="form-control" 
            id="plazas" 
            name="fechacompra" 
            required
          >
      </div>
          <div class="form-group">
              <!-- Boton para enviar los datos a la base de datos -->
              <a onclick="return confirm('Esta seguro de registrar el Embarque?')">
                <button type="submit" 
                value="Registrar Cliente" 
                name ="send" 
                class="btn btn-info">Registrar Embarque </button>
              </a>
          </div>
        </form>


    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>