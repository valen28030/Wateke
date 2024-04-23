<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WATEKE</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header class="bg-dark py-4" style="margin-top: 20px;">
        <div class="container" >
            <h1 class="text-white mb-0" >WATEKE</h1>
        </div>
    </header>
    <main class="py-4" style="margin-top: 50px;">
    <div class="container">
        <!-- Tu formulario de búsqueda de discotecas -->
        <form id="search-form">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="music">Music Style:</label>
                    <select id="music" class="form-control">
                        <option value="all">All</option>
                        <option value="reggaeton">Reggaeton</option>
                        <option value="techno">Techno</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="location">Location:</label>
                    <select id="location" class="form-control">
                        <option value="madrid">Madrid</option>
                        <option value="barcelona">Barcelona</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Search</button>
            </div>
        </form>
        <!-- Resultados de búsqueda -->
        <div id="results">
            <!-- Aquí se mostrarán los resultados de la búsqueda -->
        </div>
    </div>
</main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap"async defer></script>


    <!-- Tu script JavaScript -->
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
        

        // Función para abrir Google Maps con la dirección de la discoteca
        function openGoogleMaps(address) {
            const googleMapsUrl = `https://www.google.com/maps?q=${encodeURIComponent(address)}`;
            window.open(googleMapsUrl, '_blank');
        }

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

        // Llama a la función initMap una vez que se haya cargado la API de Google Maps
        function loadMapScript() {
            const script = document.createElement("script");
            script.src = `https://maps.googleapis.com/maps/api/js?key=&callback=initMap`;
            script.defer = true;
            document.body.appendChild(script);
        }

        // Carga el script del mapa cuando se cargue la página
        window.onload = loadMapScript;
    </script>

    
<div id="map" style="width: 80%; height: 415px; margin: auto auto; border-radius: 10px; overflow: hidden; margin-top: 50px; margin-bottom: 20px;"></div>
    <footer  style="margin-top: 100px;">
        <nav class="footer-nav">
            <a href="#">Main</a>
            <a href="php/new_reviews.php">New Review</a>
            <a href="uber://">Uber</a>
            <a href="https://pnsd.sanidad.gob.es/ciudadanos/informacion/alcohol/menuAlcohol/mitosRealidades.htm" target="_blank">No te Pases</a>
        </nav>
    </footer>
</body>

</html>
