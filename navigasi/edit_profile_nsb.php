<?php
include './koneksi.php';
include './fungsi.php';
 $home_usr = $kon -> prepare("select * from nasabah where USERNAME_NSB=:nsb ");
 $home_usr -> bindValue(":nsb", $_SESSION['nsb']);
 $home_usr -> execute(); 

 //buat lebih dahulu variabel ceknya
 $tgl = tgl(@$_POST['tgl']);
 $bln = bln(@$_POST['bln']);
 $thn = thn(@$_POST['thn']);
 $simpan = @$_POST['simpan'];
 foreach($home_usr as $data){
 ?>
 <div class="scroller">
 <div class="edit_profile_nsb">
    <div>
    <img class="adminprofil" src="./gambar/icon.png" alt>
    </div>
        
        <div class="edit_inputan">
             <label class="isitabel1">Nama</label><br>
             <td class="isitabel1"><input type="text" name="nama_user" id="nama_user" class="inputan" value="<?php if(isset($simpan)){ echo htmlspecialchars($_POST['nama_user']);} else {echo "{$data['NAMA_NSB']}"; }?>"><br>

             <label class="isitabel1">Password</label><br>
             <input type="password" name="sandi_user" id="sandi_user" class="inputan" placeholder="masukkan sandi yang baru"><br>

             <label class="isitabel1" >Tanggal lahir</label><br>
                <?php
                //buat inputan tanggal
                $pisahkan = explode("-",$data['TGL_NSB']);
                ?>
             <input type="text" value="<?php if(isset($simpan)){ echo htmlspecialchars($_POST['tgl']);} else { echo "{$pisahkan[2]}"; }?>" name="tgl" class="tgl"> - 
             
             <input type="text" value="<?php if(isset($simpan)){ echo htmlspecialchars($_POST['bln']);} else { echo "{$pisahkan[1]}"; }?>" name="bln" class="bln"> - 
             <input type="text" value="<?php if(isset($simpan)){ echo htmlspecialchars($_POST['thn']);} else { echo "{$pisahkan[0]}"; }?>" name="thn" class="thn">
             <br>
             <?php
                if (isset($simpan)) {
                ?>
                <label class="warning_salah">
                <?php if($tgl !== True){echo $tgl."<br>";}?> 
                <?php if($bln !== True){echo $bln."<br>";}?>
                <?php if($thn !== True){echo $thn;}?>
                </label>
                <?php
                }
            
            $gabungkan = @$_POST['thn'].'-'.@$_POST['bln'].'-'.@$_POST['tgl'];
            ?>
             <label class="isitabel1">Alamat</label><br>
             <textarea name="alamat_user" id="alamat_user" class="alamat" cols="20" rows="4"><?php if(isset($simpan)){ echo htmlspecialchars($_POST['alamat_user']);} else {echo "{$data['ALAMAT_NSB']}"; }?></textarea><br>
             <label class="isitabel1">Email</label><br>
             <input type="text" name="email_user" id="email_user" class="inputan" value="<?php if(isset($simpan)){ echo htmlspecialchars($_POST['email_user']);} else { echo "{$data['EMAIL_NSB']}"; }?>"><br>
             <label class="isitabel1">No Hp</label><br>
             <input type="text" name="no_hp_user" id="no_hp_user" class="inputan" value="<?php if(isset($simpan)){ echo htmlspecialchars($_POST['no_hp_user']);} else { echo "{$data['NO_HP_NSB']} ";} ?>"><br>
             <input type="submit" value="Simpan" name="simpan">
        </div>
     <?php
    //   if (isset($_POST['simpan'])) {
    //     var_dump($_POST);
    //  }
     ?>
     </div>
 </div>
 <?php
 }

?>
