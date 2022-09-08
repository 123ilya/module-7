<?php

//$dir = 'C:\Users\sobolev_ia\Desktop';
//$files = scandir($dir);
//var_dump(is_dir($dir));
$searchRoot = '/opt/lampp/htdocs/Welcome/module-7/test_search';
//$searchRoot = 'C:\Users\sobolev_ia\Desktop\PHP study\module-7\test_search';
$searchName = 'test.html';
$searchResult = [];

function search($dir)
{
    foreach (scandir($dir) as $item) {
        if ($item !== '.' && $item !== '..' && is_dir($dir.'/'.$item)) {
            echo 'folder '. $item.PHP_EOL;
        } else echo 'file '.$item.PHP_EOL;

    }
}

search($searchRoot);

