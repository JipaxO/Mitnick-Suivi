<?php

$validateType = [
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
    'fileToUpload' => 'file'
];

function sanitize(array $data): array
{
    $sanitizedData = [];
    foreach ($data as $key => $value) {

        $sanitized = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

        $sanitizedData[$key] = $sanitized;
    }

    return $sanitizedData;
}


function validate(array $typeFields, array $data): array
{
    $validatedData = [];
    $errors = [];

    foreach ($typeFields as $field => $type) {
        if (!isset($data[$field])) {
            $errors[] = "Missing: $field";
            continue;
        }

        $value = $data[$field];

        if (empty($value) && $type != 'file')
            $errors[] = "une entrée est requise pour " . $field;

        else {

            if ($type === 'string') {

                $validatedData[$field] = $value;

            } elseif ($type === 'int') {

                if (!filter_var($value, FILTER_VALIDATE_INT))
                    $errors[] = "le champ " . $field . " doit être un nombre valide";
                else
                    $validatedData[$field] = $value;

            } elseif ($type === 'email') {
                $email = filter_var($value, FILTER_VALIDATE_EMAIL);
                $validatedData[$field] = $email;
            } elseif ($type === 'date') {
                $date = date('Y-m-d', strtotime($value));
                $validatedData[$field] = $date;
            }

        }

        if ($type === 'file') {


            if (isset($_FILES[$value]) && $_FILES[$value]['error'] == 0) {
                $allowed = array('jpg=>image/jpeg', 'jpeg=>image/jpeg', 'png=>image/png');
                $filename = $_FILES[$field]["name"];
                $filetype = $_FILES[$field]["type"];
                $filesize = $_FILES[$field]["size"];
                $extention = pathinfo($filename, PATHINFO_EXTENSION);
                $maxSize = 2 * 1024 * 1024; //2MO


            }


            $validatedData[$field] = $value;
        }

        return [$validatedData, $errors];
    }
    return $validatedData;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sanitizedData = sanitize($_POST);
}