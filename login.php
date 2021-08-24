<?php
require_once('./database.php');
if (session_id() === '') session_start();

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $_SESSION['email'] = $email;
  $password = $_POST['password'];
  $_SESSION['password'] = $password;

  $sql = "SELECT * FROM quan_tri_vien WHERE quan_tri_vien.email = '{$email}'";

  $result = mysqli_query($conn, $sql);
  $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

  if (!count($data)) {
    echo "<span style='color:red;'>Tài khoản hoặc mật khẩu không chính xác.</span>";
  }
  if (count($data)) {
    $user = $data[0];

    $password_hash = $user['mat_khau'];

    $isPasswordCorrect = password_verify($password, $password_hash);

    if (!$isPasswordCorrect) {
      echo "<span style='color:red;'>Tài khoản hoặc mật khẩu không chính xác.</span>";
    }
    if ($isPasswordCorrect) {
      unset($_SESSION['email']);
      unset($_SESSION['password']);
      $_SESSION['user'] = $user;
      header('Location: http://localhost:8080/middle/admin.php');
    }
  }
}
?>

<form method="post">
  <label for="email" id="name">Email: </label>
  <input type="email" name="email" id="email" value="<?= isset($_SESSION['email']) ? $_SESSION['email'] : null ?>">
  <label for="password" id="name">Password: </label>
  <input type="password" name="password" id="password" value="<?= isset($_SESSION['password']) ? $_SESSION['password'] : null ?>">

  <input type="submit" value="login" name="login">
</form>