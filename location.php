<?php
header("Content-type:text/html;charst=utf-8");
$a=$_GET['a'];
$b=$_GET['b'];
$num=$_GET['num'];

$servername = "localhost";
$dbusername = "root";
$password = "123456";
$databasename='schoolbus';


$url="http://api.map.baidu.com/geocoder/v2/?callback=renderReverse&location=$a,$b&output=json&pois=0&ak=hzudQsrtRdjhAjiOwzGGgbBF0rpdDyGZ";
$req=curl_init($url);

$options=[

CURLOPT_RETURNTRANSFER =>true,
//CURLOPT_HEADER => true,
CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
];
curl_setopt_array($req,$options);
$re=curl_exec($req);
function filter($str) 
{ 
$result = array(); 
preg_match_all("/(?:\()(.*)(?:\))/i",$str, $result); 
return $result[1][0]; 
}
$re=filter($re);
$re=json_decode($re,true);
//var_dump($re);
$location=$re['result']['sematic_description'];


$conn = mysqli_connect($servername, $dbusername, $password,$databasename);
mysqli_set_charset($conn,"utf8");
// 检测连接
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO bus (num, location) VALUES ('$num','$location') ON DUPLICATE KEY UPDATE count=count+1";

if ($conn->query($sql) === TRUE) {
    echo "位置信息插入成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
