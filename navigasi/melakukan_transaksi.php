<?php
include './koneksi.php';
include './fungsi.php';

$rekening_asal = $_POST['rekening_asal'];
$rekening_penerima = $_POST['rekening_penerima'];
?>
<form action="#" method='POST'>
<div class="transaksi">
    <h1>melakukan transaksi</h1>
    <label for="rekening_asal">Masukkan no rekening :</label>
    <datalist id="rekening_asal" name='rekening_asal' <?php if(isset($tombol)){ echo htmlspecialchars($_POST['rekening_asal']);}?>>

    </datalist>
    <label for="rekening_penerima">Masukkan rekening tujuan :</label>
    <input type="text" id='rekening_penerima' name="rekening_penerima">

    <label for="nominal">Masukkan nominal transfer :</label>
    <input type="text" id='nominal' name="jumlah_tf">
    <input type="submit" value="Kirim" name="tombol">
</div>
</form>

<?php
if (isset($_POST['tombol'])) {
    

}
?>

