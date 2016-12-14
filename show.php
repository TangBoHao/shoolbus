<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta http-equiv="refresh" content="2"> 
	<title>民大校车位置信息</title>
</head>
<body>
<?php 

header("Content-type: text/html; charset=utf-8");
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "schoolbus";
$i=0;
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// 检测连接
mysqli_set_charset($conn,"utf8");
$sql = "SELECT * FROM bus";
// if ($conn->query($sql) === TRUE) {
//     echo "成功";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // 输出每行数据
    while($row = $result->fetch_assoc()) {
    	
        $bookinformation[$i]= "<br>编号为 ". $row["num"]."的校车的位置是:<br> ". $row["location"]."<hr>";
        echo $bookinformation[$i];
    	$i++;

    }
} else {
    echo "暂无已知的校车位置信息";
}
$conn->close();


 ?>
	
</body>
</html>