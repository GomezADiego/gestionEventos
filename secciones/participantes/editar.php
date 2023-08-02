<?php 
include("../../conexion.php");

$objconexion = new conexion();
$consultarEvento = $objconexion->consultar2("SELECT * FROM `evento`");

if (isset($_GET['txtCodigo'])) {
    $txtCodigo = (isset($_GET['txtCodigo'])) ? $_GET['txtCodigo'] : "";

    $objconexion = new conexion();
    $sentencia = $objconexion->connect()->prepare("SELECT * FROM `participantes` WHERE codigo=:codigo");
    $sentencia->bindParam(":codigo", $txtCodigo, );
    $sentencia->execute();

    $registro = $sentencia->fetch(PDO::FETCH_LAZY);

    $nombre = $registro["nombre"];
    $apellido = $registro["apellido"];
    $documento = $registro["documento"];
    $telefono = $registro["telefono"];
    $tipoParticipante = $registro["tipoParticipante"];
    $codEvento = $registro["codEvento"];
    
}

if ($_POST) {
    print_r($_POST);
  $txtCodigo = (isset($_POST['txtCodigo'])) ? $_POST['txtCodigo'] : "";
  $nombre = (isset($_POST["nombre"]) ? $_POST["nombre"] : "");
  $apellido = (isset($_POST["apellido"]) ? $_POST["apellido"] : "");
  $documento = (isset($_POST["documento"]) ? $_POST["documento"] : "");
  $telefono = (isset($_POST["telefono"]) ? $_POST["telefono"] : "");
  $tipoParticipante = (isset($_POST["tipoParticipante"]) ? $_POST["tipoParticipante"] : "");
  $codEvento = (isset($_POST["codEvento"]) ? $_POST["codEvento"] : "");
  
  $objconexion = new conexion();
  $sentencia = $objconexion->connect()->prepare("UPDATE `participantes` SET nombre=:nombre, apellido=:apellido, documento=:documento, telefono=:telefono, tipoParticipante=:tipoParticipante, codEvento=:codEvento WHERE codigo=:codigo;");
  $sentencia->bindParam(":codigo",$txtCodigo); //reemplaza los datos actuales por los generales
  $sentencia->bindParam(":nombre",$nombre);
  $sentencia->bindParam(":apellido",$apellido);
  $sentencia->bindParam(":documento",$documento);
  $sentencia->bindParam(":telefono",$telefono);
  $sentencia->bindParam(":tipoParticipante",$tipoParticipante);
  $sentencia->bindParam(":codEvento",$codEvento);
  $sentencia->execute(); 

  $mensaje = "Registro editado";
  header("Location:index.php?mensaje=".$mensaje);

}

?>
<?php include("../../templates/header.php") ?>

<br>
<div class="card">
    <div class="card-header">
        datos de los participantes
    </div>
    <div class="card-body">
        <form action="" method="post">
            <div class="mb-3">
                <label for="txtCodigo" class="form-label">Codigo:</label>
                <input type="text" value="<?php echo $txtCodigo; ?>" readonly class="form-control" name="txtCodigo" id="txtCodigo" aria-describedby="helpId"
                    placeholder="">
            </div>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" value="<?php echo $nombre; ?>" class="form-control" name="nombre" id="nombre" aria-describedby="helpId"
                    placeholder="">
            </div>

            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido:</label>
                <input type="text" value="<?php echo $apellido; ?>" class="form-control" name="apellido" id="apellido" aria-describedby="helpId"
                    placeholder="">
            </div>

            <div class="mb-3">
                <label for="documento" class="form-label">Documento:</label>
                <input type="number" value="<?php echo $documento; ?>" class="form-control" name="documento" id="documento" aria-describedby="helpId"
                    placeholder="">
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Telefono:</label>
                <input type="number" value="<?php echo $telefono; ?>" class="form-control" name="telefono" id="telefono" aria-describedby="helpId"
                    placeholder="">
            </div>

            <div class="mb-3">
                <label for="tipoParticipante" class="form-label">Tipo de participante:</label>
                <select class="form-select" name="tipoParticipante" id="tipoParticipante">
                    <option selected value="<?php echo $tipoParticipante; ?>"><?php echo $tipoParticipante; ?></option>
                    <option value="Estudiante">Estudiante</option>
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
                <button type="submit" class="btn btn-success">Editar</button>
                <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
            </div>
        </form>

    </div>
    <div class="card-footer text-muted">
        Footer
    </div>
</div>

<?php include("../../templates/footer.php") ?>