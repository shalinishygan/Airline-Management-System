<html>
    <body>
        <head>
<link rel="stylesheet" type="text/css" href="table.css">
</head>         


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flight db";
$email = $_POST["email"];
#$city1 = $_POST["city2"];
        

// Create connection
$conn = new mysqli("localhost","root","","flight db");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$result = mysqli_query($conn, "call ticket('$email')") or die("Query fail :" .mysqli_error());
  
        ?>
        <table class="container"><tr><th>First Name</th><th>Last Name</th><th>Ticket No</th><th>Flight ID</th><th>Ticket Price</th><th>Seat No</th><th>Departure Date</th><th>Destination</th><th>Origin</th></tr>
<?php
if ($result->num_rows > 0) {
    
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["fname"]. "</td><td>" . $row["lname"]. "</td><td> " . $row["ticketid"]. "</td><td>" . $row["fid"]. "</td><td> " . $row["price"]."</td><td>" . $row["seatno"]. "</td><td> " . $row["date"] . "</td><td>" . $row["origin"]. "</td><td>" . $row["destination"]."</td></tr>" ;
    }
    echo "</table>";
} else {
    echo "<h1>No ticket Found</h1>";
}
        

$conn->close();
?> 
        </table>
        <h1>To Book A Seat</h1>
        <a href="book.html"><h1>click here</h1></a>
        
        <h2> Please Remember The FlightId</h2>
    </body>
</html>