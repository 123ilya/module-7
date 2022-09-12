<?php

//1. Создаём переменную с дирректорией, в которой будет осуществляться поиск.
$searchRoot = './test_search';
// Создаём переменную с именем файла, который необходимо найти в дирректории.
$searchName = 'test.txt';
//2. Создаём пустой массив, где в случае успеха будут храниться все совпадения с запросом.
$searchResult = [];
//3.Создаём функцию, рекурсивно обхлодящую дирректорию. В случае, нахождения файла, путь файла добавляется в массив.
function search(string $dir, string $searchingFile, array &$resultArray)
{
    foreach (scandir($dir) as $item) {
        if ($item !== '.' && $item !== '..' && is_dir($dir . '/' . $item)) {
            search($dir . '/' . $item, $searchingFile, $resultArray);
        } elseif ($item !== '.' && $item !== '..' && !is_dir($dir . '/' . $item) && $searchingFile == $item) {
            $resultArray[] = $dir . '/' . $item;
        }
    }
}

//4. Вызываем функцию с заданными аргументами
search($searchRoot, $searchName, $searchResult);
//5. Выводим результат, обходя массив. В случае отсутствия результата выводим соответствующее сообщение.
if (count($searchResult) == 0) {
    echo 'Поиск не дал результатов!';
} else foreach ($searchResult as $item) {
    echo $item . PHP_EOL;
}




// Функция обёртка, позволяющая что либо делать, после обхода дирректорий и формирования массива результатов
//function searchFile(string $dir, string $searchingFile, array &$resultArray)
//{
//    search($dir, $searchingFile, $resultArray);
//    // функция, проверяющая пустой файл или нет
//    function isSize(string $file): bool
//    {
//        return (boolean)filesize($file);
//    }
//
////Фильтруем массив от пустых файлов
//    $resultArray = array_filter($resultArray, 'isSize');
//    if (count($resultArray)) {
//        foreach ($resultArray as $item) {
//            echo $item . PHP_EOL;
//        }
//    } else {
//        echo 'Поиск не дал результатов!' . PHP_EOL;
//    }
//}
//
//searchFile($searchRoot, $searchName, $searchResult);
