<?php
session_start();

$username = $_POST["username"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$gender = $_POST["gender"];
$email = $_POST["email"];
$phone = $_POST["contact"];
$deptid = $_POST["department"];
$password = $_POST["password"];

$mysqli = new mysqli("localhost", "root", "", "project");

if ($mysqli->connect_error) {
    die('Could not connect to database!');
}

// Use mysqli object $mysqli instead of $conn
$result = mysqli_query($mysqli, "SELECT net_id from user_login where net_id = '$username'");

if (mysqli_num_rows($result) == 0) {
    $result1 = mysqli_query($mysqli, "SELECT phone from users where email = '$email'");

    if (mysqli_num_rows($result1) == 0) {
        // Generate salt
        $salt = createSalt();
        $hash = hash('sha256', $password);
        $hash1 = hash('sha256', $salt . $hash);

        // Perform INSERT queries
        $sql = "INSERT INTO users (net_id, firstname, lastname, email, d_id, u_role, phone, gender) VALUES
                ('$username', '$fname', '$lname', '$email', '$deptid', 'student', '$phone', '$gender')";

        $sql1 = "INSERT INTO user_login (net_id, password, salt_value) VALUES
                ('$username', '$hash1', '$salt')";

        if (!mysqli_query($mysqli, $sql) || !mysqli_query($mysqli, $sql1)) {
            header('Location: index.html');
        } else {
            session_regenerate_id();
            $_SESSION['sess_username'] = $username;
            session_write_close();
            header('Location: ./user/welcome.html');
        }
    } else {
        header('Location: index.html');
    }
} else {
    header('Location: index.html');
}

mysqli_close($mysqli);

function createSalt()
{
    $text = md5(uniqid(rand(), true));
    return substr($text, 0, 3);
}
?>
