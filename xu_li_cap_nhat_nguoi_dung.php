<?php
include('connect.php');
if (
    !empty($_POST['tai_khoan']) &&
    !empty($_POST['mat_khau']) &&
    !empty($_POST['ho_ten']) &&
    !empty($_POST['nhap_lai_mat_khau']) &&
    !empty($_POST['vai_tro']) &&
    !empty($_POST['dia_chi'])
) {
    $id = $_GET['ma_nguoi_dung'];
    $tai_khoan = $_POST['tai_khoan'];
    $mat_khau = $_POST['mat_khau'];
    $ho_ten = $_POST['ho_ten'];
    $nhap_lai_mat_khau = $_POST['nhap_lai_mat_khau'];
    $vai_tro = $_POST['vai_tro'];
    $dia_chi = $_POST['dia_chi'];

    if ($nhap_lai_mat_khau !== $mat_khau) {
        echo "Mật khẩu không khớp nhau !";
    }

    $sql = "UPDATE `user` SET `tai_khoan`='$tai_khoan',`mat_khau`='$mat_khau',`ho_ten`='$ho_ten',`dia_chi`='$dia_chi',`role`='$vai_tro' WHERE ma_nguoi_dung = $id";
    mysqli_query($conn, $sql);
    header('location: dashboard.php?page=thong_tin_nguoi_dung');
} else {
    echo "khong ket noi được ";
}