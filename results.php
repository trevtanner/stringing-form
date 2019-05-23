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
    echo "<p>There are no orders enterd</p>";
    //connects to the table "visitors" and selects all information from it
  } else {

        $TableName = "orders";
        $SQLstring = "SELECT * FROM $TableName";
        $QueryResult = mysqli_query($SQLstring);
        $searchterm=stripcslashes($_POST['searchterm']);

          if (!$searchterm) {
          echo 'You have not entered search details.';
        }else{

          //$sql="SELECT  ID, FirstName, LastName FROM Contacts WHERE FirstName LIKE '%" . $name .  "%' OR LastName LIKE '%" . $name ."%'";
          $query = "select * from orders where name like '%" . $searchterm . "%' OR orderid LIKE '%" . $searchterm . "%'";
          $result =mysqli_query($query);
          $num_results = $result-> num_rows;
          echo "<p>Number of orders found: " . $num_results . "</p>";
          while ($row = mysqli_fetch_array($results)) {

          //Change these to call all parts of the order from the orders table in the stringing database
          echo "</strong><br />Name: ";
          echo stripslashes($row['name']);
          echo "<br />Age: ";
          echo stripslashes($row['age']);
          echo "<br />Years Playing: ";
          echo stripslashes($row['pyears']);
          echo "<br />Position: ";
          echo stripslashes($row['position']);
          echo "<br />Head: ";
          echo stripslashes($row['head']);
          echo "<br />Mesh: ";
          echo stripslashes($row['mesh']);
          echo "<br />Sidewall: ";
          echo stripslashes($row['sidewall']);
          echo "<br />Shooters: ";
          echo stripslashes($row['shooters']);
          echo "<br />Shooter Style: ";
          echo stripslashes($row['shooterstyle']);
          echo "<br />Pocket Location: ";
          echo stripslashes($row['$pklocation']);
          echo "<br />Whip: ";
          echo stripslashes($row['whip']);
          echo "<br />Additonal Comments: ";
          echo stripslashes($row['addlcomms']);
          echo "</p>";
          }
        }
        //closes the query results
        mysqli_free_result($query);
  }
  //closes connection to database
  mysqli_close($DBConnect);
}
/*
<?php
if(isset($_POST['submit'])){
if(isset($_GET['go'])){
if(preg_match("/^[  a-zA-Z]+/", $_POST['name'])){
$name=$_POST['name'];
//connect  to the database
$db=mysql_connect  ("servername", "username",  "password") or die ('I cannot connect to the database  because: ' . mysql_error());
//-select  the database to use
$mydb=mysql_select_db("yourDatabase");
  //-query  the database table
  $sql="SELECT  ID, FirstName, LastName FROM Contacts WHERE FirstName LIKE '%" . $name .  "%' OR LastName LIKE '%" . $name ."%'";
  //-run  the query against the mysql query function
  $result=mysql_query($sql);
  //-create  while loop and loop through result set
  while($row=mysql_fetch_array($result)){
          $FirstName  =$row['FirstName'];
          $LastName=$row['LastName'];
          $ID=$row['ID'];
  //-display the result of the array
  echo "<ul>\n";
  echo "<li>" . "<a  href=\"search.php?id=$ID\">"   .$FirstName . " " . $LastName .  "</a></li>\n";
  echo "</ul>";
  }
  }
  else{
  echo  "<p>Please enter a search query</p>";
  }
  }
  }
?>
*/
 ?>
</body>
<footer class="footer">
  <ul class="navigationfoot">
    <li><p class="copy">Copyright &copy; 2019 Tama Lacrosse</p></li>
    <li><a  href= "https://www.tamalax.com"><img src="tamalaxlogo.png" alt="Tama Logo" width="40" height="40"></a></li>
  </ul>
</footer>
</html>
