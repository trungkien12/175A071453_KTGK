<?php
if (session_id() === '') session_start();
if (isset($_SESSION['user'])) header('Location: http://localhost:8080/middle/admin.php');
require_once("./database.php");
$sql = "SELECT can_bo.id, can_bo.ho_va_ten, can_bo.email, can_bo.so_dien_thoai,can_bo.dia_chi,chuc_vu.ten_chuc_vu, don_vi.ten_don_vi from can_bo, chuc_vu, don_vi WHERE can_bo.id_don_vi = don_vi.id and can_bo.id_chuc_vu = chuc_vu.id";

if (isset($_GET['submit'])) {
  if (isset($_GET['name'])) {
    // $name = ucwords($_GET['name']);
    $name = $_GET['name'];
    $sql = "SELECT can_bo.id, can_bo.ho_va_ten, can_bo.email, can_bo.so_dien_thoai,can_bo.dia_chi,chuc_vu.ten_chuc_vu, don_vi.ten_don_vi from can_bo, chuc_vu, don_vi WHERE can_bo.id_don_vi = don_vi.id and can_bo.id_chuc_vu = chuc_vu.id and can_bo.ho_va_ten LIKE '%{$name}%'";
  }
}

$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<?php
if (isset($_SESSION['user'])) {
  echo "<a href='./admin.php'>Home</a>";
  echo "<a href='./logout.php'>Logout</a>";
} else {
  echo "<a href='./index.php'>Home</a>";
  echo "<a href='./login.php'>Login</a>";
}
?>
<form action="./contacts.php" method="GET">
  <label for="search">Nhập vào tên:</label> <br>
  <input require type="text" id="search" placeholder="Tìm kiếm theo tên" name="name">
  <input type="submit" value="Tìm kiếm" name="submit">
</form>
<table border="1">
  <thead>
    <tr>
      <th>ID</th>
      <th>Họ và tên</th>
      <th>Email</th>
      <th>Số diện thoại</th>
      <th>Địa chỉ</th>
      <th>Tên chức vụ</th>
      <th>Tên đơn vị</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($data as $key => $value) {
      echo "<tr>";
      foreach ($value as $k => $v) {
        echo "<td>{$v}</td>";
      }
      echo "</tr>";
    }
    ?>
  </tbody>
</table>