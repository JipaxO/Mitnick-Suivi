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
    'fileToUpload' => 'file'
];

$validateData = [];
$errors = [];

try {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        foreach ($typeFields as $field => $type) {

            if (isset($_POST[$field])) {

                // Sanitize
                $sanitized = htmlspecialchars($_POST[$field], ENT_QUOTES, 'UTF-8');

                // Validate

                if ($type == 'string') {
                    if (empty($sanitized)) {
                        $errors[] = "Invalid request: $field is empty";
                        break;

                    } else {
                        ${$field} = $sanitized;
                        $validateData[$field] = ${$field};
                    }

                } elseif ($type == 'int') {
                    ${$field} = filter_var($sanitized, FILTER_VALIDATE_INT);
                    if (${$field} === false) {
                        $errors[] = "Invalid request: $field is not a valid integer";
                        break;
                    }

                } elseif ($type == 'email') {
                    ${$field} = filter_var($sanitized, FILTER_SANITIZE_EMAIL);
                    $validateData[$field] = ${$field};

                    if (filter_var(${$field}, FILTER_VALIDATE_EMAIL) === false) {
                        $errors[] = "Invalid request: $field is not a valid email";
                        break;
                    }

                } elseif ($type == 'date') {
                    $date = date('Y-m-d', strtotime($sanitized));
                    if (!$date) {
                        $errors[] = "Invalid request: $field is not a valid date";
                        break;
                    } else {
                        ${$field} = $date;
                        $validateData[$field] = ${$field};
                    }

                } else if ($type == 'file') {

                    if (isset($_FILES[$field]) && $_FILES[$field]['error'] == 0) {

                        $allowed = array('jpg=>image/jpeg', 'jpeg=>image/jpeg', 'png=>image/png');
                        $filename = $_FILES[$field]["name"];
                        $filetype = $_FILES[$field]["type"];
                        $filesize = $_FILES[$field]["size"];
                        $extention = pathinfo($filename, PATHINFO_EXTENSION);

                        if (!array_key_exists($extention, $allowed)) {
                            $errors[] = "Invalid file type";
                        } else {
                            $maxsize = 2 * 1024 * 1024; // 2 MO

                            if ($filesize > $maxsize) {
                                $errors[] = "File size is too large";
                            } else {
                                if (in_array($filetype, $allowed)) {
                                    ${$field} = $_FILES[$field];
                                    $validateData[$field] = ${$field};
                                } else {
                                    $errors[] = "ERROR: There was a problem uploading your file. Please try again.";
                                }
                            }
                        }
                    }


                } else {
                    $errors[] = "invalid request: $field is no set";
                    break;
                }
            }
        }

        if (empty($errors)) {
            echo "Validation successful. Here your data: <br>";
            foreach ($validateData as $key => $value) {
                echo $key . " : " . $value . "<br>";
            }
        } else {
            echo "Validation failed with the following errors: ";
            print_r($errors);
        }

    }
} catch
(Exception $e) {

    echo 'Exception: ', $e->getMessage(), "\n";

}