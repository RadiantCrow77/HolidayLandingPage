<?php
function getDatabaseConnection(){
    // Constants here:
    $servername = "localhost";
    $username = "holidaydb";
    $password = "holidaydb";
    $database = "holidaydb";

// Create the connection
$connection = new mysqli($servername, $username, $password, $database);
    if($connection->connect_error){ // if connecting gives error... 
        die("Error -- failed to connect to MySQl ". $connection->connect_error); // stop the application
return $connection; // else return connection
}
}
?>