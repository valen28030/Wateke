<div align="justify">
        <h1 align="justify">Wateke: Descubre las Mejores Discotecas en tu Ciudad</h1>
        <p align="justify">Bienvenido a Wateke, tu portal especializado en la búsqueda y exploración de las discotecas más vibrantes y emocionantes de tu ciudad.</p>
        <p align="justify">Con Wateke, encontrarás fácilmente el lugar perfecto para disfrutar de una noche inolvidable llena de música y diversión.</p>
        <p align="justify"> <strong>Visual Studio Code y Xampp (phpMyAdmin).</strong></p>
        <p align="justify"> <strong>Lenguajes: PHP, SQL, HTML y CSS.</strong></p>
        <h2 align="justify">Pantalla Principal: Explora y Encuentra tu Discoteca Ideal</h2>
        <p align="justify">En nuestra pantalla principal, te damos la bienvenida con un diseño intuitivo y fácil de usar. Aquí, encontrarás:</p>

![main](https://github.com/valen28030/Wateke/assets/167770750/17faa48f-de12-440f-a74c-4ddbe1471ee9)
        <ul align="justify">
            <li align="justify"><strong align="justify">Título Principal:</strong> En la parte superior de la página, te recibimos con nuestro distintivo logotipo y el nombre de nuestro servicio, Wateke.</li>
            &nbsp;
          <li align="justify"><strong align="justify">Campo de Estilo de Música:</strong> Justo debajo del título, te ofrecemos la opción de seleccionar tu estilo de música preferido. Puedes explorar una amplia gama de géneros, desde el electrizante techno hasta los ritmos tropicales del reggaetón.</li>

```sh
<label for="music">Music Style:</label>
        <select id="music" class="form-control">
                <option value="all">All</option>
                <option value="reggaeton">Reggaeton</option>
                <option value="techno">Techno</option>
        </select>
```
&nbsp; 


<li align="justify"><strong align="justify">Campo de Selección de Ciudad:</strong> Más abajo, tienes la posibilidad de elegir la ciudad en la que te encuentras. Nuestra base de datos abarca una amplia variedad de ciudades, así que encontrarás opciones emocionantes sin importar dónde te encuentres.</li>
&nbsp; 

```sh
<label for="location">Location:</label>
        <select id="location" class="form-control">
                <option value="madrid">Madrid</option>
                <option value="barcelona">Barcelona</option>
        </select>
```
&nbsp; 


<li align="justify"><strong align="justify">Mapa con Marcadores:</strong> En la parte principal de la página, encontrarás un mapa interactivo con marcadores que indican la ubicación de las discotecas. Esta función te permite visualizar fácilmente la distribución geográfica de las opciones disponibles.</li>
&nbsp;     

```sh
// Función para inicializar el mapa
        function initMap() {
            const map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: 40.416775, lng: -3.70379 }, // Coordenadas de Madrid
                zoom: 12 // Nivel de zoom inicial
            });
        
            // Agrega marcadores para cada discoteca
            const clubs = [
                { name: "Silikona", location: { lat: 40.406007356327635, lng: -3.6523181618687066 }, address: "Pl. del Encuentro, 1, Moratalaz, 28030 Madrid" },
                { name: "Moondance", location: { lat: 40.41865903926285, lng: -3.701100148375687 }, address: "C. de la Aduana, 21, Centro, 28012 Madrid" },
                { name: "Sala B", location: { lat: 40.43152516965834, lng: -3.700213533031417 }, address: "C. de Trafalgar, 6, Chamberí, 28010 Madrid" },
                { name: "Teatro Kapital", location: { lat: 40.40989994829465, lng: -3.6930761176890585 }, address: "C. de Atocha, 125, Centro, 28012 Madrid" },
                { name: "Shoko", location: { lat: 40.408901489068946, lng: -3.7105715311814342 }, address: "C. de Toledo, 86, Centro, 28005 Madrid" },
                { name: "La Cartuja", location: { lat: 40.416079061611136, lng: -3.70095240843254 }, address: "C. de la Cruz, 10, Centro, 28012 Madrid" },
                { name: "The Bassement", location: { lat: 40.43291866728769, lng: -3.7102472675295024 }, address: "C. de Galileo, 26, Chamberí, 28015 Madrid"},
                { name: "LAB theCLUB", location: { lat: 40.471612200044056, lng: -3.682425277208593 }, address: "Estación de Chamartín Planta Ático"},
                { name: "Fabrik", location: { lat: 40.27161173751371, lng:  -3.840829425017393 }, address: "Av. de la Industria, 82, 28970 Humanes de Madrid, Madrid"},
                { name: "X Private Club", location: { lat: 40.40465205817693, lng: -3.6555327773288773 }, address: "C. de la Cerámica, 76, Puente de Vallecas, 28038 Madrid"},
                { name: "Octogon", location: { lat: 40.40502787045241, lng: -3.6579574942401862 }, address: "C. de la Cerámica, 16, Puente de Vallecas, 28038 Madrid"},
                { name: "Mondo Disko", location: { lat: 40.41874043842268, lng: -3.6996289477658975 }, address: "C. de Alcalá, 20, Centro, 28014 Madrid"}
                // Agrega más discotecas aquí 
            ];

            clubs.forEach(club => {
                const marker = new google.maps.Marker({
                    position: club.location,
                    map: map,
                    title: club.name
                });

                // Event listener para abrir Google Maps al hacer clic en la dirección
                const infowindow = new google.maps.InfoWindow({
                    content: `<strong>${club.name}</strong><br>${club.address}`
                });
                marker.addListener("click", () => {
                    infowindow.open(map, marker);
                });
            });
        }
```
&nbsp; 


<li align="justify"><strong align="justify">Botón de Búsqueda:</strong> A la derecha de los campos de selección, encontrarás nuestro botón de búsqueda. Al hacer clic en él, accederás a una nueva pantalla donde se mostrarán las discotecas que coinciden con tus preferencias.</li>
&nbsp; 

```sh
    <script>
 const searchForm = document.getElementById("search-form");

searchForm.addEventListener("submit", function(event) {
    event.preventDefault();
    const musicSelect = document.getElementById("music").value;
    const locationSelect = document.getElementById("location").value;

    let url = "php/discotecas.php";

    if (musicSelect !== "all") {
        url += `?music=${musicSelect}`;
    }

    if (locationSelect !== "all") {
        url += `${musicSelect !== "all" ? "&" : "?"}location=${locationSelect}`;
    }

    window.location.href = url;
});
```
&nbsp; 


</ul>
                    &nbsp;
        <h2 align="justify">Pantalla de Discotecas: Explora y Descubre tus Lugares Favoritos</h2>
        <p align="justify">Al pulsar el botón de búsqueda, serás dirigido a nuestra pantalla de discotecas, donde encontrarás:</p>

![discos](https://github.com/valen28030/Wateke/assets/167770750/1296fd5b-346e-4f33-a57f-d74e37f4139f)
        <ul align="justify">
            <li align="justify"><strong align="justify">Tabla de Discotecas:</strong> Aquí se muestran las discotecas que coinciden con tus criterios de búsqueda. Cada entrada incluye el nombre de la discoteca, su dirección y un botón "Cómo Llegar" que te lleva directamente a Google Maps con la ubicación seleccionada.</li>
                        &nbsp;
            <li align="justify"><strong align="justify">Campo de Sitio Web:</strong> También encontrarás un enlace directo al sitio web de cada discoteca, para que puedas obtener más información sobre eventos, horarios y promociones.</li>
                        &nbsp;
            <li align="justify"><strong align="justify">Columna de Reseñas:</strong> Por último, podrás leer y dejar reseñas sobre cada discoteca. Tu opinión es importante para nosotros y para otros usuarios que buscan recomendaciones.</li>

```sh
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
```
</ul>
&nbsp; 
&nbsp;
<h2 align="justify">Pantalla de Nueva Reseña: Comparte tu Experiencia</h2>
        <p align="justify">Si decides dejar una reseña, serás llevado a nuestra pantalla de Nueva Reseña, donde podrás:</p>
        
![reviews](https://github.com/valen28030/Wateke/assets/167770750/8de50057-400f-49a1-bdc6-80d4a0399826)
        <ul align="justify">
            <li align="justify"><strong align="justify">Seleccionar la Discoteca:</strong> Utiliza el desplegable para elegir la discoteca en la que deseas dejar tu reseña.</li>

```sh            
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
```                
&nbsp; 


<li align="justify"><strong align="justify">Ingresar tu Nombre:</strong> Proporciona tu nombre para que otros usuarios conozcan quién está compartiendo la experiencia.</li>
&nbsp; 

```sh
<label for="nombre">Your Name:</label>
            <input type="text" id="nombre" name="nombre">
            <span id="nombre_error" class="error-message"></span>
```
&nbsp; 


<li align="justify"><strong align="justify">Clasificar la Experiencia:</strong> Utiliza nuestros cinco círculos para clasificar tu experiencia, desde una estrella hasta cinco estrellas.</li>
&nbsp;

```sh
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
```
&nbsp; 


<li align="justify"><strong align="justify">Escribir un Comentario:</strong> Comparte tus pensamientos y comentarios sobre la discoteca en un campo de texto.</li>
&nbsp; 

```sh
<label for="comentario">Comment:</label>
            <textarea id="comentario" name="comentario"></textarea>
            <span id="comentario_error" class="error-message"></span>
```
&nbsp; 


<li align="justify"><strong align="justify">Enviar tu Reseña:</strong> Una vez completados todos los campos, utiliza el botón de enviar para compartir tu reseña con la comunidad de Wateke.</li>
&nbsp; 

```sh
<script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('form_grabar').addEventListener('submit', function(event) {
                var discoteca = document.getElementById('id_discoteca').value;
                // Resto de código
        });
</script>
// Resto de código
<form id="form_grabar" enctype="multipart/form-data" method="post" action="guardar_reviews.php">
        <button type="submit" id="submit_button">Submit</button>
</form>
```
 </ul>
&nbsp; 


<h2 align="justify">Footer: Accesos Rápidos y Útiles</h2>
        <p align="justify">En la parte inferior de la página, nuestro footer incluye enlaces útiles:</p>
        <ul align="justify">
            <li align="justify"><strong align="justify">Página Principal:</strong> Vuelve rápidamente a la pantalla principal de Wateke.</li>
            &nbsp;  <li align="justify"><strong align="justify">Nueva Reseña:</strong> Si deseas dejar una nueva reseña, puedes acceder a la pantalla correspondiente desde aquí.</li>
            &nbsp;  <li align="justify"><strong align="justify">Uber:</strong> Si tienes la aplicación de Uber descargada, puedes acceder directamente a ella para organizar tu transporte hacia la discoteca de tu elección.</li>
            &nbsp;  <li align="justify"><strong align="justify">Página del Ministerio:</strong> Para obtener información sobre los efectos del alcohol y la seguridad en la vida nocturna, te proporcionamos un enlace a la página oficial del Ministerio de Salud.</li>

```sh
<footer  style="margin-top: 100px;">
        <nav class="footer-nav">
            <a href="../index.php">Main</a>
            <a href="new_reviews.php">New Review</a>
            <a href="uber://">Uber</a>
            <a href="https://pnsd.sanidad.gob.es/ciudadanos/informacion/alcohol/menuAlcohol/mitosRealidades.htm" target="_blank">No te Pases</a>
        </nav>
</footer>
```
</ul>
         &nbsp;  <h2 align="justify">Conexión con Base de Datos</h2>
        <p align="justify">Para proporcionarte la mejor experiencia de usuario, hemos establecido una conexión con una base de datos creada en XAMPP. En esta base de datos, hemos creado 4 tablas: discotecas, ciudades, género y reviews. Estas tablas nos permiten optimizar la web al facilitar las búsquedas, los filtrados y garantizar una navegación fluida para nuestros usuarios.</p>

```sh
// Configuración de la conexión a la base de datos
include 'conexion.php';

// Esta función sirve para realizar la llamada a la BBDD deseada y comprobar que está disponible.
$con = mysqli_connect($Servidor, $Usuario, $Password, $bd);
```

![tabla](https://github.com/valen28030/Wateke/assets/167770750/f108b4b9-9fcf-4bab-9e53-f902e1fa64c7)

![tabla2](https://github.com/valen28030/Wateke/assets/167770750/92c77ce8-159a-484b-b5e6-424c8c1e61fa)
    </div>

&nbsp;
<h3 align="justify">Créditos</h3>

- **Desarrollador**: Carlos Valencia Sánchez
- **Diseñador de Web**: Carlos Valencia Sánchez
- **Artista Gráfico**: Carlos Valencia Sánchez

&nbsp;
<h3 align="justify">Contacto</h3>

<p align="justify">Para obtener soporte técnico, reportar errores o proporcionar comentarios, no dudes en contactar.</p>

---
<p align="justify">Este documento proporciona una visión general de la web, incluyendo sus características, tecnología utilizada, requisitos del sistema, instrucciones y créditos. Para obtener más información detallada sobre el desarrollo y funcionamiento de la web, consulta la documentación interna o comunícate con el desarrollador.</p>


