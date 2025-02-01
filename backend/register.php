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
$phone = $_POST['phone'];
$team = $_POST['team'];
$country = $_POST['country'];

// Simpan data dalam pangkalan data
$sql = "INSERT INTO participants (name, email, phone, team, country) VALUES ('$name', '$email', '$phone', '$team', '$country')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Pendaftaran berjaya!'); window.location.href='../pages/register.html';</script>";
} else {
    echo "Ralat: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
