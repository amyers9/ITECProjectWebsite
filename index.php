<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

Test Connection to our AWS RDS Server
<br><br><br><br><br>
--------------------------------------
<br>
<form action="index.php" method="post">
<input type='submit' name='test' />
</form>

<?php
//include 'includes/testconnection.php'
if(isset($_POST['test']))
{
    $con=mysqli_connect('projectdb.cf4uu4cc6y57.us-east-1.rds.amazonaws.com', 'admin','ItecProject24','websitedb','3306');

    if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
    }

    $sql ="SELECT Customer_ID, Customer_Fname, Customer_Lname, Customer_Email, Customer_Password, Customer_Preference FROM Customers";

    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "id: " . $row["Customer_ID"]. " - Name: " . $row["Customer_Fname"]. " " . $row["Customer_Lname"]
    . " - Email: ". $row["Customer_Email"]. " - PW: ". $row["Customer_Password"]. " - Preference: ". $row["Customer_Preference"]. "<br>";
        }
    } else {
    echo "0 results";
    }   

//close connections
mysqli_close($con);
}
?>
    
</body>
</html>