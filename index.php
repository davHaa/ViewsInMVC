<?php

require_once __DIR__ . '/vendor/autoload.php'; // Composer Autoload einbinden

use ViewsInMVC\Entity\Hotel; // Korrekte Klasse importieren

$hotels = [
    new Hotel("HTL Rennweg", "images/htl_rennweg.jpg", "Moderne Bildungseinrichtung mit Schwerpunkt auf Technik.", 5),
    new Hotel("McDonald's Wien", "images/mcdonalds.jpg", "Schnellrestaurant mit internationaler Küche.", 4),
    new Hotel("Reumannplatz", "images/reumannplatz.jpg", "Zentrale Verkehrsdrehscheibe in Wien.", 4.5),
    new Hotel("Sigma Nation", "images/sigma_nation.jpg", "Legendärer Ort für moderne Unterhaltung.", 5),
];

$template = file_get_contents(__DIR__ . '/template.html');

$hotelHtml = "";
foreach ($hotels as $hotel) {
    $hotelHtml .= str_replace(
        ['{{hotel_image}}', '{{hotel_name}}', '{{hotel_description}}', '{{hotel_rating}}'],
        [$hotel->getImage(), $hotel->getName(), $hotel->getDescription(), $hotel->getRating()],
        '<div class="hotel">
            <img src="{{hotel_image}}" alt="{{hotel_name}}">
            <h2>{{hotel_name}}</h2>
            <p>{{hotel_description}}</p>
            <p><strong>Rating:</strong> {{hotel_rating}}</p>
        </div>'
    );
}

$template = str_replace("<!-- START_HOTEL_LOOP -->", $hotelHtml, $template);
$template = str_replace("<!-- END_HOTEL_LOOP -->", "", $template);

echo $template;
