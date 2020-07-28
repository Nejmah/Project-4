<?php

$variables = [
    'URL_PREFIX' => "",
    'DB_HOST' => "localhost",
    'DB_USERNAME' => "",
    'DB_PASSWORD' => "",
    'DB_NAME' => ""
];

foreach ($variables as $key => $value) {
    putenv("$key=$value");
}

?>