<?php

require_once __DIR__ . '/vendor/autoload.php';

use ViewsInMVC\Entity\Hotel;

$hotels = [
    new Hotel("Luerzer Alm", "src/images/luerzer_obertauern.jpg", "Wo die Berge den Himmel berühren, findest du dein perfektes Zuhause auf Zeit."),
    new Hotel("Wilder Kaiser", "src/images/wilder_kaiser.jpg", "Erholung auf höchstem Niveau – ein Aufenthalt, der die Seele verwöhnt."),
    new Hotel("Gut-Berg Naturhotel", "src/images/gut_berg_naturhotel.jpg", "Luxus inmitten der Natur – hier beginnt dein unvergessliches Abenteuer."),
    new Hotel("Alpinhotel Hintertux", "src/images/alpinhotel_hintertux.jpg", "Eintauchen, loslassen, genießen – dein Rückzugsort für Körper und Geist."),
];

$template = file_get_contents(__DIR__ . '/template.html');

$hotelHtml = "";
foreach ($hotels as $hotel) {
    $hotelHtml .= str_replace(
        ['{{hotel_image}}', '{{hotel_name}}', '{{hotel_description}}',],
        [$hotel->getImage(), $hotel->getName(), $hotel->getDescription(),],
        '<div class="hotel">
            <img src="{{hotel_image}}" alt="{{hotel_name}}">
            <h2>{{hotel_name}}</h2>
            <p>{{hotel_description}}</p>
        </div>'
    );
}

$template = str_replace("<!-- START_HOTEL_LOOP -->", $hotelHtml, $template);
$template = str_replace("<!-- END_HOTEL_LOOP -->", "", $template);

echo $template;
