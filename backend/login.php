<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rafting_db";

// Sambungan ke pangkalan data
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa sambungan
if ($conn->connect_error) {
    die("Sambungan gagal: " . $conn->connect_error);
}

// Ambil data dari borang
$email = $_POST['email'];
$password = $_POST['password'];

// Semak data pengguna dalam pangkalan data
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        header("Location: ../pages/forum.html");
        exit();
    } else {
        echo "<script>alert('Kata laluan salah!'); window.location.href='../pages/login.html';</script>";
    }
} else {
    echo "<script>alert('Akaun tidak wujud!'); window.location.href='../pages/login.html';</script>";
}

$conn->close();
?>
