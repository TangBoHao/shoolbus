<?php
$servername = "localhost";
$dbusername = "root";
$password = "123456";
$databasename='schoolbus';

$conn = mysqli_connect($servername, $dbusername, $password,$databasename);
mysqli_set_charset($conn,"utf8");
// 检测连接
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = " truncate table bus";
if ($conn->query($sql) === TRUE) {
    echo "接下进行跳转";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

header('Location:show.php');