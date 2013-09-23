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

<!-- Test date function -->
<?php
	echo date("Y/m/d").$br;//without timestamp display the current date
	echo date("Y/M/D").$br;
	$tomorrow = mktime(0,0,0,date("m"),date("d")+1,date("Y"));
	echo "Tomorrow is ".date("Y/m/d",$tomorrow).$br;// use timestamp
?>
<!-- Test include ,require -->
<?php 
	include 'vars.php';
	echo "My car is ".$color." ".$car.$br;
	require "phpinfo.php";	

?>

</body>
 </html>