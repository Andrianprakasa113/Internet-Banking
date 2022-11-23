<?php
include './koneksi.php';
include './fungsi.php';

//cek dulu 

//ambil dulu data saldo dari si pengirim
$saldo_pengirim = cek_saldo($_POST['rekening_asal']);

//lalu kurangi saldo_pengirim dari pengirim 
$rumus_pengirim = (int)$saldo_pengirim['SALDO_REK'] - $_POST['jumlah_tf'];

//update data rekening pengirim
update_saldo($_POST['rekening_asal'],$rumus_pengirim);

//ambil dulu data saldo dari si penerima
$saldo_penerima = cek_saldo($_POST['rekening_penerima']);

//lalu tambah saldo_penerima dari pengirim
$rumus_penerima =(int)$saldo_penerima['SALDO_REK'] + $_POST['jumlah_tf'];

//update data rekening pengirim
update_saldo($_POST['rekening_penerima'],$rumus_penerima);

//tambahkan data transaksi
$kalimat_query = $kon -> prepare('INSERT INTO transaksi (JUM_TRANSFER,no_rek_pengirim,no_rek_penerima) VALUES (:total_tf,:si_pengirim,:si_penerima)');
$kalimat_query -> bindValue(':total_tf',  $_POST['jumlah_tf');
$kalimat_query -> bindValue(':si_pengirim', $_POST['rekening_asal']);
$kalimat_query -> bindValue(':si_penerima',  $_POST['rekening_penerima']);
$kalimat_query -> execute(); 

// header('location:home.php?link=melakukan_transaksi');
?>