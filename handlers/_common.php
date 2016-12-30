<?php

$rest->before('restBeforeEachCall');
$rest->after('restAfterEachCall');

function restBeforeEachCall()
{
//    var_dump('before function called');
}

function restAfterEachCall()
{
//    var_dump('after function called');
}
