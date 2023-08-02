<?php 
include ("../../conexion.php");

if(isset($_GET['txtCodigo'])){
    $txtCodigo = (isset($_GET['txtCodigo']))?$_GET['txtCodigo']:"";

    $objconexion = new conexion();
    $sentencia = $objconexion->connect()->prepare("SELECT * FROM `conferencista` WHERE codigo=:codigo");
    $sentencia->bindParam(":codigo",$txtCodigo, );
    $sentencia->execute();

    $registro = $sentencia->fetch(PDO::FETCH_LAZY);

    $identificacion = $registro["identificacion"];
    $nombre = $registro["nombre"];
    $apellido = $registro["apellido"];
}

if ($_POST) {
    $txtCodigo = (isset($_POST['txtCodigo']))?$_POST['txtCodigo']:"";
    $identificacion = (isset($_POST["identificacion"]) ? $_POST["identificacion"] : "");
    $nombre = (isset($_POST["nombre"]) ? $_POST["nombre"] : "");
    $apellido = (isset($_POST["apellido"]) ? $_POST["apellido"] : "");
  
    $objconexion = new conexion();
    $sentencia = $objconexion->connect()->prepare("UPDATE `conferencista` SET identificacion=:identificacion, nombre=:nombre, apellido=:apellido WHERE codigo=:codigo;");
    $sentencia->bindParam(":codigo",$txtCodigo);
    $sentencia->bindParam(":identificacion",$identificacion);
    $sentencia->bindParam(":nombre",$nombre);
    $sentencia->bindParam(":apellido",$apellido);
    $sentencia->execute(); 
  
    $mensaje = "Registro editado";
    header("Location:index.php?mensaje=".$mensaje);
  
  
  }

?>
<?php include("../../templates/header.php"); ?>

<br>
<div class="card">
  <div class="card-header">
    datos del conferencista
  </div>
  <div class="card-body">
    <form action="" method="post">
      <div class="mb-3">
        <label for="txtCodigo" class="form-label">Codigo:</label>
        <input type="number" value="<?php echo $txtCodigo;?>" class="form-control" readonly name="txtCodigo" id="txtCodigo" aria-describedby="helpId"
          placeholder="">
      </div>
      <div class="mb-3">
        <label for="identificacion" class="form-label">Identificacion:</label>
        <input type="number" value="<?php echo $identificacion;?>" class="form-control" name="identificacion" id="identificacion" aria-describedby="helpId"
          placeholder="">
      </div>
      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" value="<?php echo $nombre;?>"" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="">
      </div>
      <div class="mb-3">
        <label for="apellido" class="form-label">Apellido:</label>
        <input type="text" value="<?php echo $apellido;?>" class="form-control" name="apellido" id="apellido" aria-describedby="helpId" placeholder="">
      </div>
      <button type="submit" class="btn btn-success">Editar</button>
      <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
    </form>

  </div>
  <div class="card-footer text-muted">
    Footer
  </div>
</div>




<?php include("../../templates/footer.php") ?>