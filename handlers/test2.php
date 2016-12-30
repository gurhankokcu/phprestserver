<?php

$rest->get('test2/:param1/test/:param2', 'restGetTest2');
$rest->post('test2/data1/:param1', 'restPostTest2Data1');
$rest->post('test2/data2/:param1', 'restPostTest2Data2');
$rest->put('test2/:param1', 'restPutTest2');
$rest->delete('test2/:param1/test/:param2', 'restDeleteTest2');

function restGetTest2($param1, $param2)
{
    $urlParam1 = Helper::stringValueInArray($_GET, 'param1');
    $urlParam2 = Helper::stringValueInArray($_GET, 'param2');
    return ResultProvider::success('test get request with parameter 1 "' . $param1 . '" and parameter 2 "' . $param2 . '" and url parameter 1 "' . $urlParam1 . '" and url parameter 2 "' . $urlParam2 . '" succeeded...');
}

function restPostTest2Data1($param1)
{
    $formParam1 = Helper::stringValueInArray($_POST, 'param1');
    $formParam2 = Helper::stringValueInArray($_POST, 'param2');
    return ResultProvider::success('test post request with url parameter 1 "' . $param1 . '", form parameter 1 "' . $formParam1 . '" and form parameter 2 "' . $formParam2 . '" succeeded...');
}

function restPostTest2Data2($param1)
{
    $formBody = get_object_vars(json_decode(file_get_contents('php://input')));
    $formParam1 = Helper::stringValueInArray($formBody, 'param1');
    $formParam2 = Helper::stringValueInArray($formBody, 'param2');
    return ResultProvider::success('test post request with url parameter 1 "' . $param1 . '", form parameter 1 "' . $formParam1 . '" and form parameter 2 "' . $formParam2 . '" succeeded...');
}

function restPutTest2($param1)
{
    $formBody = get_object_vars(json_decode(file_get_contents('php://input')));
    $formParam1 = Helper::stringValueInArray($formBody, 'param1');
    $formParam2 = Helper::stringValueInArray($formBody, 'param2');
    return ResultProvider::success('test put request with url parameter 1 "' . $param1 . '", form parameter 1 "' . $formParam1 . '" and form parameter 2 "' . $formParam2 . '" succeeded...');
}

function restDeleteTest2($param1, $param2)
{
    return ResultProvider::success('test delete request with parameter 1 "' . $param1 . '" and parameter 2 "' . $param2 . '" succeeded...');
}
