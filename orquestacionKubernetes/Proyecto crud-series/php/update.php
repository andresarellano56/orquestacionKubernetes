<?php

$nombre = $genero = $estreno = $pais = "";
$nombre_err = $genero_err = $estreno_err = $pais = "";

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
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST["id"];
        
    $input_nombre = trim($_POST["nombre"]);
    if(empty($input_nombre)){
        $nombre_err = "Por favor ingrese un nombre.";
    }else{
        $nombre = $input_nombre;
    }
        
    $input_genero = trim($_POST["genero"]);
    if(empty($input_genero)){
        $genero_err = "Por favor ingrese un genero de serie.";     
    } else{
        $genero = $input_genero;
    }
        
    $input_estreno = trim($_POST["estreno"]);
    if(empty($input_estreno)){
        $estreno_err = "Por favor ingrese el año de estreno.";     
    } elseif(!ctype_digit($input_estreno)){
        $estreno_err = "Por favor ingrese un valor positivo y válido.";
    } else{
        $estreno = $input_estreno;
    }

    $input_pais = trim($_POST["pais"]);
    if(empty($input_pais)){
        $pais_err = "Por favor ingresa un pais.";     
    } else{
        $pais = $input_pais;
    }

    if(empty($nombre_err) && empty($genero_err) && empty($estreno_err) && empty($pais_err)){
        require_once "config.php";
        try{
            $query = $connect->prepare("UPDATE series SET nombre = ?, genero = ?, estreno = ?, pais = ?  WHERE id = ?;");
            $resultado = $query->execute([$nombre, $genero, $estreno, $pais ,$id]);
            if($resultado === TRUE) header("location: index.php");
        }catch (PDOException $e){
            exit("Error: " . $e->getMessage());
        }  
    }
 }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Ficha</title>
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
                        <h2>Actualizar Ficha</h2>
                    </div>
                    <p>Actualiza la ficha, quizá te equivocaste.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($nombre_err)) ? 'has-error' : ''; ?>">
                            <label>Nombre</label>
                            <input type="text" name="nombre" class="form-control" value="<?php echo $series->nombre; ?>">
                            <span class="help-block"><?php echo $nombre_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($genero_err)) ? 'has-error' : ''; ?>">
                            <label>Genero</label>
                            <input type="text" name="genero" class="form-control" value="<?php echo $series->genero; ?>">
                            <span class="help-block"><?php echo $genero_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($estreno_err)) ? 'has-error' : ''; ?>">
                            <label>Estreno</label>
                            <input type="text" name="estreno" class="form-control" value="<?php echo $series->estreno; ?>">
                            <span class="help-block"><?php echo $estreno_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($pais_err)) ? 'has-error' : ''; ?>">
                            <label>Pais</label>
                            <input type="text" name="pais" class="form-control" value="<?php echo $series->pais; ?>">
                            <span class="help-block"><?php echo $estreno_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Enviar">
                        <a href="index.php" class="btn btn-default">Volver</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>