<!DOCTYPE html>
<!--By Trevor Tanner-->
<html lang="en">
    <meta charset="UTF-8">
<head>
	<link rel="stylesheet" href="stringing.css">
<title>Search Results</title>
</head>
<header class="header">
  <ul class="navigation">
    <li><img src="tamalaxletterlogo.png" class="headerlogo"></li>
    <li><a  href= "stringingsite.html">Stringing Form</a></li>
    <li><a  href= "info.html">Info</a></li>
  </ul>
</header>
<body>
<h3 class= "header3" >Search Results</h3>
<?php
$user = "root";
$password = "";
$host = "localhost";
$db = "stringing";
//checks the connection to the database
$mysqli = new mysqli($host, $user, $password, $db);
  //returns if there is not yourDatabase
  if (mysqli_connect_errno()) {
    echo "<p>There are no orders enterd</p>";
    exit();
    /*use if statements from form options to decide to search ids or names
      if ($searchtype == 'name') {
      name
    }rlse{
    orderid
  }
    */

  }
        $searchterm=stripcslashes($_POST['searchterm']);
        $searchtype=($_POST['searchtype']);
          if (empty($searchterm)) {
          echo 'You have not entered search details.';
        }else{
          if ($searchtype ='name') {
            $table = "orders";
            $query = "SELECT * FROM $table
            WHERE name='$searchterm'";
            $result = $mysqli->query($query);
            while ($row = $result->fetch_assoc()) {

      echo "<p class='form-style-1'>";
      echo "<br />Name: ".$row['name'];
      echo "<br />Age: ".$row['age'];
      echo "<br />Years Playing: ".$row['pyears'];
      echo "<br />Position: ".$row['position'];
      echo "<br />Head: ".$row['head'];
      echo "<br />Mesh: ".$row['mesh'];
      echo "<br />Sidewall: ".$row['sidewall'];
      echo "<br />Shooters: ".$row['shooters'];
      echo "<br />Shooter Style: ".$row['shooterstyle'];
      echo "<br />Pocket Location: ".$row['pklocation'];
      echo "<br />Whip: ".$row['whip'];
      echo "<br />Additonal Comments: ".$row['addlcomms'];
      echo "</p>";

              }
        }else{
          $table = "orders";
          $query = "SELECT * FROM $table
          WHERE orderid='$searchterm'";
          $result = $mysqli->query($query);
          while ($row = $result->fetch_assoc()) {

    echo "<p class='form-style-1'>";
    echo "</strong><br />Name: ".$row['name'];
    echo "<br />Age: ".$row['age'];
    echo "<br />Years Playing: ".$row['pyears'];
    echo "<br />Position: ".$row['position'];
    echo "<br />Head: ".$row['head'];
    echo "<br />Mesh: ".$row['mesh'];
    echo "<br />Sidewall: ".$row['sidewall'];
    echo "<br />Shooters: ".$row['shooters'];
    echo "<br />Shooter Style: ".$row['shooterstyle'];
    echo "<br />Pocket Location: ".$row['pklocation'];
    echo "<br />Whip: ".$row['whip'];
    echo "<br />Additonal Comments: ".$row['addlcomms'];
    echo "</p>";

            }
      }
          //$sql="SELECT  ID, FirstName, LastName FROM Contacts WHERE FirstName LIKE '%" . $name .  "%' OR LastName LIKE '%" . $name ."%'";


            /* free result set */
            $result->close();
        }

        /* close connection */
        $mysqli->close();
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
