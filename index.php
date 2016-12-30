<?php

header('Content-Type: application/json');

$fileNames = glob('classes/*.php');
foreach ($fileNames as $fileName)
{
    require_once($fileName);
}

$method = strtolower(Helper::stringValueInArray($_SERVER, 'REQUEST_METHOD', null, '/^get|post|put|delete$/i'));
$path = strtolower(Helper::stringValueInArray($_GET, 'restrequestpath', null, '/^[a-z0-9\/\+\-]+$/i'));
unset($_GET['restrequestpath']);

if ($method != null && $path != null)
{
    $rest = new Rest();

    $fileNames = glob('handlers/*.php');
    foreach ($fileNames as $fileName)
    {
        include_once($fileName);
    }

    echo(json_encode($rest->process($method, $path)));
}
else
{
    echo(json_encode(ResultProvider::failure('Invalid request!')));
}
