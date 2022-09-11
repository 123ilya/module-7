<?php

//$dir = 'C:\Users\sobolev_ia\Desktop';
//$files = scandir($dir);
//var_dump(is_dir($dir));
$searchRoot = './test_search';
$searchName = 'test.txt';
$searchResult = [];
//функция ищет и выводит файлы
function search($dir, $searchingFile, &$resultArray)
{
    foreach (scandir($dir) as $item) {
        if ($item !== '.' && $item !== '..' && is_dir($dir . '/' . $item)) {
            search($dir . '/' . $item, $searchingFile, $resultArray);
        } elseif ($item !== '.' && $item !== '..' && !is_dir($dir . '/' . $item) && $searchingFile == $item) {
            $resultArray[] =$dir.'/'. $item;
        }
    }
}

search($searchRoot, $searchName, $searchResult);

var_dump($searchResult);