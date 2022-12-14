<?php
session_start();
if (isset($_SESSION['admin']) || isset($_SESSION['nsb'])) {
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Aplikasi</title>
    <link rel="stylesheet" href="style_app.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates&display=swap" rel="stylesheet">
</head>
<body>
    <form action="#" method="POST" class="bungkus">

        <!-- bagian buat header -->
        <?php
        if (isset($_SESSION['admin'])) {
        ?>
            <div class="kepala">
                <h1><?php echo $_SESSION['nama_admin'];?></h1>
                <a href="home.php" class="link_gambar"><img class="headimg" src="./gambar/<?php echo $_SESSION['nama_admin'];?>.jpg" alt="a"></a>
            </div>
        <?php
        }
        else if (isset($_SESSION['nsb'])){
            ?>
            <div class="kepala">
                <h1><?php echo $_SESSION['nama_nsb'];?></h1>
                <div class="link_gambar"><a href="home.php"><img class="headimg" src="./gambar/icon.png" alt></a></div>
            </div>
            <?php
        }
        ?>
        <!-- bagian buat navigasi -->
        <div class="navigasi">
            <div class="isi_navigasi">
            <?php
            if (isset($_SESSION['admin'])) {
                ?>
                    <h1>BANSER</h1>
                        <ul>
                            <li><a href="home.php" class="link_navigasi">home</a></li>
                            <li><a href="home.php?link=register" class="link_navigasi">register</a></li>
                            <li><a href="home.php?link=daftar_akun" class="link_navigasi">daftar akun</a></li>
                            <li><a href="home.php?link=tambah_data" class="link_navigasi">tambah data</a></li>
                            <li><a href="logout.php" class="link_navigasi">Logout</a></li>
                        </ul>
                <?php
            }
            else if (isset($_SESSION['nsb'])) {
                ?>
                <h1>BANSER</h1>
                    <ul>
                        <li><a href="home.php" class="link_navigasi">home</a></li>
                        <li><a href="home.php?link=lihat_transaksi" class="link_navigasi">lihat transaksi</a></li>
                        <li><a href="home.php?link=melakukan_transaksi" class="link_navigasi" >transaksi</a></li>
                        <li><a href="home.php?link=edit_profile" class="link_navigasi">edit profile</a></li>
                        <li><a href="logout.php" class="link_navigasi">Logout</a></li>
                    </ul>
            <?php
            }
            ?>
            </div>
                
        </div>
        <!-- Bagian buat isi dari konten -->
        <div class="isi">
            <?php
            if(@$_GET['link_no_rek'] != '' && isset($_SESSION['nsb'])){
                include 'navigasi/lihat_transaksi.php';
            }
            else if(@$_GET['link_edit_profile'] == 'edit' && isset($_SESSION['nsb'])){
                include 'navigasi/edit_profile_nsb.php';
            }
            else if(@$_GET['link_sukses'] == 'transaksi_sukses' && isset($_SESSION['nsb'])){
                include 'navigasi/transaksi_berhasil.php';
            }
            else if (@$_GET['link'] == '' && (isset($_SESSION['admin']) || isset($_SESSION['nsb']))){
                include 'navigasi/homeAplikasi.php';
            }
            else if(@$_GET['link'] == ' daftar_akun' && isset($_SESSION['admin'])){
                include 'navigasi/edit_profile_nsb.php';
            }
            else if (@$_GET['link'] == 'register' && isset($_SESSION['admin'])) {
                include 'navigasi/register.php';
            }
            else if(@$_GET['link'] == 'daftar_akun' && isset($_SESSION['admin'])){
                include 'navigasi/daftar_akun.php';
            }
            else if(@$_GET['link'] == 'edit_admin' && isset($_SESSION['admin']) && @$_GET["id_admin"]){
                include 'navigasi/edit_admin.php';
            }
            else if(@$_GET['link'] == 'hapus_akun' && isset($_SESSION['admin']) && @$_GET["hapus"]){
                include 'navigasi/hapus_akun.php';
            }
            else if(@$_GET['link'] == 'tambah_data' && isset($_SESSION['admin'])){
                include 'navigasi/tambah_data.php';
            }
            else if(@$_GET['link'] == 'lihat_transaksi' && isset($_SESSION['nsb'])){
                include 'navigasi/daftar_transaksi.php';
            }
            else if(@$_GET['link'] == 'melakukan_transaksi' && isset($_SESSION['nsb'])){
                include 'navigasi/melakukan_transaksi.php';
            }
            else if(@$_GET['link'] == 'edit_profile' && isset($_SESSION['nsb'])){
                include 'navigasi/homeAplikasi.php';
            }
            ?> 
        </div>  
    </form>

</body>
</html>
<?php
}
else{
    header('Location:index.php');
}
?>
