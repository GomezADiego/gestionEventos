<?php
include("../../templates/header.php"); 
include ("../../conexion.php");

$objconexion = new conexion();
$consultarConferencista = $objconexion->consultar2("SELECT * FROM `conferencista`");

    // $db = new conexion();
    // $query = $db->connect()->prepare("SELECT * FROM `conferencista`");
    // $query->execute();
    // $consultarConferencista = $query->fetchAll();

if(isset($_GET['txtCodigo'])){
    $txtCodigo = (isset($_GET['txtCodigo']))?$_GET['txtCodigo']:"";
    
    $objconexion = new conexion();
    $sentencia = $objconexion->connect()->prepare("DELETE FROM `conferencista` WHERE codigo=:codigo");
    $sentencia->bindParam(":codigo",$txtCodigo, );
    $sentencia->execute();

    header("Location:index.php");
}

?>

    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">inicio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> -->

    <!-- <header class="text-white py-4 mt-5">
        <div class="container text-center">
            <h1>Página de Eventos</h1>
            <p class="mt-4">conferencistas</p>
        </div>
    </header> -->
    <br>
    <div class="p-5 bg-light">
        <div class="container">
            <h1 class="display-3">Eventos Academicos</h1>
            <p class="lead">Este es un portafolio privado</p>
            <hr class="my-2">
            <p>Aqui puedes ver la informacion de los conferencistas que se encuentran registrados</p>
        </div>
    </div>

    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-1">

            </div>
            
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center">
                        Datos de los conferencistas
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="tabla_id">
                                <thead>
                                    <tr class="table-info">
                                        <th>Codigo</th>
                                        <th>Identificacion</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Accion</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach($consultarConferencista as $consultarConferencistas) { ?>
                                        <tr>
                                            <td><?php echo $consultarConferencistas['codigo'] ?></td>
                                            <td><?php echo $consultarConferencistas['identificacion'] ?></td>
                                            <td><?php echo $consultarConferencistas['nombre'] ?></td>
                                            <td><?php echo $consultarConferencistas['apellido'] ?></td>
                                            <td>
                                                <a href="editar.php?txtCodigo=<?php echo $consultarConferencistas['codigo']; ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="javascript:borrar(<?php echo $consultarConferencistas['codigo']; ?>);" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                    <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Registrar conferencista</a>
                    </div>
                </div>
            </div>

            <div class="col-md-1">
               
            </div>
        </div>
    </div><br>

   

<?php include("../../templates/footer.php") ?>