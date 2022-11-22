<?php
include './koneksi.php';
include './fungsi.php';


?>
<form action="#" method='POST'>
<div class="transaksi">
    <h1>melakukan transaksi</h1>
    <label for="rekening_asal">Masukkan no rekening :</label>
    <datalist id="rekening_asal" name='rekening_asal'></datalist>
    <label for="nominal">Masukkan rekening tujuan :</label>
    <input type="text" id='nominal' name="jumlah_tf">
    <label for="nominal">Masukkan nominal transfer :</label>
    <input type="text" id='nominal' name="jumlah_tf">
    <input type="submit" value="Kirim" name="tombol">
</div>
</form>

