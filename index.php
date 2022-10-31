<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>
<form action="index.php" method="post">
    <input type="text" name="name" placeholder="Введите имя..." class="form-control">
    <input type="submit" value="Зафиксировать в файл" class="btn btn-danger">
</form>

<?php
error_reporting(E_ERROR | E_PARSE);
$filename = "text.txt";
$host_uri = $_SERVER["HTTP_HOST"]." - ".$_SERVER["REQUEST_URI"];
$user_agent = $_SERVER["HTTP_USER_AGENT"];
$date = date("F j, Y, g:i a");

foreach($_POST as $key => $val) {
    $name=$val;
}

if(is_numeric($name) == true || strlen($name) <= 3 || preg_match("/[\'^£$%&*()}{@#~?><>,|=_+¬-]/", $name) == true) {
    echo "Введите валидное имя)";
}

else {
    $file = fopen($filename, "w");
    fwrite($file, $name . PHP_EOL);
    fwrite($file, $host_uri . PHP_EOL);
    fwrite($file, $user_agent . PHP_EOL);
    fwrite($file, $date . PHP_EOL);
    fclose($file);
}
?>
</body>
</html>