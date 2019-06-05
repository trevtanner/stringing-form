<!DOCTYPE html>
<!--By Trevor Tanner-->
<html lang="en">
    <meta charset="UTF-8">
<head>
  <meta charset="UTF-8">
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="stringing.css">
<title>Search Results</title>
</head>
<header class="header">
  <ul class="navigation">
    <li><img src="tamalaxletterlogo.png" class="headerlogo"></li>
    <li><a  href= "stringingsite.html">Stringing Form</a></li>
    <li><a  href= "search.html">Search Orders</a></li>
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
        $searchterm=stripslashes($_POST['searchterm']);
        $searchtype=($_POST['searchtype']);
          if (empty($searchterm)) {
          echo "<p class='form-style-1'>You have not entered any search details.</p>";
        }else{
          if ($searchtype ==="name") {
            $table = "orders";
            $query = "SELECT * FROM $table
            WHERE name='$searchterm'";
            $result = $mysqli->query($query);
            while ($row = $result->fetch_assoc()) {

      echo "<p class='form-style-1'>";
      echo "<ul class='form-style-1'>";
      echo "<br /><li><label>Name: </label>".$row['name']."</li>";
      echo "<br /><li><label>Age: </label> ".$row['age']."</li>";
      echo "<br /><li><label>Years Playing: </label> ".$row['pyears']."</li>";
      echo "<br /><li><label>Position: </label> ".$row['position']."</li>";
      echo "<br /><li><label>Head: </label> ".$row['head']."</li>";
      echo "<br /><li><label>Mesh: </label> ".$row['mesh']."</li>";
      echo "<br /><li><label>Sidewall: </label> ".$row['sidewall']."</li>";
      echo "<br /><li><label>Shooters: </label> ".$row['shooters']."</li>";
      echo "<br /><li><label>Shooter Style: </label> ".$row['shooterstyle']."</li>";
      echo "<br /><li><label>Pocket Location: </label> ".$row['pklocation']."</li>";
      echo "<br /><li><label>Whip: </label> ".$row['whip']."</li>";
      echo "<br /><li><label>Additonal Comments: </label> ".$row['addlcomms']."</li><br>";
      echo "</ul>";
      echo "</p>";

              }
        }elseif($searchtype ==="orderid"){
          $table = "orders";
          $query = "SELECT * FROM $table
          WHERE orderid='$searchterm'";
          $result = $mysqli->query($query);
          while ($row = $result->fetch_assoc()) {

            echo "<p class='form-style-1'>";
            echo "<ul class='form-style-1'>";
            echo "<br /><li>Name: ".$row['name']."</li>";
            echo "<br /><li>Age: ".$row['age']."</li>";
            echo "<br /><li>Years Playing: ".$row['pyears']."</li>";
            echo "<br /><li>Position: ".$row['position']."</li>";
            echo "<br /><li>Head: ".$row['head']."</li>";
            echo "<br /><li>Mesh: ".$row['mesh']."</li>";
            echo "<br /><li>Sidewall: ".$row['sidewall']."</li>";
            echo "<br /><li>Shooters: ".$row['shooters']."</li>";
            echo "<br /><li>Shooter Style: ".$row['shooterstyle']."</li>";
            echo "<br /><li>Pocket Location: ".$row['pklocation']."</li>";
            echo "<br /><li>Whip: ".$row['whip']."</li>";
            echo "<br /><li>Additonal Comments: ".$row['addlcomms']."</li><br>";
            echo "</ul>";
            echo "</p>";

            }
      }
            /* free result set */
            $result->close();
        }
        /* close connection */
        $mysqli->close();

 ?>
</body>
<footer class="footer">
  <ul class="navigationfoot">
    <li><p class="copy">Copyright &copy; 2019 Tama Lacrosse</p></li>
    <li><a  href= "https://www.tamalax.com"><img src="tamalaxlogo.png" alt="Tama Logo" width="40" height="40"></a></li>
  </ul>
</footer>
</html>
