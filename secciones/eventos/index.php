<?php include("../../conexion.php");


// if(!isset($_SESSION['rol'])){
//     header('location: login.php');
// }else{
//     if($_SESSION['rol'] != 1){
//         header('location: login.php');
//     }
// }

if (isset($_GET['txtCodigo'])) {
    $txtCodigo = (isset($_GET['txtCodigo'])) ? $_GET['txtCodigo'] : "";

    $objconexion = new conexion();
    $sentencia = $objconexion->connect()->prepare("DELETE FROM `evento` WHERE codigo=:codigo");
    $sentencia->bindParam(":codigo", $txtCodigo, );
    $sentencia->execute();

    $mensaje = "Registro eliminado";
    header("Location:index.php?mensaje=".$mensaje);
}

$objconexion = new conexion();
$consultarEvento = $objconexion->consultar2("SELECT * FROM `evento`");
//("SELECT *, (SELECT nombre apellido FROM conferencista WHERE conferencista.codigo=evento.codConferencista limit 1) as nombre FROM `evento`");

// $db = new conexion();
// $query = $db->connect()->prepare("SELECT * FROM `evento`");
// $query->execute();
// $consultarConferencista = $query->fetchAll();

?>

<?php include("../../templates/header.php"); ?>


<div class="container">
    <div class="card">
        <div class="card-header text-center">
            Datos de los eventos
        </div>
        <div class="card-body">
            <div class="table-responsive-sm">
                <table class="table table-striped table-hover" id="tabla_id">
                    <thead>
                        <tr class="table-info">
                            <th scope="col">Codigo</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Dependencia</th>
                            <th scope="col">Tipo Evento</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Espacio Solicitado</th>
                            <th scope="col">Implementos</th>
                            <th scope="col">conferencista</th>
                            <th scope="col">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($consultarEvento as $consultarEventos) { ?>
                            <tr>
                                <td scope="row">
                                    <?php echo $consultarEventos['codigo'] ?>
                                </td>
                                <td>
                                    <?php echo $consultarEventos['nombre'] ?>
                                </td>
                                <td>
                                    <?php echo $consultarEventos['dependencia'] ?>
                                </td>
                                <td>
                                    <?php echo $consultarEventos['tipoEvento'] ?>
                                </td>
                                <td>
                                    <?php echo $consultarEventos['fecha'] ?>
                                </td>
                                <td>
                                    <?php echo $consultarEventos['espacioSolicitado'] ?>
                                </td>
                                <td>
                                    <?php echo $consultarEventos['implementos'] ?>
                                </td>
                                <td>
                                    <?php echo $consultarEventos['codConferencista'] ?>
                                </td>
                                <td>
                                    <a href="editar.php?txtCodigo=<?php echo $consultarEventos['codigo']; ?>"
                                        class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="javascript:borrar(<?php echo $consultarEventos['codigo']; ?>);" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer text-muted">
            <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Registrar evento</a>
        </div>
    </div>
</div>
</div><br>

<?php include("../../templates/footer.php") ?>