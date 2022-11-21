<?php
include './koneksi.php';

$kalimat_query =  $kon -> prepare('SELECT * from rekening where USERNAME_NSB = :nama_nsb');
$kalimat_query -> bindValue(':nama_nsb',$_SESSION['nsb']);
$kalimat_query -> execute();
$cek = $kalimat_query -> rowCount();
var_dump($cek);

?>
<div class="lihat_transaksi">
    <h1>lihat transaksi</h1>
    <?php
    foreach ($kalimat_query as $data) {
        ?><br>
        <a href="home.php?link_no_rek=<?php echo $data['NO_REK'];?>"> <?php echo $data['NO_REK'];?> </a>
    <?php
    }
    ?>
</div>