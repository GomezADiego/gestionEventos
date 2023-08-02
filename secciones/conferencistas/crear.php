<?php include("../../templates/header.php") ?>
<?php include("../../conexion.php");

if ($_POST) {
  $codigo = (isset($_POST["codigo"]) ? $_POST["codigo"] : "");
  $identificacion = (isset($_POST["identificacion"]) ? $_POST["identificacion"] : "");
  $nombre = (isset($_POST["nombre"]) ? $_POST["nombre"] : "");
  $apellido = (isset($_POST["apellido"]) ? $_POST["apellido"] : "");

  $objconexion = new conexion();
  $sentencia = $objconexion->connect()->prepare("INSERT INTO `conferencista` (`codigo`, `identificacion`, `nombre`, `apellido`) VALUES (:codigo, :identificacion, :nombre, :apellido);");
  $sentencia->bindParam(":codigo",$codigo);
  $sentencia->bindParam(":identificacion",$identificacion);
  $sentencia->bindParam(":nombre",$nombre);
  $sentencia->bindParam(":apellido",$apellido);
  $sentencia->execute(); 

  $mensaje = "Registro agregado";
    header("Location:index.php?mensaje=".$mensaje);


}



?>

<br>
<div class="card">
  <div class="card-header">
    datos del conferencista
  </div>
  <div class="card-body">
    <form action="" method="post">
      <div class="mb-3">
        <label for="codigo" class="form-label">Codigo:</label>
        <input type="number" class="form-control" name="codigo" id="codigo" aria-describedby="helpId"
          placeholder="">
      </div>
      <div class="mb-3">
        <label for="identificacion" class="form-label">Identificacion:</label>
        <input type="number" class="form-control" name="identificacion" id="identificacion" aria-describedby="helpId"
          placeholder="">
      </div>
      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="">
      </div>
      <div class="mb-3">
        <label for="apellido" class="form-label">Apellido:</label>
        <input type="text" class="form-control" name="apellido" id="apellido" aria-describedby="helpId" placeholder="">
      </div>
      <button type="submit" class="btn btn-success">Registrar</button>
      <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
    </form>
  </div>
  <div class="card-footer text-muted">
    Footer
  </div>
</div>

<?php include("../../templates/footer.php") ?>