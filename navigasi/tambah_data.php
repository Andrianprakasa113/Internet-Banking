<?php
include './koneksi.php';
include './fungsi.php';
$home_admin = $kon -> prepare("select * from admin where USERNAME_ADMIN=:ADMIN ");
$home_admin -> bindValue(":ADMIN", $_SESSION['admin']);
$home_admin -> execute();

$username = alfa_num(@$_POST['username']);
$tgl = tgl(@$_POST['tgl']);
$bln = bln(@$_POST['bln']);
$thn = thn(@$_POST['thn']);
$rek = cek_numerik_rek(@$_POST['no_rek']);
$simpan = @$_POST['simpan'];
foreach($home_admin as $data){
?>
<div class="scroller">
<div class="tambah_data">
    <div>
        <img class="adminprofil" src="./gambar/icon.png" alt>
    </div>
    <div class="edit_inputan">
            <label class="isitabel1">Username</label><br>
                <td class="isitabel1"><input type="text" name="username" id="username" class="inputan" placeholder="Alfanumerik"><br>
                <?php
                    if (isset($simpan)) {
                ?>
                    <label class="warning_salah">
                    <?php if($username !== True){echo $username."<br>";}?> 
            </label>
                <?php
                }
                ?>


            <label class="isitabel1">Norek</label><br>
                <td class="isitabel1"><input type="text" name="no_rek" id="no_rek" class="inputan" placeholder="Numerik"><br>
                <?php
                    if (isset($simpan)) {
                ?>
                    <label class="warning_salah">
                    <?php if($rek !== True){echo $rek."<br>";}?> 
            </label>
                <?php
                }
                ?>

                <input type="submit" value="Simpan" name="simpan" class="simpan">
    </div>

<?php
if (isset($simpan)&&$username && $rek && $tgl && $bln && $thn === true){
$kalimat_query = $kon -> prepare("insert into rekening (USERNAME_NSB,NO_REK, WAKTU_BUAT_REK) 
        VALUES (:username,:no_rek, now())");
 $kalimat_query -> bindValue(":username",$_POST['username']);
 $kalimat_query -> bindValue(":no_rek",$_POST['no_rek']);
 $kalimat_query -> execute(); 
}
?>
</div>
</div>
<?php
}
?>
