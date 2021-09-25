<?php

session_start();

error_reporting(1);
ini_set('display_errors', 1);

if (is_null($_SESSION["user"])) {
    header('Location: login.html');
}

$servername = "23.22.33.159";
$username = "mailclient";
$password = "Mi17@2020Mail";
$db = "mail";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    // header('Location: login.html');
    die("Connection failed");
}

$account = $_POST['uname'];
$pass = $_POST['psw'];


$stmt = $conn->prepare('SELECT username as user, password FROM mailbox WHERE username=?');
$stmt->bind_param('s', $account); // 's' specifies the variable type => 'string'
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {

        if (crypt($pass, $row['password']) == $row['password']) {

            // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
            $_SESSION["user"] = $account;
            $prize = 0;
            // switch ($account) {
            //     case "may@microdnd.com":
            //         $prize = 0;
            //         break;
            //     case "zora@microdnd.com":
            //         $prize = 0;
            //         break;
            //     case "lucas@microdnd.com":
            //         $prize = 0;
            //         break;
            //     case "eason@microdnd.com":
            //         $prize = 0;
            //         break;
            //     case "serena@microdnd.com":
            //         $prize = 0;
            //         break;
            //     case "mico@microdnd.com":
            //         $prize = 0;
            //         break;
            // }
            $_SESSION["prize"] = $prize;
            header('Location: main.php');
        }else{
            header('Location: login.html');
        }
    }
} else {
    header('Location: login.html');
}

$conn->close();
