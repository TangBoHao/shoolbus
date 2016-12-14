<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta http-equiv="refresh" content="10"> 
	<title>校车正在定位中</title>
	
</head>
<body>
<?php
$num=$_GET['number'];
echo "$num";




?>
该辆校车的编号为<input type="text" id="num">
<div id="show">这里显示提示信息</div>
<div id="y">这里显示定位是否成功的信息</div>


<script type="text/javascript" src="jquery-3.1.0.min.js"></script>
<script type="text/javascript">
	var num=document.getElementById('num');
	var n=<?php echo "'".$num."'" ?>;
	num.value=n;
</script>
<script type="text/javascript" >
	window.onload=function(){
var a;
var b;
var num=document.getElementById('num').value;
var x=document.getElementById("show");
var y=document.getElementById("y");
function location()
{
  if (navigator.geolocation)
    {
    navigator.geolocation.getCurrentPosition(showPosition);
    }
  else{x.innerHTML="Geolocation is not supported by this browser.";}
}
function showPosition(position)
  {
    console.log("Latitude: " + position.coords.latitude);
    console.log("Longitude: " + position.coords.longitude);
  x.innerHTML="维度: " + position.coords.latitude +
  "<br />经度: " + position.coords.longitude;
  a=position.coords.latitude;
  b=position.coords.longitude;

  sendmsg();
  }

function sendmsg(){
  $.ajax({
type: 'GET',
url: 'location.php',
data: {a: a,b:b,num:num},
success:function(msg){
// msg: php返回内容
/* alert(修改成功); */
//console.log(msg);
console.log('success');
window.location = window.location;
},
error:function(msg){
// 提交失败
y.innerHTML="由于某些特殊情况定位失败";
}
});
}

location();
function test(){
  console.log("test");
}
//setInterval(location,5000);
//setInterval(sendmsg,6000);

}
</script>


</script>	


</body>
</html>