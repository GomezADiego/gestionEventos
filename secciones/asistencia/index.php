<?php
include("../../templates/header.php"); 
include ("../../conexion.php");

if(isset($_GET['txtCedula'])){
    $txtCedula = (isset($_GET['txtCedula']))?$_GET['txtCedula']:"";
    
    $objconexion = new conexion();
    $sentencia = $objconexion->connect()->prepare("DELETE FROM `asistencia` WHERE cedula=:cedula");
    $sentencia->bindParam(":cedula",$txtCedula, );
    $sentencia->execute();

    header("Location:index.php");
}

$objconexion = new conexion();
$consultarAsistencia = $objconexion->consultar2("SELECT * FROM `asistencia`");

    // $db = new conexion();
    // $query = $db->connect()->prepare("SELECT * FROM `conferencista`");
    // $query->execute();
    // $consultarConferencista = $query->fetchAll();



?>

<br>
    <div class="container">
        <div class="row">
            <div class="col-md-1">

            </div>
            
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center">
                        Datos de la asistencia
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr class="table-info">
                                        <th>Cedula</th>
                                        <th>Fecha de ingreso</th>
                                        <th>Hora de ingreso</th>
                                        <th>Cod evento</th>
                                        <th>Accion</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach($consultarAsistencia as $consultarAsistencias) { ?>
                                        <tr>
                                            <td><?php echo $consultarAsistencias['cedula'] ?></td>
                                            <td><?php echo $consultarAsistencias['fechaIngreso'] ?></td>
                                            <td><?php echo $consultarAsistencias['horaIngreso'] ?></td>
                                            <td><?php echo $consultarAsistencias['codEvento'] ?></td>
                                            <td>
                                                <a href="editar.php?txtCedula=<?php echo $consultarAsistencias['cedula']; ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="javascript:borrar(<?php echo $consultarAsistencias['cedula']; ?>);" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                    <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Registrar asistencia</a>
                    </div>
                </div>
            </div>

            <div class="col-md-1">
               
            </div>
        </div>
    </div><br>

   

<?php include("../../templates/footer.php") ?>