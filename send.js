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