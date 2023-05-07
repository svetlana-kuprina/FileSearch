<?php
$searchRoot = 'C:/111';
$searchName = 'readme.txt';
$searchResult = [];

function FileSearch(string $searchRoot, string $searchName, array &$searchResult): void
{
    $arrDir = scandir($searchRoot); //наполнение массива
    $countArr = count($arrDir); //счетчик for

 var_dump($arrDir); //вывод
//Проверка на . или .. массива
    for ($n=0;$n<$countArr;$n++) {
        if (($arrDir[$n] == ".") || ($arrDir[$n] == "..")){
            continue;
        }
        $searchRoot1 = $searchRoot. '/'. $arrDir[$n];
               if (is_dir($searchRoot1)){ //проверка папка или файл

            FileSearch($searchRoot1, $searchName, $searchResult); //рекурсия если папка
        }
        else if ($arrDir[$n]==$searchName){ //проверка по имени файла
            $searchResult[] = $searchRoot1;
        }
    }
}
FileSearch($searchRoot, $searchName, $searchResult);
if ($searchResult== null){ //проверка есть ли в массие что то
    echo 'Файл '. $searchName . ' не найден';
}else{
    $countArr2 = count($searchResult);
    for ($i=0;$i<$countArr2;$i++){
        if (filesize($searchResult[$i])){ //проверка пустой ли файл
         print_r($searchResult[$i]);
        }
    }
}

