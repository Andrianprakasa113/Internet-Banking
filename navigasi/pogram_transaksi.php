<?php
include '../koneksi.php';

 //ambil dulu data saldo dari si pengirim
 $kalimat_query = $kon -> prepare('SELECT SALDO_REK from rekening where NO_REK = :no_rek');
 $kalimat_query -> bindValue(':no_rek',  $_POST['rekening_asal']);
 $kalimat_query -> execute(); 
 $saldo_pengirim = $kalimat_query -> fetch();
 //lalu kurangi saldo_pengirim dari pengirim 
 $rumus_pengirim = $saldo_pengirim['SALDO_REK'] - $_POST['jumlah_tf'];

 //update data rekening pengirim
 $kalimat_query = $kon -> prepare('UPDATE rekening SET SALDO_REK = :update_saldo where NO_REK = :no_rek');
 $kalimat_query -> bindValue(':no_rek', $_POST['rekening_asal']);
 $kalimat_query -> bindValue(':update_saldo', $rumus_pengirim);
 $kalimat_query -> execute();

 //ambil dulu data saldo dari si penerima
 $kalimat_query = $kon -> prepare('SELECT SALDO_REK from rekening where NO_REK = :no_rek');
 $kalimat_query -> bindValue(':no_rek', $_POST['rekening_penerima']);
 $kalimat_query -> execute(); 
 $saldo_penerima =  $kalimat_query -> fetch();

 //lalu tambah saldo_penerima dari pengirim
 $rumus_penerima = $saldo_penerima['SALDO_REK'] + $_POST['jumlah_tf'];

 //update data rekening pengirim
 $kalimat_query = $kon -> prepare('UPDATE rekening SET SALDO_REK = :update_saldo where NO_REK = :no_rek');
 $kalimat_query -> bindValue(':no_rek',$_POST['rekening_penerima']);
 $kalimat_query -> bindValue(':update_saldo', $rumus_penerima);
 $kalimat_query -> execute();

 //tambahkan data transaksi
 $kalimat_query = $kon -> prepare('INSERT INTO transaksi (WAKTU_TRANSAKSI,JUM_TRANSFER,no_rek_pengirim,no_rek_penerima) VALUES (now(),:total_tf,:si_pengirim,:si_penerima)');
 $kalimat_query -> bindValue(':total_tf',  $_POST['jumlah_tf']);
 $kalimat_query -> bindValue(':si_pengirim', $_POST['rekening_asal']);
 $kalimat_query -> bindValue(':si_penerima',  $_POST['rekening_penerima']);
 $kalimat_query -> execute(); 

 //header('location:./home.php?link=melakukan_transaksi');
?>