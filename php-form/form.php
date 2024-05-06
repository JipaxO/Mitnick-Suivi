<?php

$typeFields = [
    'bdate' => 'date',
    'event' => 'string',
    'artist' => 'string',
    'description' => 'string',
    'promo' => 'string',
    'venue_name' => 'string',
    'venue_address_1' => 'string',
    'venue_address_2' => 'string',
    'city' => 'string',
    'region' => 'string',
    'postal' => 'int',
    'country' => 'string',
    'capacity' => 'int',
    'attendance' => 'int',
    'performance' => 'string',
    'time' => 'int',
    'contact_firstname' => 'string',
    'contact_lastname' => 'string',
    'email' => 'email',
    'number' => 'string',
    'recorded' => 'string',
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($typeFields as $field => $type) {
        if (isset($_POST[$field])) {
            // Sanitize
            $sanitized = htmlspecialchars($_POST[$field], ENT_QUOTES, 'UTF-8');

            // Validate
            if ($type == 'string'){
                ${$field} = $sanitized;
            }
            elseif ($type == 'int'){
                ${$field} = filter_var($sanitized, FILTER_VALIDATE_INT);
                if (${$field} === false) {
                    echo "Invalid request: $field is not a valid integer";
                    break;
                }
            }
            elseif ($type == 'email'){
                ${$field} = filter_var($sanitized, FILTER_VALIDATE_EMAIL);
                if (${$field} === false) {
                    echo "Invalid request: $field is not a valid email";
                    break;
                }
            }
            elseif ($type == 'date'){
                $date = date('Y-m-d', strtotime($sanitized));
                if (!$date) {
                    echo "Invalid request: $field is not a valid date";
                    break;
                } else {
                    ${$field} = $date;
                }
            }
        } else {
            echo "Invalid request: $field is not set";
            sleep(5);
            header('location: index.html');
        }
    }
}
