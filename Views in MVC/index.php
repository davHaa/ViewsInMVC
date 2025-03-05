<?php

// Define hotels array with sample data
$hotels = [
    [
        'name' => 'Bellagio',
        'description' => 'A luxurious hotel with a stunning fountain show.',
        'image' => 'bellagio.jpg'
    ],
    [
        'name' => 'Caesars Palace',
        'description' => 'An iconic resort with Roman-themed architecture.',
        'image' => 'caesars.jpg'
    ],
    [
        'name' => 'The Venetian',
        'description' => 'A breathtaking Venice-themed experience.',
        'image' => 'venetian.jpg'
    ]
];

// Load template file
$template = file_get_contents('template.html');

// Generate hotel content dynamically
$hotelItems = "";
foreach ($hotels as $hotel) {
    $hotelItems .= <<<HTML
        <div class="hotel">
            <h2>{$hotel['name']}</h2>
            <img src="images/{$hotel['image']}" alt="{$hotel['name']}">
            <p>{$hotel['description']}</p>
        </div>
    HTML;
    //////////////
}

// Replace placeholder in template
$output = str_replace('{{HOTELS}}', $hotelItems, $template);

// Output final HTML
echo $output;
?>