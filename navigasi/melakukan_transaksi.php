
<form action="#" method='POST'>
<div class="transaksi">
    <h1>melakukan transaksi</h1>
    <label for="nominal">Masukkan nominal transfer :</label>
    <input type="text" id='nominal' name="jumlah_tf">
    <input type="submit" value="Kirim" name="tombol">
</div>
</form>
<?php
include './koneksi.php';
include './fungsi.php';


if (isset($_POST['tombol'])) {
    $nominal_tf = $_POST['jumlah_tf'];
    echo $nominal_tf;
}

?>
