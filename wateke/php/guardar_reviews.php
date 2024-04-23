<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Submission</title>
    <link rel="stylesheet" href="../css/stylesSave.css">
</head>
<body>
    <h1 >Review Submission</h1>
    <div class="container">
        <?php
        include 'conexion.php';

        // Esta función sirve para realizar la llamada a la BBDD deseada y comprobar que está disponible.
        $con = mysqli_connect($Servidor, $Usuario, $Password, $bd);

        if (!$con) {
            echo '<p>No se pudo conectar con la base de datos...</p>';
            echo "<p>Failed to connect to MySQL: " . mysqli_connect_error() . "</p>";
            die;
        } else {
            $nombre = $_POST['nombre'];
            $id_discoteca = $_POST['id_discoteca'];
            $calificacion = $_POST['calificacion'];
            $comentario = $_POST['comentario'];

            $sql = "INSERT INTO reviews (id_discoteca, calificacion, comentario, nombre) 
                    VALUES ('$id_discoteca', '$calificacion', '$comentario', '$nombre')";

            $grabado = mysqli_query($con, $sql);
            if (!$grabado) {
                echo '<p>There was an error while saving your review. Please try again later.</p>';
                echo '<p>' . mysqli_error($con) . '</p>';
            } else {
                echo '<p>Your review has been successfully submitted.</p>';
            }
        }

        mysqli_close($con);
        ?>
        <input type="button" value="Go back" onClick="history.go(-1);">
    </div>
</body>
</html>