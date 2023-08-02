<?php include("../../templates/header.php") ?>
<?php include("../../conexion.php");

if ($_POST) {
  $cedula = (isset($_POST["cedula"]) ? $_POST["cedula"] : "");
  $fechaIngreso = (isset($_POST["fechaIngreso"]) ? $_POST["fechaIngreso"] : "");
  $horaIngreso = (isset($_POST["horaIngreso"]) ? $_POST["horaIngreso"] : "");
  $codEvento = (isset($_POST["codEvento"]) ? $_POST["codEvento"] : "");

  $objconexion = new conexion();
  $sentencia = $objconexion->connect()->prepare("INSERT INTO `asistencia` (`cedula`, `fechaIngreso`, `horaIngreso`, `codEvento`) VALUES (:cedula, :fechaIngreso, :horaIngreso, :codEvento);");
  $sentencia->bindParam(":cedula",$cedula);
  $sentencia->bindParam(":fechaIngreso",$fechaIngreso);
  $sentencia->bindParam(":horaIngreso",$horaIngreso);
  $sentencia->bindParam(":codEvento",$codEvento);
  $sentencia->execute(); 

  $mensaje = "Registro agregado";
  header("Location:index.php?mensaje=".$mensaje);


}

$objconexion = new conexion();
$consultarEvento = $objconexion->consultar2("SELECT * FROM `evento`");


?>

<br>
<div class="card">
    <div class="card-header">
        datos de la asistencia
    </div>
    <div class="card-body">
        <form action="" method="post">
            <div class="mb-3">
                <label for="cedula" class="form-label">Cedula:</label>
                <input type="number" class="form-control" name="cedula" id="cedula" aria-describedby="helpId"
                    placeholder="">
            </div>
            <div class="mb-3">
                <label for="fechaIngreso" class="form-label">Fecha de ingreso:</label>
                <input type="date" class="form-control" name="fechaIngreso" id="fechaIngreso" aria-describedby="helpId"
                    placeholder="">
            </div>
            <div class="mb-3">
                <label for="horaIngreso" class="form-label">Hora de ingreso:</label>
                <input type="time" class="form-control" name="horaIngreso" id="horaIngreso" aria-describedby="helpId"
                    placeholder="">
            </div>
            <div class="mb-3">
                <label for="codEvento" class="form-label">Cod evento:</label>
                <select class="form-select" name="codEvento" id="codEvento">
                    <?php foreach ($consultarEvento as $consultarEventos) { ?>
                        <option value="<?php echo $consultarEventos['codigo'] ?>"><?php echo $consultarEventos['nombre'] ?>
                        </option>
                    <?php } ?>
                </select>
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