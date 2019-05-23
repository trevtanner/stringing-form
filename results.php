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
// create short variable names
$searchtype=$_POST['searchtype'];
$searchterm=trim($_POST['searchterm']);

if (!$searchtype || !$searchterm) {
echo 'You have not entered search details.
exit;
}
Please go back and try again.';
if (!get_magic_quotes_gpc()){
$searchtype = addslashes($searchtype);
$searchterm = addslashes($searchterm);
}
@ $db = new mysqli('localhost', 'tama', 'tamalax123', 'stringing');
if (mysqli_connect_errno()) {
echo 'Error: Could not connect to database.
exit;
}
Please try again later.';
$query = "select * from orders where ".$searchtype." like '%".$searchterm."%'";
$result = $db->query($query);
$num_results = $result->num_rows;
echo "<p>Number of orders found: ".$num_results."</p>";
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
$result->free();
$db->close();
 ?>
</body>
<footer class="footer">
  <ul class="navigationfoot">
    <li><p class="copy">Copyright &copy; 2019 Tama Lacrosse</p></li>
    <li><a  href= "https://www.tamalax.com"><img src="tamalaxlogo.png" alt="Tama Logo" width="40" height="40"></a></li>
  </ul>
</footer>
</html>
