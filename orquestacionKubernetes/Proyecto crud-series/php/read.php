<?php
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    $id = $_GET["id"];
    require_once "config.php";

    $query = $connect->prepare("SELECT * FROM series WHERE id = ?;");
    $query->execute([$id]);
    $series= $query->fetch(PDO::FETCH_OBJ);
    if($series=== FALSE){
        echo "¡No existe alguna serie con ese ID!";
        exit();
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ver Ficha</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Ver Ficha</h1>
                    </div>
                    <div class="form-group">
                        <label>Nombre</label>
                        <p class="form-control-static"><?php echo $series->nombre ; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Genero</label>
                        <p class="form-control-static"><?php echo $series->genero; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Estreno</label>
                        <p class="form-control-static"><?php echo $series->estreno; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Pais</label>
                        <p class="form-control-static"><?php echo $series->pais; ?></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Volver</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>