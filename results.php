<!DOCTYPE html>
<!--By Trevor Tanner-->
<html lang="en">
    <meta charset="UTF-8">
<head>
	<!--<link rel="stylesheet" href="stringing.css">-->
<title>Stringing Work Order</title>
</head>
<header class="header">
  <ul class="navigation">
    <li><img src="tamalaxletterlogo.png" class="headerlogo"></li>
    <li><a  href= "stringingsite.html">Stringing Form</a></li>
    <li><a  href= "info.html">Info</a></li>
  </ul>
</header>
<body>
<h3 class= "header3" >Stringing Work Order</h3>
<?php
$user = "root";
$password = "";
$host = "localhost";
//checks the connection to the database
$DBConnect = mysqli_connect($host, $user, $password);
if ($DBConnect === FALSE){
   echo "<p>Unable to connect to the database server.</p>" . "<p>Error code " . mysqli_errno() . ": " . mysqli_error() . "</p>";
   //opnes the guestbook database
}else{
  $DBName = "stringing";
  //returns if there is not database
  if (!mysqli_select_db($DBConnect, $DBName)){
    echo "<p>There are orders enterd</p>";
    //connects to the table "visitors" and selects all information from it
  } else {
        $TableName = "orders";
        $SQLstring = "SELECT * FROM $TableName";
        $QueryResult = mysqil_query($DBConnect, $SQLstring);
        //checks for entries in table
        if (mysqli_num_rows($QueryResult) == 0){
          echo "<p>There are no orders entered</p>";
          //returns entries in table
        }else {
          $searchtype=$_POST['searchtype'];
          $searchterm=stripcslashes($_POST['searchterm']);

          if (!$searchtype || !$searchterm) {
          echo 'You have not entered search details.'

          $query = "select * from orders where ".$searchtype." like '%".$searchterm."%'";
          $result = $QueryResult->query($QueryResult);
          $num_results = $result-> num_rows;
          echo "<p>Number of orders found: " . $num_results . "</p>";
          for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();

          //Change these to call all parts of the order from the orders table in the stringing database
          echo "<p><strong>".($i+1).". Title: ";
          echo htmlspecialchars(stripslashes($row['title']));
          echo "</strong><br />Author: ";
          echo stripslashes($row['author']);
          echo "<br />ISBN: ";
          echo stripslashes($row['isbn']);
          echo "<br />Price: ";
          echo stripslashes($row['price']);
          echo "</p>";
          }
        }
        //closes the query results
        mysqli_free_result($QueryResult);
  }
  //closes connection to database
  mysqli_close($DBConnect);
}

 ?>
</body>
<footer class="footer">
  <ul class="navigationfoot">
    <li><p class="copy">Copyright &copy; 2019 Tama Lacrosse</p></li>
    <li><a  href= "https://www.tamalax.com"><img src="tamalaxlogo.png" alt="Tama Logo" width="40" height="40"></a></li>
  </ul>
</footer>
</html>
