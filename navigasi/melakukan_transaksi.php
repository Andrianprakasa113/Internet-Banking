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
$tombol             = @$_POST['tombol'];
?>
<div class="scroller">
<div class="transaksi">
    <label for="rekening_asal">Masukkan no rekening</label><br>
    <input list="rekening_asal1"  id="rekening_asal" name='rekening_asal' class="inputan" value="<?php if(isset($_POST['tombol'])){ echo htmlspecialchars($_POST['rekening_asal']);}?>">
    <datalist id="rekening_asal1" >
        <?php
        foreach ($kalimat_query as $data) {
            ?>
            <option value="<?php echo $data['NO_REK'];?>">
        <?php
        }
        ?>
    </datalist><br>
    <?php
        if (isset($tombol)) {
        ?>
        <label class="warning_salah">
        <?php if($rekening_asal !== True){echo $rekening_asal;}?>
        </label>
        <?php
        }
    ?>
    <br>
    <label for="rekening_penerima">Masukkan rekening tujuan</label><br>
    <input type="text" id='rekening_penerima' name="rekening_penerima"  class="inputan" value="<?php if(isset($tombol)){ echo htmlspecialchars($_POST['rekening_penerima']);}?>">
    <br>
    <?php
        if (isset($tombol)) {
        ?>
        <label class="warning_salah">
        <?php if($rekening_penerima !== True){echo $rekening_penerima;}?>
        </label>
        <?php
        }
    ?>
    <br>
    <label for="nominal">Masukkan nominal transfer</label><br>
    <input type="text" id='nominal' name="jumlah_tf" class="inputan" value="<?php if(isset($tombol)){ echo htmlspecialchars($_POST['jumlah_tf']);}?>">
    <br>
    <?php
        if (isset($tombol)) {
        ?>
        <label class="warning_salah">
        <?php if($total_transfer !== True){echo $total_transfer."<br>";}?>
        </label>
        <?php
        }
    ?>
    <input type="submit" value="Kirim" name="tombol" class="simpan">
    <br>
<?php
//eksekusi cek pogramnya
if (isset($tombol) && $rekening_asal === true && $rekening_penerima === true && $total_transfer === true) {

    // cek dulu rekeningnya sekaligus saldonya
    $kalimat_query = $kon -> prepare("SELECT NO_REK, SALDO_REK FROM rekening where NO_REK = :no_rek and USERNAME_NSB = :nama_user");
    $kalimat_query -> bindValue(':nama_user',$_SESSION['nsb']);
    $kalimat_query -> bindValue(':no_rek',$_POST['rekening_asal']);
    $kalimat_query -> execute();
    $cek_pengirim = $kalimat_query -> rowCount();
    $cek_saldo = $kalimat_query -> fetch();

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
                //sekarang cek saldo minimal transfernya
                if ($_POST['jumlah_tf'] >= 50000) {
                    //jika saldonya memenuhi maka izinkan
                    //sekarang eksekusi pogramnya
                    if ((int) $cek_saldo['SALDO_REK'] >= $_POST['jumlah_tf']) {
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

                                header('location:home.php?link=melakukan_transaksi');
                    }
                    else {
                        ?>
                        <label class="warning_salah">*saldo tidak mencukupi</label>
                        <?php
                    }
                }
                else {
                    ?>
                <label class="warning_salah">*saldo transfer minimal Rp 50.000</label>
                <?php
              }
            }
            else {
                ?>
            <label class="warning_salah">*data no rekening penerima tidak ada</label>
            <?php
        }
        }
        else {
                ?>
            <label class="warning_salah">*data no rekening pengirim dan penerima tidak boleh sama</label>
            <?php
        }
    }
    else{
        ?>
        <label class="warning_salah">*data no rekening pengirim tidak ada</label>
        <?php
    }
}
?>
</div>
</div>