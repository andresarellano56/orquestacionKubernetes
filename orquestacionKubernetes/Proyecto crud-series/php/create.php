<?php
    require_once "config.php";

    $nombre = $genero = $estreno = $pais = "";
    $nombre_err = $genero_err = $estreno_err = $pais_err =  "";
 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $input_nombre = trim($_POST["nombre"]);
        if(empty($input_nombre)){
            $nombre_err = "Por favor ingrese el nombre de la serie.";
        }else{
            $nombre = $input_nombre;
        }
    
        $input_genero = trim($_POST["genero"]);
        if(empty($input_genero)){
            $genero_err = "Por favor ingresa un genero.";     
        } else{
            $genero = $input_genero;
        }
    
        $input_estreno = trim($_POST["estreno"]);
        if(empty($input_estreno)){
            $estreno_err = "Por favor ingrese el año de estreno.";     
        } elseif(!ctype_digit($input_estreno)){
            $estreno_err = "Por favor ingrese un valor correcto y positivo.";
        } else{
            $estreno = $input_estreno;
        }

        $input_pais = trim($_POST["pais"]);
        if(empty($input_pais)){
            $pais_err = "Por favor ingresa un pais.";     
        } else{
            $pais = $input_pais;
        }

        try{
            $query = $connect->prepare("INSERT INTO series(nombre, genero, estreno, pais) VALUES (?, ?, ?, ?);");
            $resultado = $query->execute([$nombre, $genero, $estreno, $pais]); 
            if($resultado === TRUE) header("location: index.php");
        }catch (PDOException $e){
            exit("Error: " . $e->getMessage());
        }    
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Agregar Serie</title>
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
                        <h2>Agregar Serie</h2>
                    </div>
                    <p>Esta serie me gusto, la agregare.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($nombre_err)) ? 'has-error' : ''; ?>">
                            <label>Nombre</label>
                            <input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?>">
                            <span class="help-block"><?php echo $nombre_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($genero_err)) ? 'has-error' : ''; ?>">
                            <label>Genero</label>
                            <input type="text" name="genero" class="form-control" value="<?php echo $genero; ?>">
                            <span class="help-block"><?php echo $genero_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($estreno_err)) ? 'has-error' : ''; ?>">
                            <label>Estreno</label>
                            <input type="text" name="estreno" class="form-control" value="<?php echo $estreno; ?>">
                            <span class="help-block"><?php echo $estreno_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($pais_err)) ? 'has-error' : ''; ?>">
                            <label>Pais</label>
                            <input type="text" name="pais" class="form-control" value="<?php echo $pais; ?>">
                            <span class="help-block"><?php echo $pais_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Regresar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>