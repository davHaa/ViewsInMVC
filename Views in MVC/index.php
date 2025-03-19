<?php

$hotels = [
    ['name' => 'Luerzer', 'description' => 'Die beste Erfahrung an der heimischen Natur in Oesterrech erhalten Sie hier.'],
    ['name' => 'Schwarzer Adler', 'description' => 'Der Schwarzer Adler ist für die schwarzen Adler atemberaubend.'],
    ['name' => 'Urban Lodge', 'description' => 'Die Urban Lodge bietet ein angenehmes Ambiente.'],
    ['name' => 'Zoku Vienna', 'description' => 'Gerade in Wien braucht man Erholung und dies erwartet Sie in Zoku Vienna.'],
    ['name' => 'Berghuette Steiermark', 'description' => 'Erlebe ein Abenteuer bei den fantastischen Berghuetten in der Steiermark.'],
    ['name' => 'Alpenblick Resort', 'description' => 'Ein traumhafter Blick auf die Alpen und erstklassige Wellnessangebote.'],
    ['name' => 'Seehotel Salzkammergut', 'description' => 'Genießen Sie Ruhe und Entspannung direkt am Wasser im Salzkammergut.'],
    ['name' => 'Schloss Hotel Tirol', 'description' => 'Ein historisches Schlosshotel mit königlichem Charme in Tirol.'],
    ['name' => 'Sonnenhof Kärnten', 'description' => 'Ein ruhiges Hideaway in Kärnten mit exzellenter Kulinarik.'],
    ['name' => 'Mountain Retreat Lech', 'description' => 'Perfekt für Skifahrer und Bergliebhaber mit luxuriösem Flair.']
];
$templateFile = 'template.html';
if (!file_exists($templateFile)) {
    die('Template file not found');
}

$template = file_get_contents($templateFile);

$hotelItems = "";
foreach ($hotels as $hotel) {
    $hotelTemplate = <<<HTML
        <div class="hotel">
            <h2>{{HOTEL_NAME}}</h2>
            <p>{{HOTEL_DESCRIPTION}}</p>
        </div>
    HTML;

    $hotelTemplate = str_replace(['{{HOTEL_NAME}}', '{{HOTEL_DESCRIPTION}}'], [$hotel['name'], $hotel['description']], $hotelTemplate);
    $hotelItems .= $hotelTemplate;
}

$output = str_replace('{{HOTELS}}', $hotelItems, $template);

echo $output;