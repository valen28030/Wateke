<?php
// Configuración de la conexión a la base de datos
include 'conexion.php';

// Esta función sirve para realizar la llamada a la BBDD deseada y comprobar que está disponible.
$con = mysqli_connect($Servidor, $Usuario, $Password, $bd);

/*
Este paso sirve para verificar si la conexión ha sido positiva, es decir True. 
Se indica que en caso de ser False, se da aviso del error y del problema obtenido y se aborta el proceso.
En caso de ser positivo, pasamos al ELSE y se continua con el proceso
*/
if (!$con) {
    echo 'No se pudo conectar con la base de datos...';
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die;
} else {
    // Definir las variables para almacenar los parámetros de búsqueda
    // Obtener los parámetros de la URL
$music = isset($_GET['music']) ? $_GET['music'] : 'all';
$location = isset($_GET['location']) ? $_GET['location'] : 'all';

// Consultar los datos de la tabla discotecas según los parámetros de búsqueda
if ($music === "all") {
    // Si la opción "all" está seleccionada, buscar todas las discotecas en la ubicación seleccionada
    $querySelect = "SELECT * FROM discotecas WHERE ciudad = '$location'";
} else {
    // Si se selecciona un estilo de música específico, buscar discotecas con ese estilo de música en la ubicación seleccionada
    $querySelect = "SELECT * FROM discotecas WHERE estilo_musica = '$music' AND ciudad = '$location'";
}

    $result = $con->query($querySelect);

    if ($result->num_rows > 0) {
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Tabla de Discotecas</title>
    <link rel='stylesheet' href='../css/stylesDiscotecas.css'> <!-- Enlace al archivo CSS -->
    <style>
        /* Estilos para la tabla */
        .tabla-discotecas th,
        .tabla-discotecas td {
            color: black; /* Color de texto negro */
        }
    </style>
</head>
<body>
    <h1 class='tabla-titulo'>Tabla de Discotecas</h1>
    <table class='tabla-discotecas'>
        <tr>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Página Web</th>
            <th>Reseñas</th> <!-- Nueva columna para enlace a las reseñas -->

        </tr>
<?php
        while ($row = $result->fetch_assoc()) {
?>
        <tr>
            <td><?php echo $row['nombre']; ?></td>
            <td>
                <!-- Botón "Como Llegar" -->
                <a href="https://www.google.com/maps/dir/?api=1&destination=<?php echo urlencode($row['direccion']); ?>" target="_blank" class="button">Como Llegar</a>
                <!-- Mostrar la dirección -->
                <?php echo $row['direccion']; ?>
            </td>
            <td><a href="<?php echo $row['pagina_web']; ?>" class="hidden-link">Website</a></td>
            <td><a href="reviews.php?id=<?php echo $row['id_discoteca']; ?>">Ver reseñas</a></td> <!-- Enlace a la página de reseñas -->
        </tr>
<?php
        }
?>
    </table>
</body>
<?php
    } else {
        echo "No se encontraron registros en la tabla discotecas con los criterios de búsqueda especificados";
    }

    // Cerrar la conexión
    $con->close();
}
?>
<footer  style="margin-top: 100px;">
        <nav class="footer-nav">
            <a href="../index.php">Main</a>
            <a href="new_reviews.php">New Review</a>
            <a href="uber://">Uber</a>
            <a href="https://pnsd.sanidad.gob.es/ciudadanos/informacion/alcohol/menuAlcohol/mitosRealidades.htm" target="_blank">No te Pases</a>
        </nav>
    </footer>
</html>
