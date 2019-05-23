
<html>
<head>
	<!--<link rel="stylesheet" href="stringing.css">-->
<title>Stringing Work Order</title>
</head>
<header class="header">
  <ul class="navigation">
    <li><img src="tamalaxletterlogo.png" class="headerlogo"></li>
    <li><a  href= "search.html">Searchs</a></li>
    <li><a  href= "info.html">Info</a></li>
  </ul>
</header>
<body>
<h3>Stringing Work Order<class="header3"></h3>
<<?php
<//this if statement checks that the fields are filled
if (empty($_POST['name']) || empty($_POST['age']) || empty($_POST['years']) || empty($_POST['position']) || empty($_POST['head']) || empty($_POST['mesh']) || empty($_POST['sidewall'])
|| empty($_POST['shooters'])|| empty($_POST['shooterstyle']) || empty($_POST['pklocation']) || empty($_POST['whip']) || empty($_POST['comments'])){
echo "<p>You must fill out the form.<br>
      Go back and resubmit with all fields completed.</p>\n";
//if the fields are filled in then the connected to the database is opened
}else{
  $user = "root";
  $password="";
  $host="localhost";

  $DBConnect = mysqli_connect($host, $user, $password);
    //this if statement checks the connection the the database and returns the error if not
    if ($DBConnect === FALSE) {
      echo "<p>Unable to connect to the database server.</p>" . "<p>Error code " . mysqli_errno() "</p>";
      //if the connection is successful the the connection to the database "guestbook" is opened
    } else {
       $DBName = "stringing";
       //if there is no "guestbook" database then it is created
       if (!mysqli_select_db($DBConnect, $DBName)) {
         $SQLstring = "CREATE DATABASE $DBName";
         $QueryResult = mysqli_query($DBConnect, $SQLstring);
         //this if statement again checks the connection to the database and returns the error if not
         if ($QueryResult === FALSE) {
           echo "<p>Unable to execute the query.</p>" . "<p>Error code " . mysqli_errno() . ": " . mysqli_error() . "</p>";
           //once the database is created it returns this text to let the user know they are the first visitor
         } else {
           echo "<p>This is the first order!</p>";
         }
       }
       mysqli_select_db($DBConnect, $DBName);

       //this code connect to the table "visitors" within the "guestbook" database
       $TableName = "orders";
       $SQLstring = "SHOW TABLES LIKE '$TableName'";
       $QueryResult = mysqil_query($DBConnect, $SQLstring);
       //this if statement checks for the table and creates it if it is not present
       if (mysqli_num_rows($QueryResult) == 0) {
         $SQLstring = "CREATE TABLE $TableName (
         orderid int not null auto_increment primary key,
         name char(50) not null,
         age int not null,
         pyears int not null,
         position char(50) not null,
         head char(50) not null,
         mesh char(50) not null,
         sidewall char(50) not null,
         shooters char(50) not null,
         shooterstyle char(50) not null,
         pklocation char(50) not null,
         whip char(50) not null,
         addlcomms char(200) not null)";
         $QueryResult = mysqli_query($DBConnect, $SQLstring);
         //this if statement returns the error code if the table could not be created
         if ($QueryResult === FLASE) {
           echo "<p>Unable to create the table.</p>" . "<p>Error code " . mysqli_errno($DBConnect) . ": " . mysqli_error($DBConnect) . "</p>";
         }

       }
       //this code changes the entered information into a string that can be entered into the table
       $name = $_POST['name'];
       $age = $_POST['age'];
       $years = $_POST['years'];
       $position = $_POST['position'];
       $head = $_POST['head'];
       $mesh = $_POST['mesh'];
       $sidewall = $_POST['sidewall'];
       $shooters = $_POST['shooters'];
       $shooterstyle = $_POST['shooterstyle'];
       $pklocation = $_POST['pklocation'];
       $whip = $_POST['whip'];
       $addlcomms = $_POST['comments'];

       /*$LastName = stripslashes($_POST['last_name']);
       $FirstName = stripslashes($_POST['first_name']);*/
       $SQLstring = "INSERT INTO $TableName VALUES (NULL, '$name', '$age', '$years', '$position', '$head', '$mesh', '$sidewall', '$shooters', '$shooterstyle', '$pklocation', '$whip', '$addlcomms')";
       $QueryResult = mysqli_query($DBConnect, $SQLstring);
       //this if statement checks that the information was added to the table and returns an error code if not
       if ($QueryResult === FALSE) {
         echo "<p>Unable to execute the query.</p>" . "<p>Error code " . mysqli_errno($DBConnect) . ": " . mysqli_error($DBConnect) . "</p>";
       } else {
         echo "<h1>Order has been recieved!</h1>";
       }
       //closes the connection the the database
       mysqli_close($DBConnect);
?>
</body>
<footer class="footer">
  <ul class="navigationfoot">
    <li><p class="copy">Copyright &copy; 2019 Tama Lacrosse</p></li>
    <li><a  href= "https://www.tamalax.com"><img src="tamalaxlogo.png" alt="Tama Logo" width="40" height="40"></a></li>
  </ul>
</footer>
</html>
