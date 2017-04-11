<!DOCTYPE html>
<html>
<head>
<title>Web Application Testing</title>
<h1>This is a test website</h1>
<form action="http://127.0.0.1/test3.php" method="POST">
Username: <input type="text" name="n1" value=" " required="required" size=20>
Password: <input type="text" name="n2" value=" " required="required" size=20>
<input type="submit" value="Log In">
</head>
<body>
<?php
if(!empty($_POST['n1']) and !empty($_POST['n2']))
{    
	$fname = '';
	$lname = '';   

	$dbhost = 'localhost:3036';
	$dbuser = 'testuser';
        $dbpass = 'Orange123!';
        $n1 = $_POST['n1'];
        $n2 = $_POST['n2'];
      //$n1='chalupa.batman'; DEBUG
      //$n2='1Theleague123';
//while(!empty($_POST['n1']) and !empty($_POST['n2']))


   $conn = mysql_connect($dbhost, $dbuser, $dbpass); 
//   print 'after conn';
//   $db_found = mysql_select_db('AddressBook', $conn);
   if(! $conn )
   {
       echo 'Count not connect:'. mysql_error();
     break;
   }
   else { 

echo "\n";
   }
   $db_found = mysql_select_db('AddressBook', $conn);

   if ($db_found) {
      $result =mysql_query("SELECT fname,lname FROM name WHERE uname ='$n1' and password ='$n2'");

           if ($result >0)
           {      

              //fetching fname & lname
            	while($row=mysql_fetch_assoc($result)){
             	//Print first and last name
		//Assign fname and lname to a variable
		echo '<br>' .'Login Successful.   Welcome :: '.$row['fname'];
		echo "\n";
		echo $row['lname']. '</br>';

	    }

           }
           else
           {
             echo 'Login Credentials are invalid!';
           }              
   }    
   else { //invalid login creds
      print "Database NOT Found.";
      mysql_close($db_handle);
   }
//Finish - Close connection
mysql_free_result($result);
mysql_close($conn);

}
?>


</form>
</body>
</html>
