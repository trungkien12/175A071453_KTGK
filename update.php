<?php
require_once("./database.php");

// if (!isset($_POST['cap_nhat'])) header('Location: http://localhost:8080/middle');


$resultDonVi = mysqli_query($conn, "SELECT * FROM don_vi");
$dataDonVi = mysqli_fetch_all($resultDonVi,  MYSQLI_ASSOC);
$resultChucVu = mysqli_query($conn, "SELECT * FROM chuc_vu");
$dataChucVu = mysqli_fetch_all($resultChucVu,  MYSQLI_ASSOC);

if (isset($_POST['update'])) {
  // var_dump($_POST);
  // die('da cap nhat');

  $sqlUpdate = "UPDATE can_bo
  SET can_bo.ho_va_ten = '{$_POST['ho_va_ten']}', can_bo.email = '{$_POST['email']}', can_bo.so_dien_thoai = '{$_POST['so_dien_thoai']}', can_bo.dia_chi = '{$_POST['dia_chi']}', can_bo.id_chuc_vu = '{$_POST['id_chuc_vu']}',can_bo.id_don_vi = '{$_POST['id_don_vi']}'
  WHERE can_bo.id = {$_POST['id']}";
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

<h1>Thay đổi thông tin cán bộ</h1>
<form method="post" action="">
  <label style="width:200px; display: inline-block;text-transform:capitalize; margin-top:5px" for="id">ID: </label>
  <input type="text" name="id" value="<?= $_POST['id'] ?>" readonly> <br>

  <label style="width:200px; display: inline-block;text-transform:capitalize; margin-top:5px" for="ho_va_ten">họ và tên: </label>
  <input type="text" name="ho_va_ten" value="<?= $_POST['ho_va_ten'] ?>"> <br>

  <label style="width:200px; display: inline-block;text-transform:capitalize; margin-top:5px" for="email">email: </label>
  <input type="text" type="email" name="email" value="<?= $_POST['email'] ?>"> <br>

  <label style="width:200px; display: inline-block;text-transform:capitalize; margin-top:5px" for="so_dien_thoai">số điện thoại: </label>
  <input type="text" name="so_dien_thoai" value="<?= $_POST['so_dien_thoai'] ?>"> <br>

  <label style="width:200px; display: inline-block;text-transform:capitalize; margin-top:5px" for="dia_chi">địa chỉ: </label>
  <input type="text" name="dia_chi" value="<?= $_POST['dia_chi'] ?>"> <br>

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


  <input style="margin-top:10px" type="submit" value="Cập nhật" name="update">

</form>