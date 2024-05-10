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

        if ($key === 'email')
            $sanitized = filter_var($sanitized, FILTER_SANITIZE_EMAIL);

        if ($key === 'bdate')
            $sanitized = date('Y-m-d', strtotime($sanitized));


        $sanitizedData[$key] = $sanitized;
    }

    return $sanitizedData;
}


function validate(array $typeFields, array $data): array
{
    $validatedData = [];
    $errors = [];

    foreach ($typeFields as $field => $type) {

        $value = $data[$field] ?? null;

        if (empty($value) && $type != 'file')
            $errors[] = "une entrée est requise pour " . $field;

        else {
            //mettre dans se else tout se qui doit être obligatoire a entré

            if ($type === 'string' && $field != 'number') {

                $validatedData[$field] = $value;

            } elseif ($type === 'int') {

                if (!filter_var($value, FILTER_VALIDATE_INT))
                    $errors[] = "le champ " . $field . " doit être un nombre valide";
                else
                    $validatedData[$field] = $value;

            } elseif ($type === 'email') {
                if (!filter_var($value, FILTER_VALIDATE_EMAIL))
                    $errors[] = "le champ " . $field . " doit être un email valide";
                else
                    $validatedData[$field] = $value;


            } elseif ($type === 'date') {

                if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $value) || $value > date('Y-m-d'))
                    $errors[] = "le champ " . $field . " doit être une date valide";
                else
                    $validatedData[$field] = $value;
            }

            elseif ($type === 'time') {

                if (!preg_match('/^\d{2}:\d{2}$/', $value))
                    $errors[] = "le champ " . $field . " doit être une heure valide";
                else
                    $validatedData[$field] = $value;
            }

            elseif ($field === "number") {

                if (!preg_match('/^\+?\d+$/', $value))
                    $errors[] = "le champ " . $field . " doit être un numéro valide";
                else
                    $validatedData[$field] = $value;

            }

        }

        if ($type === 'file') {
            if (isset($_FILES[$field]) && $_FILES[$field]['error'] == 0) {
                $allowed = array('jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg', 'png' => 'image/png');
                $filetype = $_FILES[$field]["type"];
                $filesize = $_FILES[$field]["size"];
                $maxSize = 2 * 1024 * 1024; //2MO

                $check = getimagesize($_FILES[$field]["tmp_name"]);
                if($check === false) {
                    $errors[] = "Le fichier n'est pas une image.";
                }

                if (!in_array($filetype, $allowed))
                    $errors[] = "le fichier doit être de type jpg, jpeg ou png";
                elseif ($filesize > $maxSize)
                    $errors[] = "le fichier doit être de taille inférieur à 2MO";
                else
                    $validatedData[$field] = $field;
            }
        }

    }
    return [$validatedData, $errors];
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sanitizedData = sanitize($_POST);
    $validatedData = validate($validateType, $sanitizedData);

    if (empty($validatedData[1])) {
        echo "Tout est bon: ";
        print_r($validatedData[0]);
    } else {
        echo "Erreur: ";
        print_r($validatedData[1]);
    }


}