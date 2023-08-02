<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos academicos</title>
    <link rel="stylesheet" href="css/estilos.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body class="bg-info">

    <header>

    </header>

    <main>
    <div class="container m-10">
        <div class="row justify-content-center align-items-center g-2 vh-100">
            <div class="col-md-3">

            </div>

            <div class="col-md-5"><br>
                <div class="card">
                    <label class="text-center fs-1 fw-bold" for="">Login</label> <br>
                    <div class="d-flex justify-content-center">
                        <img src="assets/login.png" alt="login" width="150px">
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <?php

                            include "conexion.php";
                            include "controlador/controladorLogin.php";
                            ?>
                            <?php if(isset($mensaje)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <strong><?php echo $mensaje ?></strong>
                            </div>
                            <?php } ?>
                            
                            <label">Usuario: </label>
                                <div class="input-group">
                                    <div class="input-group-text"><img src="assets/username.png" style="height: 2rem">
                                    </div>
                                    <input class="form-control" type="text" name="username" placeholder="username">
                                </div><br>

                            <label">Contraseña: </label>
                                <div class="input-group">
                                    <div class="input-group-text"><img src="assets/password.png" style="height: 2rem"></div>
                                    <input class="form-control" type="password" name="password" placeholder="password">
                                </div><br>

                                <div class="d-flex ml-10 justify-content-around gap-5">
                                        <!--justify-content-around -->
                                    <div class="d-flex aling-items-center gap-2">
                                        <input type="checkbox" name="" id="">
                                        <div>Recordar Sesión</div>
                                    </div>
                                    <a class="text-decoration-none text-info fst-italic fw-semibold"
                                        href="">¿olvidaste tu contraseña?</a>

                                </div>

                                <div class="mt-5 border-bottom text-center">
                                    <input class="btn btn-info text-white w-50" type="submit" name="btnIngresar" value="Ingresar">
                                </div>

                                <div class="text-center mt-2">
                                    <a class="text-decoration-none text-info fst-italic fw-semibold" href="">Registrarse</a>
                                </div>

                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-3">

            </div>
        </div><br>

    </main>


    

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
            crossorigin="anonymous"></script>
</body>

</html>