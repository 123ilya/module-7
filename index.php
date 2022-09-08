<?php

//$dir = 'C:\Users\sobolev_ia\Desktop';
//$files = scandir($dir);
//var_dump(is_dir($dir));
$searchRoot = '//opt/lampp/htdocs/Welcome/7/module-7/test_search';
$searchName = 'test.html';
$searchResult = [];

function search($dir)
{
    foreach (scandir($dir) as $item) {
        if ($item !== '.' && $item !== '..') {
            echo $item . PHP_EOL;
        }
    }
}

search($searchRoot);
//ghjfff
