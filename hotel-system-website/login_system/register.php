<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // เชื่อมต่อฐานข้อมูล (ต้องแก้ไขข้อมูลเชื่อมต่อ)
    $conn = new mysqli("localhost", "root", "", "your_database");

    if ($conn->connect_error) {
        die("เชื่อมต่อฐานข้อมูลล้มเหลว: " . $conn->connect_error);
    }

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "สมัครสมาชิกสำเร็จ!";
    } else {
        echo "เกิดข้อผิดพลาด: " . $conn->error;
    }

    $conn->close();
}
?>