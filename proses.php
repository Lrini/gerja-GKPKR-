<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['user'];
$password = $_POST['pass'];

// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from login where user='$username' and pass='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
//cek object yang ditemukan
$data2 = mysqli_fetch_array($data);
if($cek > 0){
    session_start ();
	if($data2['ket'] == 'pendeta') {
			$_SESSION['id'] = $data2 ['id'];
            $_SESSION['user'] = $data2['user'];
        header("location:../gereja/admin/index.php");
    }else{
        header("location:login.php?pesan=gagal");
    }
	
}else{
    header("location:login.php?pesan=belum_login");
}
?>