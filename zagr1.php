<?php
function translit($text) {
    $converter = array(
        'а' => 'a',   'б' => 'b',   'в' => 'v',
        'г' => 'g',   'д' => 'd',   'е' => 'e',
        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
        'и' => 'i',   'й' => 'y',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',
        'о' => 'o',   'п' => 'p',   'р' => 'r',
        'с' => 's',   'т' => 't',   'у' => 'u',
        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
        'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
        'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
        'А' => 'A',   'Б' => 'B',   'В' => 'V',
        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
        'И' => 'I',   'Й' => 'Y',   'К' => 'K',
        'Л' => 'L',   'М' => 'M',   'Н' => 'N',
        'О' => 'O',   'П' => 'P',   'Р' => 'R',
        'С' => 'S',   'Т' => 'T',   'У' => 'U',
        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
        'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
        'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
    );
    return strtr($text, $converter);
}
$link = mysqli_connect ( '127.0.0.1', 'root', '', 'mycms');
if (!$link) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Соединение с MySQL установлено!" . PHP_EOL;
echo "Информация о сервере: " . mysqli_get_host_info($link) . PHP_EOL;


if (!empty($_FILES['uploadfile']['name']))

{
    $uploaddir="images/";
    $file = $uploaddir.basename($_FILES['uploadfile']['name']);
    $uploadfile = translit($file);

    if (!is_uploaded_file($_FILES['uploadfile']['tmp_name']))
    {
        echo 'ошибка передачи файла';
    }
    else
    {

        if(move_uploaded_file($_FILES['uploadfile']['tmp_name'], $uploadfile))
        {
            $query = mysqli_query($link, "INSERT INTO products (image) VALUES ('".$uploadfile."')");

            if($query) {
            	echo "Файл упешно загружен";
            }
            else {
            	echo "Путь не добавлен в базу данных, но файл загружен ".mysql_error();
            }
        }
        else {
        	echo "Файл не загружен, ";
        }
    }
}
   
var_dump($_POST); 

/*if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['upload']))
{
    $files = reset($_FILES);
    $permits = array('png','jpg','jpeg'); // разрешенные расширения
    $name = pathinfo($filename, PATHINFO_FILENAME);
    $extension = pathinfo($filename,PATHINFO_EXTENSION);
    $rand = rand(1,10000); // рандомное число от 1 до 10000
    $new_name = translit($name).'_'.$rand.'.'.$extention;
    
    if(in_array($extention,$permits))
    {
    	$result = move_uploaded_file($path,'images/'.$new_name);
    	print_r($result);
    	if($result)
        {
            $res = "INSERT INTO images ('filename') VALUES ('".$new_name."')";
         	echo $res.'<br>';
            $resul = mysql_query($res);
            if($resul)
            {
            	echo "Файл упешно загружен";
            }
            else
            {
            	echo "Путь не добавлен в базу данных, но файл загружен ".mysql_error();
            } 
        }
        else echo "Файл не загружен, ";
    }
} */

?>

<html>
    <div style="float: left;width: 45%;padding: 10px;">
        <h3>Загрузка изображений</h3>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<form action="" method="post" enctype="multipart/form-data">
<input type="file" name="uploadfile" value="Обзор">
<input type="submit" value="ok">
</form>
</div>
</html>