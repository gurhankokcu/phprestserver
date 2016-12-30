<?php

$rest->get('test3', 'authenticateUser', 'restGetTest3');
$rest->post('test3', 'authenticateUser', 'restPostTest3');
$rest->put('test3', 'authenticateUser', 'restPutTest3');
$rest->delete('test3', 'authenticateUser', 'restDeleteTest3');

function authenticateUser()
{
    $isAuthenticated = false;
    if ($isAuthenticated)
    {
        return ResultProvider::success();
    }
    return ResultProvider::unauthorized('Unauthorized!');
}

function restGetTest3()
{
    return ResultProvider::success('test get request succeeded...');
}

function restPostTest3()
{
    return ResultProvider::success('test post request succeeded...');
}

function restPutTest3()
{
    return ResultProvider::success('test put request succeeded...');
}

function restDeleteTest3()
{
    return ResultProvider::success('test delete request succeeded...');
}
