<html>
<title>
	My Test Page
</title>
<body>

<?php
  $br = "<br>";
  $text = "Hello php world ...!";
  $sql = "And mysql world ...!";
  echo $text . '<br>' . $sql.'<br>';
  print(strlen($sql).'<br>');
  echo strpos($sql, "world").'<br>';

  $d = date("D");
  echo $d.$br;
  if($d == "Fri")
  {
  	echo "Have a Nice weekend!".$br;
  }elseif($d == "Sun"){
  	echo "Have a Nice Sunday";
  }else{
  	echo "Have a Nice day!".$br;
  }
  //switch ,while,do while, are same as C;
  //Array is different for defrence

 ?>

<br/>Testing form post .....<br/>
<!-- Post data to myget.php $_POST,$_GET,$_COOKIE,get the data from each form,$_REQUEST inlcude all off them-->
<!--<form action="myget.php" method="post"> -->
<form method="post">
	Name:<input type="text" name="name"/>
	Age: <input type="text" name="age" />
	<input type="submit">
</form>
<br/>
Welcome <?php echo $_POST["name"]; ?><br/>
Your age is <?php echo $_POST["age"]; ?> years old! <br/>

<br/>Testing date function.....<br/>
<!-- Test date function -->
<?php
	echo date("Y/m/d").$br;//without timestamp display the current date
	echo date("Y/M/D").$br;
	$tomorrow = mktime(0,0,0,date("m"),date("d")+1,date("Y"));
	echo "Tomorrow is ".date("Y/m/d",$tomorrow).$br;// use timestamp
?>

<br/>Testing include ,require.....<br/>
<!-- Test include ,require -->
<?php 
	include 'vars.php';
	echo "My car is ".$color." ".$car.$br;
	//require "phpinfo.php";	

?>

<br/>Testing Mysql here.....<br/>
<?php
//Test Mysql here
$mysql_con = mysql_connect("localhost:3306","root","root");
if(!$mysql_con){
	die('Can not connect to mysql:'.mysql_error());
}else{
	echo 'Connect mysql sucessed!'.$br;
}
if(mysql_query("CREATE DATABASE phpDB",$mysql_con))
{
	echo 'Database phpDB created!'.$br;
}else{
	echo 'Create phpDB failed:'.mysql_error().$br;
}
mysql_select_db('phpDB');
$table="CREATE TABLE Persons 
(
  personID int NOT NULL AUTO_INCREMENT, 
  PRIMARY KEY(personID),
  FirstName varchar(15),
  LastName varchar(15),
  City varchar(10),
  Age Int
)";
if(mysql_query($table,$mysql_con))
{
	echo 'Create table successed!'.$br;

	mysql_query("INSERT INTO Persons (FirstName, LastName,City, Age) VALUES ('Peter', 'Griffin', 'Shenzhen', '35')");
	mysql_query("INSERT INTO Persons (FirstName, LastName,City, Age) VALUES ('Glenn', 'Quagmire', 'Shenzhen', '33')");

}else{
	echo 'Create table failed:'.mysql_error().$br;
}

$result = mysql_query('select * from Persons order by Age');
echo "<table border=1>
	<tr>
		<th>FirstName</th>
		<th>LastName</th>
		<th>City</th>
		<th>Age</th>
	</tr>
";

while($row = mysql_fetch_array($result))
{
	echo "<tr>";
	echo "<td>" . $row['FirstName'] . "</td>";
	echo "<td>" . $row['LastName'] . "</td>";
	echo "<td>" . $row['City'] . "</td>";
	echo "<td>" . $row['Age'] . "</td>";
  	echo "</tr>";
}
echo "</table>";



if($mysql_con){
	mysql_close($mysql_con);
}

?>


</body>
 </html>