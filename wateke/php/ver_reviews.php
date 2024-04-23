<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Reviews</title>
    <link rel="stylesheet" href="../css/stylesSee.css">
</head>
<body>
    <div class="container">
        <?php
        // Incluir archivo de conexión a la base de datos
        include 'conexion.php';
        // Esta función sirve para realizar la llamada a la BBDD deseada y comprobar que está disponible.
        $con = mysqli_connect($Servidor, $Usuario, $Password, $bd);

        // Verificar si la conexión se estableció correctamente
        if (!$con) {
            die("La conexión a la base de datos falló: " . mysqli_connect_error());
        }

        // Obtener el ID de la discoteca de la URL
        $discoteca_id = $_GET['id'];

        // Consultar las reseñas para la discoteca específica
        $querySelectReviews = "SELECT * FROM reviews WHERE id_discoteca = $discoteca_id";
        $resultReviews = $con->query($querySelectReviews);

        if ($resultReviews->num_rows > 0) {
            while ($row = $resultReviews->fetch_assoc()) {
                echo "<div class='review'>";
                echo "<p><strong>Nombre:</strong> " . $row['nombre'] . "</p>";
                echo "<p><strong>Calificacion:</strong> " . $row['calificacion'] . "</p>";
                echo "<p><strong>Comentario:</strong> " . $row['comentario'] . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No hay reseñas para esta discoteca.</p>";
        }

        // Cerrar la conexión a la base de datos
        $con->close();
        ?>
    </div>
</body>
</html>