

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Localisation avec OpenStreetMap</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <link rel="stylesheet" type ="text/css" href="../css/sidebar.css">
     <!-- Custom Stylesheet -->
     <link href="css/style.css" rel="stylesheet">
     <!-- font-awesome -->
    <link href="font-awesome/css/all.css" type="text/css" rel="stylesheet">

</head>
<body>

<div id="map" style="height: 400px;"></div>
<br><br>
<button class="btn btn-primary" id="showLocation">Afficher ma localisation</button><br><br>
<button class="btn btn-primary"> <a href="ajouter_trajet.php">Retour à la page principale</a></button>

<script>
    var map = L.map('map').setView([0, 0], 2); // Centrer la carte sur une position par défaut (latitude, longitude, zoom)

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    // Gérer l'événement de localisation lorsque le bouton est cliqué
    document.getElementById('showLocation').addEventListener('click', function () {
        map.locate({ setView: true, maxZoom: 16 });
    });

    map.on('locationfound', function (e) {
        var lat = e.latlng.lat;
        var lon = e.latlng.lng;

        alert('Latitude: ' + lat + ', Longitude: ' + lon);
    });

    map.on('locationerror', function (e) {
        alert('La géolocalisation a échoué: ' + e.message);
    });
</script>

</body>
</html>
