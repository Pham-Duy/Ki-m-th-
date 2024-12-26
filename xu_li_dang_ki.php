<?php
include('connect.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // kiểm tra nếu tài khoản còn tồn tại

    $sql_check = "SELECT * FROM user WHERE tai_khoan= '$username' ";
    $result = mysqli_query($conn, $sql_check);

    if (mysqli_num_rows($result) > 0) {
        echo 'Tài khoản này đã tồn tại ! ';
    } else {
        $sql = "INSERT INTO user(tai_khoan , mat_khau , ho_ten) VALUES('$fullname' , '$password' , '$username')";
        if (mysqli_query($conn, $sql)) {
            echo "Đăng kí thành công !";
            header('Location: login.php');
            exit();
        } else {
            echo 'Đăng kí không thành công !';
        }
    }
}