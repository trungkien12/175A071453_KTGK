<?php
if (session_id() === '') session_start();

if (!isset($_SESSION['user'])) {
  header('Location: http://localhost:8080/middle');
}

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
<a href="./index.php">Home</a>
<?php
if (isset($_SESSION['user'])) {echo "<a href='./logout.php'>Logout</a>"; echo"<a href='./create.php'>Thêm Mới</a> <br><br>";};
if (!isset($_SESSION['user']))  echo "<a href='./login.php'>Login</a>";

if (isset($_POST['xoa'])) {
  $sqlXoa = "DELETE FROM can_bo WHERE id = {$_POST['id']}";
  $resultXoa = mysqli_query($conn, $sqlXoa);
  if ($resultXoa) {
    echo "<span style='color: green'>xóa thành công can bộ có id: {$_POST['id']}</span>";
    header('Location: http://localhost:8080/middle/admin.php');
  }
}

?>
<form method="GET">
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
      <th>Chức năng</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($data as $key => $value) {
      echo "<tr>";
      foreach ($value as $k => $v) {
        echo "<td>{$v}</td>";
      }
      echo "<td>
       
      <form action='./update.php' method='post' style='display:inline'>
        <input hidden name='id' value='{$value['id']}'/>
        <input hidden name='ho_va_ten' value='{$value['ho_va_ten']}'/>
        <input hidden name='email' value='{$value['email']}'/>
        <input hidden name='so_dien_thoai' value='{$value['so_dien_thoai']}'/>
        <input hidden name='dia_chi' value='{$value['dia_chi']}'/>
        <input hidden name='ten_chuc_vu' value='{$value['ten_chuc_vu']}'/>
        <input hidden name='ten_don_vi' value='{$value['ten_don_vi']}'/>
        <input type='submit' value='Cập nhật' name='cap_nhat' />
      </form>

      <form method='post' style='display:inline'>
        <input hidden name='id' value='{$value['id']}'/>
        <input type='submit' value='Xóa' name='xoa' />
      </form>

      </td>";
      echo "</tr>";
    }
    ?>
  </tbody>
</table>