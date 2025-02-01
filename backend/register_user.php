<?php
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
$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Encrypt password

// Simpan data dalam pangkalan data
$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Pendaftaran berjaya! Sila log masuk.'); window.location.href='../pages/login.html';</script>";
} else {
    echo "Ralat: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
