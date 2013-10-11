<?php
$br="<br />";
$sql = mysql_connect("localhost:3306","root","root");
if(!$sql)
{
	die("Connect to mysql failed: ".mysql_error());
}
/*
$db = mysql_select_db($_POST["database"]);
if(!$db){
	die("Open DB ".$_POST["database"]."failed,".mysql_error());
}

$result = mysql_query('select * from '.$_POST["table"].' order by personID');
*/
$db = mysql_select_db("phpDB");
if(!$db){
	die("Open DB "."phpDB"."failed,".mysql_error());
}

$result = mysql_query('select * from '.'Persons'.' order by personID');

//echo 'select * from '.$_POST["table"].'order by Age'." ".mysql_error();

header('Content-type: application/xhtml+xml');

$xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
$xml .= "<data>";
while($row = mysql_fetch_array($result))
{
	$xml .= create_item($row['personID'],$row['FirstName'],$row['LastName'],$row['City'],$row['Age']);
}
$xml .= "</data>";
echo $xml;

function create_item($personID,$firstname,$lastname,$city,$age)
{
	$item .= "<item>";
	$item .= "<ID>".$personID."</ID>"."<FirstName>".$firstname."</FirstName>"."<LastName>".$lastname."</LastName>"."<City>".$city."</City>"."<Age>".$age."</Age>";
	$item .= "</item>";

	return $item;
}

?>