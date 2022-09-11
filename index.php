<?php


$searchRoot = './test_search';
$searchName = 'test.txt';
$searchResult = [];
function search(string $dir,string $searchingFile,array &$resultArray)
{
    foreach (scandir($dir) as $item) {
        if ($item !== '.' && $item !== '..' && is_dir($dir . '/' . $item)) {
            search($dir . '/' . $item, $searchingFile, $resultArray);
        } elseif ($item !== '.' && $item !== '..' && !is_dir($dir . '/' . $item) && $searchingFile == $item) {
            $resultArray[] = $dir . '/' . $item;
        }
    }
}

//
function searchFile(string $dir,string $searchingFile,array &$resultArray)
{
    search($dir, $searchingFile, $resultArray);
    //-------------------------------------------
    function isSize(string $file): bool
    {
        return (boolean)filesize($file);
    }

    $resultArray = array_filter($resultArray, 'isSize');
    if (count($resultArray)) {
        foreach ($resultArray as $item) {
            echo $item . PHP_EOL;
        }
    } else {
        echo 'Поиск не дал результатов!' . PHP_EOL;
    }
}


searchFile($searchRoot, $searchName, $searchResult);