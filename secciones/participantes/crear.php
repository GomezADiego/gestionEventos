<?php include("../../templates/header.php") ?>
<?php include("../../conexion.php");

if ($_POST) {
  $codigo = (isset($_POST["codigo"]) ? $_POST["codigo"] : "");
  $nombre = (isset($_POST["nombre"]) ? $_POST["nombre"] : "");
  $apellido = (isset($_POST["apellido"]) ? $_POST["apellido"] : "");
  $documento = (isset($_POST["documento"]) ? $_POST["documento"] : "");
  $telefono = (isset($_POST["telefono"]) ? $_POST["telefono"] : "");
  $tipoParticipante = (isset($_POST["tipoParticipante"]) ? $_POST["tipoParticipante"] : "");
  $codEvento = (isset($_POST["codEvento"]) ? $_POST["codEvento"] : "");
  
  $objconexion = new conexion();
  $sentencia = $objconexion->connect()->prepare("INSERT INTO `participantes` (`codigo`, `nombre`, `apellido`, `documento`, `telefono`, `tipoParticipante`, `codEvento`) VALUES (:codigo, :nombre, :apellido, :documento, :telefono, :tipoParticipante, :codEvento);");
  $sentencia->bindParam(":codigo",$codigo); //reemplaza los datos actuales por los generales
  $sentencia->bindParam(":nombre",$nombre);
  $sentencia->bindParam(":apellido",$apellido);
  $sentencia->bindParam(":documento",$documento);
  $sentencia->bindParam(":telefono",$telefono);
  $sentencia->bindParam(":tipoParticipante",$tipoParticipante);
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
        datos de los participantes
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
                <label for="apellido" class="form-label">Apellido:</label>
                <input type="text" class="form-control" name="apellido" id="apellido" aria-describedby="helpId"
                    placeholder="">
            </div>

            <div class="mb-3">
                <label for="documento" class="form-label">Documento:</label>
                <input type="number" class="form-control" name="documento" id="documento" aria-describedby="helpId"
                    placeholder="">
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Telefono:</label>
                <input type="number" class="form-control" name="telefono" id="telefono" aria-describedby="helpId"
                    placeholder="">
            </div>

            <div class="mb-3">
                <label for="tipoParticipante" class="form-label">Tipo de participante:</label>
                <select class="form-select" name="tipoParticipante" id="tipoParticipante">
                    <option selected value="Estudiante">Estudiante</option>
                    <option value="Profesional">Profesional</option>
                    <option value="Docente">Docente</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="codEvento" class="form-label">Cod evento:</label>
                <select class="form-select" name="codEvento" id="codEvento">
                <?php foreach($consultarEvento as $consultarEventos) { ?>
                    <option value="<?php echo $consultarEventos['codigo'] ?>"><?php echo $consultarEventos['nombre'] ?></option>
                    <?php } ?>
                </select>
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