<?php
header("Content-type: text/html; charset=utf-8");
$servername = "localhost";
$username = "root";
$password = "123456";
$databasename='schoolbus';

// 创建连接
$conn = mysqli_connect($servername, $username, $password);
// 检测连接
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE schoolbus
		CHARACTER SET 'utf8' 
		COLLATE 'utf8_general_ci'";
if (mysqli_query($conn, $sql)) {
    echo "校车数据库创建成功";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

?>

<?php
$dbname="schoolbus";
$conn = new mysqli($servername, $username, $password, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql2 = "CREATE TABLE bus (
num VARCHAR(100) NOT NULL PRIMARY KEY,
location VARCHAR(100) NOT NULL,
count INT NOT NULL default 1,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
)ENGINE=InnoDB DEFAULT CHARSET=utf8";

if ($conn->query($sql2) === TRUE) {
    echo "校车位置数据表创建成功";
} else {
    echo "Error creating table: " . $conn->error;
}

mysqli_close($conn);
?>