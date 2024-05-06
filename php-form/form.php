<?php

$typeFields = [
    'bdate' => 'string',
    'event' => 'string',
    'artist' => 'string',
    'description' => 'string',
    'promo' => 'string',
    'venue_name' => 'string',
    'venue_address_1' => 'string',
    'venue_address_2' => 'string',
    'city' => 'string',
    'region' => 'string',
    'postal' => 'string',
    'country' => 'string',
    'capacity' => 'int',
    'attendance' => 'int',
    'performance' => 'string',
    'time' => 'string',
    'contact_firstname' => 'string',
    'contact_lastname' => 'string',
    'email' => 'string',
    'number' => 'int',
    'recorded' => 'string',
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($typeFields as $field => $type) {
        if (isset($_POST[$field])) {
            if ($type == 'string'){
                ${$field} = htmlspecialchars($_POST[$field], ENT_QUOTES, 'UTF-8');
            }
            elseif ($type == 'int'){
                ${$field} = filter_var($_POST[$field], FILTER_VALIDATE_INT);
            }
        } else {
            echo "Invalid request: $field is not set";
            break;
        }
    }
}