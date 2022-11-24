<?php
//open koneksi ke database
define("db_host", "localhost");
define("db_user", "root");
define("db_pass", "");
define("db_name", "hcs");

$koneksi = mysqli_connect(db_host, db_user ,db_pass, db_name);
if (!$koneksi) {
  die("Koneksi Gagal!!");
}

//kalau jadi, lanjut!

$username = $_POST['username'];
$password = $_POST['password'];

//perintah untuk mendapatkan user dari database berdasarkan nama yang diinputkan di login
$get_user = "SELECT * FROM admin WHERE username = '$username'";
$result = mysqli_query($koneksi, $get_user);
$data = mysqli_fetch_array($result);
if($data) {
  //email yg dimasukan ada di database
  //check password
  if($password == $data['password']) {
    header("Location: homeadmin.php");
  } else {
    //password salah
    header("location:admin.php"); //redirect ke halaman login
  }
}
else{
  header("location:admin.php");
}
?>