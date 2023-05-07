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
               if (is_dir($searchRoot1)){

            FileSearch($searchRoot1, $searchName, $searchResult);
        }
        else if ($arrDir[$n]==$searchName){
            $searchResult[] = $searchRoot1;
        }
    }
}
FileSearch($searchRoot, $searchName, $searchResult);
if ($searchResult== null){
    echo 'Файл '. $searchName . ' не найден';
}else{
    print_r($searchResult);
}

