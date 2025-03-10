<?php

$md5HashKey = 'd1fa402db91a7a93c4f414b8278ce073';

function countPercentageGlobal($searchChara) {
    global $md5HashKey;
    $count = substr_count($md5HashKey, $searchChara);
    $totalLength = strlen($md5HashKey);
    $percentage = ($count / $totalLength) * 100;
    echo "Function 1: The needle '" . $searchChara . "' occurs " . $count . " times (" . number_format($percentage, 2) . "%) in the hash key '" . $md5HashKey . "'<br>";
}

function countPercentageGlobalsArray($searchChara) {
    $count = substr_count($GLOBALS['md5HashKey'], $searchChara);
    $totalLength = strlen($GLOBALS['md5HashKey']);
    $percentage = ($count / $totalLength) * 100;
    echo "Function 2: The needle '" . $searchChara . "' occurs " . $count . " times (" . number_format($percentage, 2) . "%) in the hash key '" . $GLOBALS['md5HashKey'] . "'<br>";
}

function countPercentageStatic($searchChara) {
    static $hashKey = 'd1fa402db91a7a93c4f414b8278ce073';
    $count = substr_count($hashKey, $searchChara);
    $totalLength = strlen($hashKey);
    $percentage = ($count / $totalLength) * 100;
    echo "Function 3: The needle '" . $searchChara . "' occurs " . $count . " times (" . number_format($percentage, 2) . "%) in the hash key '" . $hashKey . "'<br>";
}

countPercentageGlobal('2');
countPercentageGlobalsArray('8');
countPercentageStatic('a');

?>