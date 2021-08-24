<?php
require_once("./database.php");

if (session_status() === PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['user'])) header('Location: http://localhost:8080/middle/login.php');


$resultDonVi = mysqli_query($conn, "SELECT * FROM don_vi");
$dataDonVi = mysqli_fetch_all($resultDonVi,  MYSQLI_ASSOC);
$resultChucVu = mysqli_query($conn, "SELECT * FROM chuc_vu");
$dataChucVu = mysqli_fetch_all($resultChucVu,  MYSQLI_ASSOC);

if (isset($_POST['create'])) {
    // var_dump($_POST);
    // die('da cap nhat');

    $sqlUpdate = "INSERT INTO can_bo (ho_va_ten, email, so_dien_thoai, dia_chi,id_chuc_vu, id_don_vi)
    VALUES (
        '{$_POST['ho_va_ten']}', '{$_POST['email']}', '{$_POST['so_dien_thoai']}', '{$_POST['dia_chi']}', {$_POST['id_chuc_vu']}, {$_POST['id_don_vi']}
    );";
    // echo ($sqlUpdate);
    // die();

    $resultUpdate = mysqli_query($conn, $sqlUpdate);

    if ($resultUpdate) {
        echo "cập nhật thông tin thành công!";
        header('Location: http://localhost:8080/middle/index.php');
    } else {
        echo "error occur when update user info";
    }
}

?>

<h1>Thêm mới cán bộ</h1>
<form method="post" action="">
    <label style="width:200px; display: inline-block;text-transform:capitalize; margin-top:5px" for="ho_va_ten">họ và tên: </label>
    <input type="text" name="ho_va_ten"> <br>

    <label style="width:200px; display: inline-block;text-transform:capitalize; margin-top:5px" for="email">email: </label>
    <input type="text" type="email" name="email"> <br>

    <label style="width:200px; display: inline-block;text-transform:capitalize; margin-top:5px" for="so_dien_thoai">số điện thoại: </label>
    <input type="text" name="so_dien_thoai"> <br>

    <label style="width:200px; display: inline-block;text-transform:capitalize; margin-top:5px" for="dia_chi">địa chỉ: </label>
    <input type="text" name="dia_chi"> <br>

    <label style="width:200px; display: inline-block;text-transform:capitalize; margin-top:5px" for="id_chuc_vu">chức vụ: </label>
    <select name="id_chuc_vu" id="id_chuc_vu">
        <?php
        foreach ($dataChucVu as $key => $value) {
            echo "<option value='{$value['id']}'>";
            echo $value['ten_chuc_vu'];
            echo "</option>";
        }
        ?>
    </select> <br>

    <label style="width:200px; display: inline-block;text-transform:capitalize; margin-top:5px" for="id_don_vi">Đơn vị: </label>
    <select name="id_don_vi" id="id_don_vi">
        <?php
        foreach ($dataDonVi as $key => $value) {
            echo "<option value='{$value['id']}'>";
            echo $value['ten_don_vi'];
            echo "</option>";
        }
        ?>
    </select> <br>


    <input style="margin-top:10px" type="submit" value="Thêm Mới" name="create">

</form>