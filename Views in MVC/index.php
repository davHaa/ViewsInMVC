<?php

$hotels = [
    ['name' => 'Bellagio', 'description' => 'A luxurious hotel with a stunning fountain show.'],
    ['name' => 'Caesars Palace', 'description' => 'An iconic resort with Roman-themed architecture.'],
    ['name' => 'The Venetian', 'description' => 'A breathtaking Venice-themed experience.'],
    ['name' => 'MGM Grand', 'description' => 'A grand hotel with a lion habitat.'],
    ['name' => 'Wynn Las Vegas', 'description' => 'A high-end hotel with a golf course.']
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
?>