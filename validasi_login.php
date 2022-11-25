<?php
include 'koneksi.php';
session_start();

//cek dulu bagian adminnya
if (!isset($_SESSION['admin']) && !isset($_SESSION['nsb'])) {
    $kalimat_query = $kon -> prepare('SELECT * FROM admin where USERNAME_ADMIN= :data_admin AND SANDI_ADMIN = SHA2(:sandi_admin,0)');
    $kalimat_query -> bindValue(':data_admin',$_POST['username']);
    $kalimat_query -> bindValue(':sandi_admin',$_POST['password']);
    $kalimat_query -> execute();

    $cek = $kalimat_query -> rowCount();
    $tampil = $kalimat_query -> fetch();
    foreach ($kalimat_query as $key) {
        echo "{$key['USERNAME_ADMIN']}";
    }

    if ($cek > 0) {
        $_SESSION['admin'] = $tampil["USERNAME_ADMIN"]; 
        $_SESSION['nama_admin'] = $tampil["NAMA_ADMIN"];
        var_dump($_SESSION);
        header('Location:home.php');
    }
    //jika nggak ada di admin cek di nasabah
    else{
        $kalimat_query = $kon -> prepare('SELECT * FROM nasabah where USERNAME_NSB= :data_user AND PASSWORD_NSB = SHA2(:sandi_user,0)');
        $kalimat_query -> bindValue(':data_user',$_POST['username']);
        $kalimat_query -> bindValue(':sandi_user',$_POST['password']);
        $kalimat_query -> execute();
        $cek_nsb = $kalimat_query -> rowCount();
        $cetak = $kalimat_query -> fetch();
        var_dump($cek_nsb);
        if ($cek_nsb > 0) {
            $_SESSION['nsb'] = $cetak["USERNAME_NSB"];
            $_SESSION['nama_nsb'] = $cetak["NAMA_NSB"];
            var_dump($_SESSION);
            header('Location:home.php');
        }
        else{
            header('Location:index.php');
        }
        }
    }
//kalau nggak ada semua ditolak
else{
    header('Location:home.php');
}
?>