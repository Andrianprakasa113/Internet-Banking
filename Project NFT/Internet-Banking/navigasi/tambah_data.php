<?php
error_reporting(0);
include './koneksi.php';
include './fungsi.php';
$home_admin = $kon -> prepare("select * from admin where USERNAME_ADMIN=:ADMIN ");
$home_admin -> bindValue(":ADMIN", $_SESSION['admin']);
$home_admin -> execute();

$cek_usr = $kon -> prepare("select * from nasabah where USERNAME_NSB=:NASABAH ");
$cek_usr -> bindValue(":NASABAH", @$_POST['username']);
$cek_usr -> execute();

$hsl_cek = $cek_usr->rowCount();

$cek_rek = $kon -> prepare("select * from rekening where NO_REK=:rek ");
$cek_rek -> bindValue(":rek", @$_POST['no_rek']);
$cek_rek -> execute();

$cek_rek1 = $cek_rek->rowCount();

$data_rek =true;
$data_cek = true; 

$username = alfa_num(@$_POST['username']);
$rek = cek_numerik_rek(@$_POST['no_rek']);
$simpan = @$_POST['simpan'];
foreach($home_admin as $data){
?>
<div class="scroller">
<div class="tambah_data">
    <div class="edit_inputan">
        <label class="isitabel1">Username</label><br>
        <td class="isitabel1"><input type="text" name="username" id="username" class="inputan" placeholder="Alfanumerik" value="<?php if(isset($simpan)){ echo htmlspecialchars($_POST['username']);} else {echo "{$data['']}"; }?>"><br>
                <?php
                    if (isset($simpan)) {
                ?>
                    <label class="warning_salah">
                    <?php if($username !== True){echo $username."<br>";
                    }if($hsl_cek==0){echo "*user tidak ada!";
                    $data_cek=false;} ?> 
                    <br>
            </label>
                <?php
                }
                ?>


            <label class="isitabel1">Norek</label><br>
                <td class="isitabel1"><input type="text" name="no_rek" id="no_rek" class="inputan" placeholder="Numerik"  value="<?php if(isset($simpan)){ echo htmlspecialchars($_POST['no_rek']);} else {echo "{$data['']}"; }?>"><br>
                <?php
                    if (isset($simpan)) {
                ?>
                    <label class="warning_salah">
                    <?php if($rek !== True){echo $rek."<br>";
                    }if($cek_rek1>0){echo "*rek sudah ada!";
                    $data_rek=false;}?> 
            </label>
                <?php
                }
                ?>

                <input type="submit" value="Simpan" name="simpan" class="simpan">
    </div>

<?php
if (isset($simpan)&&$username && $rek  === true && $data_rek && $data_cek){
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
