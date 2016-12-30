<?php

$rest->get('test1', 'restGetTest1');
$rest->post('test1', 'restPostTest1');
$rest->put('test1', 'restPutTest1');
$rest->delete('test1', 'restDeleteTest1');

function restGetTest1()
{
    return ResultProvider::success('test get request succeeded...');
}

function restPostTest1()
{
    return ResultProvider::success('test post request succeeded...');
}

function restPutTest1()
{
    return ResultProvider::success('test put request succeeded...');
}

function restDeleteTest1()
{
    return ResultProvider::success('test delete request succeeded...');
}
