<?php

include 'conexion.php';

$con = mysqli_connect($Servidor, $Usuario, $Password, $bd);

if (!$con) {
    echo 'No se pudo conectar con la base de datos...';
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die;
} else {

    $queryTR = "SELECT id_discoteca, nombre FROM discotecas";
    if ($result = mysqli_query($con, $queryTR)) {
        $total = mysqli_num_rows($result);
    }

    if (!$result) {
        echo mysqli_error($con);
    } else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Form</title>
    <link rel="stylesheet" href="../css/stylesReviews.css">
    <style>
        .error-message {
            font-family: Tahoma, Geneva, sans-serif;
            color: red;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('form_grabar').addEventListener('submit', function(event) {
                var discoteca = document.getElementById('id_discoteca').value;
                var nombre = document.getElementById('nombre').value;
                var calificacion = document.querySelector('input[name="calificacion"]:checked');
                var comentario = document.getElementById('comentario').value;

                var error = false;

                if (discoteca === "") {
                    showError('id_discoteca', 'Please enter a nightclub.');
                    error = true;
                } else {
                    hideError('id_discoteca');
                }

                if (nombre === "") {
                    showError('nombre', 'Please enter your name.');
                    error = true;
                } else {
                    hideError('nombre');
                }

                if (!calificacion) {
                    showError('calificacion', 'Please select a rating.');
                    error = true;
                } else {
                    hideError('calificacion');
                }

                if (comentario === "") {
                    showError('comentario', 'Please enter a comment.');
                    error = true;
                } else {
                    hideError('comentario');
                }

                if (error) {
                    event.preventDefault(); // Detiene el envío del formulario
                }
            });

            function showError(fieldId, errorMessage) {
                var field = document.getElementById(fieldId);
                var errorId = fieldId + '_error'; // Generamos un ID único para el mensaje de error
                var errorElement = document.getElementById(errorId);
                if (!errorElement) {
                    errorElement = document.createElement('span');
                    errorElement.id = errorId;
                    errorElement.className = 'error-message';
                    field.parentNode.insertBefore(errorElement, field.nextSibling);
                }
                errorElement.innerHTML = errorMessage;
            }

            function hideError(fieldId) {
                var errorId = fieldId + '_error';
                var errorElement = document.getElementById(errorId);
                if (errorElement) {
                    errorElement.parentNode.removeChild(errorElement);
                }
            }
        });
    </script>
</head>
<body>
<h1 class='tabla-titulo'>Write a Review</h1>
    <div class="container">
        
        <form id="form_grabar" enctype="multipart/form-data" method="post" action="guardar_reviews.php">
            <label for="id_discoteca">Nightclub:</label>
            <select id="id_discoteca" name="id_discoteca">
                <option value="" disabled selected>Select a nightclub</option>
                <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value=" . $row['id_discoteca'] . ">" . $row['nombre'] . "</option>";
                    }
                ?>
            </select>
            <span id="id_discoteca_error" class="error-message"></span>

            <label for="nombre">Your Name:</label>
            <input type="text" id="nombre" name="nombre">
            <span id="nombre_error" class="error-message"></span>

            <label for="calificacion">Rating:</label>
            <div class="rating">
                <input type="radio" id="star5" name="calificacion" value="5">
                <label for="star5"></label>
                <input type="radio" id="star4" name="calificacion" value="4">
                <label for="star4"></label>
                <input type="radio" id="star3" name="calificacion" value="3">
                <label for="star3"></label>
                <input type="radio" id="star2" name="calificacion" value="2">
                <label for="star2"></label>
                <input type="radio" id="star1" name="calificacion" value="1">
                <label for="star1"></label>
            </div>
            <span id="calificacion_error" class="error-message"></span>

            <label for="comentario">Comment:</label>
            <textarea id="comentario" name="comentario"></textarea>
            <span id="comentario_error" class="error-message"></span>

            <button type="submit" id="submit_button">Submit</button>
        </form>
    </div>
</body>
<footer  style="margin-top: 100px;">
        <nav class="footer-nav">
            <a href="../index.php">Main</a>
            <a href="#">New Review</a>
            <a href="uber://">Uber</a>
            <a href="https://pnsd.sanidad.gob.es/ciudadanos/informacion/alcohol/menuAlcohol/mitosRealidades.htm" target="_blank">No te Pases</a>
        </nav>
    </footer>
</html>


<?php
        }
    }
    mysqli_close($con);
?>
