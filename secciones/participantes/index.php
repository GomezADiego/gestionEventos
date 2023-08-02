<?php include("../../templates/header.php") ?>

<?php
include ("../../conexion.php");

$objconexion = new conexion();
$consultarParticipante = $objconexion->consultar2("SELECT * FROM `participantes`");
//"SELECT *, (SELECT nombre apellido FROM conferencista WHERE conferencista.codigo=evento.codConferencista limit 1) as nombre FROM `evento`")

    // $db = new conexion();
    // $query = $db->connect()->prepare("SELECT * FROM `evento`");
    // $query->execute();
    // $consultarConferencista = $query->fetchAll();

    if(isset($_GET['txtCodigo'])){
        $txtCodigo = (isset($_GET['txtCodigo']))?$_GET['txtCodigo']:"";
        
        $objconexion = new conexion();
        $sentencia = $objconexion->connect()->prepare("DELETE FROM `participantes` WHERE codigo=:codigo");
        $sentencia->bindParam(":codigo",$txtCodigo, );
        $sentencia->execute();
    
        header("Location:index.php");
    }


?>

<div class="container">
                <div class="card">
                    <div class="card-header text-center">
                        Datos de los participantes
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-sm">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr class="table-info">
                                        <th scope="col">Codigo</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellido</th>
                                        <th scope="col">Documento</th>
                                        <th scope="col">Telefono</th>
                                        <th scope="col">tipo de participante</th>
                                        <th scope="col">cod evento</th>
                                        <th scope="col">Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                     foreach($consultarParticipante as $consultarParticipantes) { ?>
                                        <tr>
                                            <td scope="row"><?php echo $consultarParticipantes['codigo'] ?></td>
                                            <td><?php echo $consultarParticipantes['nombre'] ?></td>
                                            <td><?php echo $consultarParticipantes['apellido'] ?></td>
                                            <td><?php echo $consultarParticipantes['documento'] ?></td>
                                             <td><?php echo $consultarParticipantes['telefono'] ?></td>
                                            <td><?php echo $consultarParticipantes['tipoParticipante'] ?></td>
                                            <td><?php echo $consultarParticipantes['codEvento'] ?></td>
                                            <td>
                                                <a href="editar.php?txtCodigo=<?php echo $consultarParticipantes['codigo']; ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="javascript:borrar(<?php echo $consultarParticipantes['codigo']; ?>);" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                    <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Registrar participante</a>
                    </div>
                </div>
            </div>
    </div><br>

<?php include("../../templates/footer.php") ?>