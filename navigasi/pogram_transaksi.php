<?php
include './koneksi.php';
include './fungsi.php';

//cek dulu 

//ambil dulu data saldonya
$kalimat_query = $kon -> prepare('SELECT SALDO_REK from rekening where N0_REK = :no_rek');

// buat variabel ceknya
$rekening_asal      = $_POST['rekening_asal'];
$rekening_penerima  = $_POST['rekening_penerima'];
$total_transfer     = $_POST['jumlah_tf'];

?>