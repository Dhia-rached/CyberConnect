var map = L.map('map').setView([36.899493, 10.189153], 13);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

L.marker([36.899493, 10.189153]).addTo(map)
    .bindPopup('SPORT<br> VISITEZ NOUS ')
    .openPopup();