`<html>
    <body>
        <head>
<link rel="stylesheet" type="text/css" href="table.css">
</head>         


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flight db";
$email = $_POST["city"];
#$city1 = $_POST["city2"];
        

// Create connection
$conn = new mysqli("localhost","root","","flight db");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql1="select min(ticketid) from Booking";
$result=mysqli_query($conn,$sql1);
$row= $result->fetch_assoc();
$min=($row['min(ticketid)']); 
$sql1="select max(ticketid) from Booking";
$result=mysqli_query($conn,$sql1);
$row= $result->fetch_assoc();
$max=($row['max(ticketid)']);  
//echo ($email);
//echo intval($max);
if(intval($email)<intval($min)||intval($email)>intval($max)){
    echo "<h1>No ticket found</h1>";
}
else{
$result1 = mysqli_query($conn, "delete from booking where ticketid='$email';") or die("Query fail :" .mysqli_error());
 $sql="delete from booking where ticketid='$email';";
 $result=mysqli_query($conn,$sql);


 if($result)
 {
     echo "<h1>Cancellation successful</h1>";
 }
}
$conn->close();
?> 
         <br> 
        <h1>To Book A Seat</h1>
        <a href="query2.html"><h1>click here</h1></a>
        <!--<h2> Please Remember The FlightId</h2>-->
    </body>
</html>