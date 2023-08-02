<?php
include("../../conexion.php");

$objconexion = new conexion();
$consultarConferencista = $objconexion->consultar2("SELECT * FROM `conferencista`");

if (isset($_GET['txtCodigo'])) {
    $txtCodigo = (isset($_GET['txtCodigo'])) ? $_GET['txtCodigo'] : "";

    $objconexion = new conexion();
    $sentencia = $objconexion->connect()->prepare("SELECT * FROM `evento` WHERE codigo=:codigo");
    $sentencia->bindParam(":codigo", $txtCodigo, );
    $sentencia->execute();

    $registro = $sentencia->fetch(PDO::FETCH_LAZY);

    $nombre = $registro["nombre"];
    $dependencia = $registro["dependencia"];
    $tipoEvento = $registro["tipoEvento"];
    $fecha = $registro["fecha"];
    $codConferencista = $registro["codConferencista"];
    $espacioSolicitado = $registro["espacioSolicitado"];
    $implementos = $registro["implementos"];
    
}

 $espacioSolicitado = array();
 $implementos = array();

if ($_POST) {
    $txtCodigo = (isset($_POST['txtCodigo'])) ? $_POST['txtCodigo'] : "";
    $nombre = (isset($_POST["nombre"]) ? $_POST["nombre"] : "");
    $dependencia = (isset($_POST["dependencia"]) ? $_POST["dependencia"] : "");
    $tipoEvento = (isset($_POST["tipoEvento"]) ? $_POST["tipoEvento"] : "");
    $fecha = (isset($_POST["fecha"]) ? $_POST["fecha"] : "");
    $codConferencista = (isset($_POST["codConferencista"]) ? $_POST["codConferencista"] : "");

    $espacioSolicitado = (isset($_POST["espacioSolicitado"]) ? $_POST["espacioSolicitado"] : "");
    $allData = implode(", ", $espacioSolicitado);

    $implementos = (isset($_POST["implementos"]) ? $_POST["implementos"] : "");
    $allData2 = implode(", ", $implementos);

    $objconexion = new conexion();
    $sentencia = $objconexion->connect()->prepare("UPDATE `evento` SET nombre=:nombre, dependencia=:dependencia, tipoEvento=:tipoEvento, fecha=:fecha, codConferencista=:codConferencista, espacioSolicitado=:allData, implementos=:allData2 WHERE codigo=:codigo;");
     //reemplaza los datos actuales por los generales
    $sentencia->bindParam(":codigo", $txtCodigo);
    $sentencia->bindParam(":nombre", $nombre);
    $sentencia->bindParam(":dependencia", $dependencia);
    $sentencia->bindParam(":tipoEvento", $tipoEvento);
    $sentencia->bindParam(":fecha", $fecha);
    $sentencia->bindParam(":codConferencista", $codConferencista);
    $sentencia->bindParam(":allData",$allData);
    $sentencia->bindParam(":allData2",$allData2);
    $sentencia->execute();

    $mensaje = "Registro editado";
    header("Location:index.php?mensaje=".$mensaje);

}
?>

<?php include("../../templates/header.php"); ?>

<br>
<div class="card">
    <div class="card-header">
        datos del evento
    </div>
    <div class="card-body">
        <form action="" method="post">
            <div class="mb-3">
                <label for="txtCodigo" class="form-label">Codigo:</label>
                <input type="text" value="<?php echo $txtCodigo; ?>" readonly class="form-control" name="txtCodigo" id="txtCodigo" aria-describedby="helpId" placeholder="">
            </div>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" value="<?php echo $nombre; ?>" class="form-control" name="nombre" id="nombre"
                    aria-describedby="helpId" placeholder="">
            </div>

            <div class="mb-3">
                <label for="dependencia" class="form-label">Dependencia:</label>
                <select class="form-select" name="dependencia" id="dependencia">
                    <option selected value="<?php echo $dependencia; ?>"><?php echo $dependencia; ?></option> -->
                    <option value="bienestar">bienestar</option>
                    <option value="coordinacion academica">coordinacion academica</option>
                    <option value="gestion del cambio">gestion del cambio</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="tipoEvento" class="form-label">Tipo de evento:</label>
                <select class="form-select" name="tipoEvento" id="tipoEvento">
                 <option selected value="<?php echo $tipoEvento; ?>"><?php echo $tipoEvento; ?></option> -->
                    <option value="simposium">simposium</option>
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
                <input type="date" value="<?php echo $fecha; ?>" class="form-control" name="fecha" id="fecha"
                    aria-describedby="helpId" placeholder="">
            </div>

            <div class="mb-3">
                <label for="codConferencista" class="form-label">conferencista:</label>
                <select class="form-select" name="codConferencista" id="codConferencista">
                    <?php foreach ($consultarConferencista as $consultarConferencistas) { ?>
                        <option <?php echo ($codConferencista == $consultarConferencistas['codigo'])?"selected":"";?> value="<?php echo $consultarConferencistas['codigo'] ?>"><?php echo $consultarConferencistas['nombre'] . " " . $consultarConferencistas['apellido'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="espacioSolicitado" class="form-label">Espacio solicitado:</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="espacioSolicitado[]" value="biblioteca"
                        id="checkbox1" <?php //echo ($espacioSolicitado == 'biblioteca' or $espacioSolicitado == 'biblioteca,')?"checked":"";?>>
                    <label class="form-check-label" for="checkbox1">biblioteca</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="espacioSolicitado[]" value="auditorio"
                        id="checkbox2" <?php //echo ($espacioSolicitado == 'auditorio' or $espacioSolicitado == 'auditorio, aula')?"checked":"";?>>
                    <label class="form-check-label" for="checkbox2">auditorio</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="espacioSolicitado[]" value="aula"
                        id="checkbox3" <?php echo ($espacioSolicitado == 'aula' or $espacioSolicitado == 'aula, externo')?"checked":"";?>>
                    <label class="form-check-label" for="checkbox3">aula</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="espacioSolicitado[]" value="externo"
                        id="checkbox4" <?php echo ($espacioSolicitado == 'externo' or $espacioSolicitado == 'aula, externo')?"checked":"";?>>
                    <label class="form-check-label" for="checkbox4">externo</label>
                </div>
            </div>

            <div class="mb-5">
                <label for="implementos" class="form-label">Implementos requeridos:</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="implementos[]" value="videobeam"
                        id="checkbox1" <?php //echo ($implementos == 'videobeam' or $implementos == 'videobeam, computadores')?"checked":"";?>>
                    <label class="form-check-label" for="checkbox1">videobeam</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="implementos[]" value="computadores"
                        id="checkbox2" <?php echo ($implementos == 'computadores' or $implementos =='computadores, proyectores')?"checked":"";?>>
                    <label class="form-check-label" for="checkbox2">computadores</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="implementos[]" value="proyectores"
                        id="checkbox3"  <?php echo ($implementos == 'proyectores' or $implementos =='computadores, proyectores')?"checked":"";?>>
                    <label class="form-check-label" for="checkbox3">proyectores</label>
                </div>
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