<?php
//helper function use like this "debug_to_Console("Test");
function debug_to_console($data) {
    $output = $data;
    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

session_start();

    // DB connection
    $host = "localhost";
    $dbusername = "holidaydb";
    $dbpassword = "holidaydb";
    $dbname = "holidaydb";

    $connection = mysqli_connect($host, $dbusername, $dbpassword, $dbname);

    if(mysqli_connect_errno()){
        die("Error -- Connection has failed: ". mysqli_connect_error());
    }

if( !isset($_POST['username'], $_POST['password'])){
    exit("Please enter both username and password.");
}

//atemping to debug username and password being properly grabbed from text boxes
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     foreach ($_POST as $key => $value) {
//         echo "Key: $key, Value: $value<br>";
//     }
// }


// 'SELECT id, password FROM users WHERE username = ?'
if($stmt = $connection->prepare('SELECT id,password FROM users WHERE username=?')){
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();

    // store result such that we can check if user exists in db
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        // Account exists, now verify pw
        if ($_POST['password'] === $password) {
            // Verification success! User has logged-in!
            // Create sessions to verify that user has logged in
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;
            echo 'Welcome back, ' . htmlspecialchars($_SESSION['name'], ENT_QUOTES) . '!';
            // header("Location: success.html");
        } else {
            // Incorrect password
            echo 'Incorrect username and/or password!';
            // header("Location: error.html");
        }
    } else {
        // Incorrect username
        echo 'Incorrect username and/or password!';
        // header("Location: error.html");
    }

    // close
    $stmt->close();
    
}
    

?>