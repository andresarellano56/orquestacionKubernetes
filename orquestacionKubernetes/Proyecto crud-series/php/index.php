<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Series que me gustaron</h2>
                        <a href="create.php" class="btn btn-success pull-right">Agregar nuevo empleado</a>
                    </div>
                    <?php
                    require_once "config.php";
                    
                    $query = $connect->query("SELECT * FROM series;");
                    $series = $query->fetchAll(PDO::FETCH_OBJ);

                    if($series > 0){
                        echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Nombre</th>";
                                        echo "<th>Genero</th>";
                                        echo "<th>Estreno</th>";
                                        echo "<th>Pais</th>";
                                        echo "<th>Acción</th>";
                                    echo "</tr>";
                                echo "</thead>";
                            echo "<tbody>";
                                foreach($series as $series){
                                    echo "<tr>";
                                        echo "<td>" . $series->id . "</td>";
                                        echo "<td>" . $series->nombre . "</td>";
                                        echo "<td>" . $series->genero . "</td>";
                                        echo "<td>" . $series->estreno . "</td>";
                                        echo "<td>" . $series->pais . "</td>";
                                        echo "<td>";
                                            echo "<a href='read.php?id=". $series->id ."' title='Ver' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='update.php?id=". $series->id ."' title='Actualizar' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete.php?id=". $series->id ."' title='Borrar' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                            echo "</tbody>";                            
                        echo "</table>";
                    } else{
                        echo "<p class='lead'><em>No se encontraron registros.</em></p>";
                    }
                ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>