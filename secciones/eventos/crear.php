<?php include("../../templates/header.php") ?>
<?php include("../../conexion.php");

$espacioSolicitado = array();
$implementos = array();

if ($_POST) {
  $codigo = (isset($_POST["codigo"]) ? $_POST["codigo"] : "");
  $nombre = (isset($_POST["nombre"]) ? $_POST["nombre"] : "");
  $dependencia = (isset($_POST["dependencia"]) ? $_POST["dependencia"] : "");
  $tipoEvento = (isset($_POST["tipoEvento"]) ? $_POST["tipoEvento"] : "");
  $fecha = (isset($_POST["fecha"]) ? $_POST["fecha"] : "");
  $codConferencista = (isset($_POST["codConferencista"]) ? $_POST["codConferencista"] : "");
  
  $espacioSolicitado = (isset($_POST["espacioSolicitado"]) ? $_POST["espacioSolicitado"] : "");
  $allData = implode(", ",$espacioSolicitado);

  $implementos = (isset($_POST["implementos"]) ? $_POST["implementos"] : "");
  $allData2 = implode(", ",$implementos);

  $objconexion = new conexion();
  $sentencia = $objconexion->connect()->prepare("INSERT INTO `evento` (`codigo`, `nombre`, `dependencia`, `tipoEvento`, `fecha`, `codConferencista`, `espacioSolicitado`, `implementos`) VALUES (:codigo, :nombre, :dependencia, :tipoEvento, :fecha, :codConferencista, :allData, :allData2);");
  $sentencia->bindParam(":codigo",$codigo); //reemplaza los datos actuales por los generales
  $sentencia->bindParam(":nombre",$nombre);
  $sentencia->bindParam(":dependencia",$dependencia);
  $sentencia->bindParam(":tipoEvento",$tipoEvento);
  $sentencia->bindParam(":fecha",$fecha);
  $sentencia->bindParam(":codConferencista",$codConferencista);
  $sentencia->bindParam(":allData",$allData);
  $sentencia->bindParam(":allData2",$allData2);
  $sentencia->execute(); 

  $mensaje = "Registro agregado";
  header("Location:index.php?mensaje=".$mensaje);


}
$objconexion = new conexion();
$consultarConferencista = $objconexion->consultar2("SELECT * FROM `conferencista`");
?>

<br>
<div class="card">
    <div class="card-header">
        datos del evento
    </div>
    <div class="card-body">
        <form action="" method="post">
            <div class="mb-3">
                <label for="codigo" class="form-label">Codigo:</label>
                <input type="text" class="form-control" name="codigo" id="codigo" aria-describedby="helpId"
                    placeholder="">
            </div>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId"
                    placeholder="">
            </div>

            <div class="mb-3">
                <label for="dependencia" class="form-label">Dependencia:</label>
                <select class="form-select" name="dependencia" id="dependencia">
                    <option selected value="bienestar">bienestar</option>
                    <option value="coordinacion academica">coordinacion academica</option>
                    <option value="gestion del cambio">gestion del cambio</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="tipoEvento" class="form-label">Tipo de evento:</label>
                <select class="form-select" name="tipoEvento" id="tipoEvento">
                    <option selected value="simposium">simposium</option>
                    <option value="congreso">congreso</option>
                    <option value="curso">curso</option>
                    <option value="taller">taller</option>
                    <option value="foro">foro</option>
                    <option value="convencion">convencion</option>
                    <option value="seminario">seminario</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha:</label>
                <input type="date" class="form-control" name="fecha" id="fecha" aria-describedby="helpId"
                    placeholder="">
            </div>

            <div class="mb-3">
                <label for="codConferencista" class="form-label">conferencista:</label>
                <select class="form-select" name="codConferencista" id="codConferencista">
                <?php foreach($consultarConferencista as $consultarConferencistas) { ?>
                    <option value="<?php echo $consultarConferencistas['codigo'] ?>"><?php echo $consultarConferencistas['nombre'] ." ". $consultarConferencistas['apellido'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="espacioSolicitado" class="form-label">Espacio solicitado:</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="espacioSolicitado[]"value="biblioteca" id="checkbox1" checked>
                    <label class="form-check-label" for="checkbox1">biblioteca</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="espacioSolicitado[]" value="auditorio" id="checkbox2">
                    <label class="form-check-label" for="checkbox2">auditorio</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="espacioSolicitado[]" value="aula" id="checkbox3">
                    <label class="form-check-label" for="checkbox3">aula</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="espacioSolicitado[]" value="externo" id="checkbox4">
                    <label class="form-check-label" for="checkbox4">externo</label>
                </div>
            </div>

            <div class="mb-5">
                <label for="implementos" class="form-label">Implementos requeridos:</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="implementos[]" value="videobeam" id="checkbox1" checked>
                    <label class="form-check-label" for="checkbox1">videobeam</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="implementos[]" value="computadores" id="checkbox2">
                    <label class="form-check-label" for="checkbox2">computadores</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="implementos[]" value="proyectores" id="checkbox3">
                    <label class="form-check-label" for="checkbox3">proyectores</label>
                </div>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-success">Registrar</button>
                <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
            </div>
        </form>

    </div>
    <div class="card-footer text-muted">
        Footer
    </div>
</div>

<?php include("../../templates/footer.php") ?>