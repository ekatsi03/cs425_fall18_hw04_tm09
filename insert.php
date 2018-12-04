<?php 
if(isset($_REQUEST))
{
        mysql_connect("localhost","root","");
mysql_select_db("testdb");
error_reporting(E_ALL && ~E_NOTICE);

$name=$_POST['Name'];
$sql="INSERT INTO general(name) VALUES ('$name')";
$result=mysql_query($sql);
if($result){
echo "You have been successfully subscribed.";
}
else echo "No insert";
}
?>