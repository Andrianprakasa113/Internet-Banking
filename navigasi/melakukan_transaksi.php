<?php
include './koneksi.php';
include './fungsi.php';

//panggil no rekeningnya dulu 

$kalimat_query = $kon -> prepare("SELECT NO_REK FROM rekening where USERNAME_NSB = :nama_user");
$kalimat_query -> bindValue(':nama_user',$_SESSION['nsb']);
$kalimat_query -> execute();

// buat variabel ceknya
$rekening_asal      = cek_numerik_rek(@$_POST['rekening_asal']);
$rekening_penerima  = cek_numerik_rek(@$_POST['rekening_penerima']);
$total_transfer     = cek_numerik(@$_POST['jumlah_tf']);
?>
<form action="#" method='POST'>
<div class="transaksi">
    <label for="rekening_asal">Masukkan no rekening :</label>
    <input list="rekening_asal1"  id="rekening_asal" name='rekening_asal' value="<?php if(isset($_POST['tombol'])){ echo htmlspecialchars($_POST['rekening_asal']);}?>">
    <datalist id="rekening_asal1" >
        <?php
        foreach ($kalimat_query as $data) {
            ?>
            <option value="<?php echo $data['NO_REK'];?>">
        <?php
        }
        ?>
    </datalist>
    <label for="rekening_penerima">Masukkan rekening tujuan :</label>
    <input type="text" id='rekening_penerima' name="rekening_penerima" value="<?php if(isset($_POST['tombol'])){ echo htmlspecialchars($_POST['rekening_penerima']);}?>">

    <label for="nominal">Masukkan nominal transfer :</label>
    <input type="text" id='nominal' name="jumlah_tf">
    <input type="submit" value="Kirim" name="tombol">
<?php
//eksekusi pogramnya
if (isset($_POST['tombol']) && $rekening_asal === true && $rekening_penerima === true && $total_transfer === true) {
    // cek dulu rekeningnya 
    $kalimat_query = $kon -> prepare("SELECT NO_REK FROM rekening where NO_REK = :no_rek and USERNAME_NSB = :nama_user");
    $kalimat_query -> bindValue(':nama_user',$_SESSION['nsb']);
    $kalimat_query -> bindValue(':no_rek',$_POST['rekening_asal']);
    $kalimat_query -> execute();
    $cek_pengirim = $kalimat_query -> rowCount();
    if ($cek_pengirim > 0) {
        //sekarang cek data rekening pengirim dan rekening penerima
        //kalau sama jangan dizinkan
        if ($_POST['rekening_asal'] != $_POST['rekening_penerima']) {
            $kalimat_query = $kon -> prepare("SELECT NO_REK FROM rekening where NO_REK = :no_rek");
            $kalimat_query -> bindValue(':no_rek',$_POST['rekening_penerima']);
            $kalimat_query -> execute();
            $cek_penerima = $kalimat_query -> rowCount();
            //lalu cek apakah ada data no rekening penerimanya
            if ($cek_penerima > 0) {
                //sekarang cek saldo transfernya
                
                header('loaction:pogram_transaksi.php');
            }
            else {
                ?>
            <p>*data no rekening pengirim tidak ada</p>
            <?php
        }
        }
        else {
                ?>
            <p>*data no rekening pengirim tidak boleh sama</p>
            <?php
        }
    }
    else{
        ?>
        <p>*data no rekening pengirim tidak ada</p>
        <?php
    }
}
?>
</div>
</form>