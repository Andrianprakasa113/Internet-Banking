<?php
include './koneksi.php';
include './fungsi.php';
 $home_usr = $kon -> prepare("select * from nasabah where USERNAME_NSB=:nsb ");
 $home_usr -> bindValue(":nsb", $_SESSION['nsb']);
 $home_usr -> execute(); 

 //buat lebih dahulu variabel ceknya
 $nama_usr = cek_alfabet(@$_POST['nama_user']);
 $pas_usr  = password(@$_POST['sandi_user']);

 $tgl = tgl(@$_POST['tgl']);
 $bln = bln(@$_POST['bln']);
 $thn = thn(@$_POST['thn']);

 $alamat_usr = alfa_num(@$_POST['alamat_user']);
 $email     = alamat_email(@$_POST['email_user']);
 $no_hp     = cek_numerik_tlp(@$_POST['no_hp_user']);

 $simpan = @$_POST['simpan'];
 foreach($home_usr as $data){
 ?>
 <div class="scroller">
 <div class="edit_profile_nsb">
        
        <div class="edit_inputan">
             <label class="isitabel1">Nama</label><br>
             <td class="isitabel1"><input type="text" name="nama_user" id="nama_user" class="inputan" value="<?php if(isset($simpan)){ echo htmlspecialchars($_POST['nama_user']);} else {echo "{$data['NAMA_NSB']}"; }?>"><br>
             <?php
                if (isset($simpan)) {
                ?>
                <label class="warning_salah">
                <?php if($nama_usr !== True){echo $nama_usr."<br>";}?> 
                </label>
                <?php
                }
                ?>
             <label class="isitabel1">Password</label><br>
             <input type="password" name="sandi_user" id="sandi_user" class="inputan" placeholder="masukkan sandi yang baru"><br>
             <?php
                if (isset($simpan)) {
                ?>
                <label class="warning_salah">
                <?php if($pas_usr !== True){echo $pas_usr."<br>";}?> 
                </label>
                <?php
                }
                ?>

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
                $gabungkan = @$_POST['thn'].'-'.@$_POST['bln'].'-'.@$_POST['tgl'];
                }
            
            
            ?>
             <label class="isitabel1">Alamat</label><br>
             <textarea name="alamat_user" id="alamat_user" class="alamat" cols="30" rows="4"><?php if(isset($simpan)){ echo htmlspecialchars($_POST['alamat_user']);} else {echo "{$data['ALAMAT_NSB']}"; }?></textarea><br>
             <?php
                if (isset($simpan)) {
                ?>
                <label class="warning_salah">
                <?php if($alamat_usr !== True){echo $alamat_usr."<br>";}?> 
                </label>
                <?php
                }
                ?>
             <label class="isitabel1">Email</label><br>
             <input type="text" name="email_user" id="email_user" class="inputan" value="<?php if(isset($simpan)){ echo htmlspecialchars($_POST['email_user']);} else { echo "{$data['EMAIL_NSB']}"; }?>"><br>
             <?php
                if (isset($simpan)) {
                ?>
                <label class="warning_salah">
                <?php if($email !== True){echo $email."<br>";}?> 
                </label>
                <?php
                }
                ?>
             <label class="isitabel1">No Hp</label><br>
             <input type="text" name="no_hp_user" id="no_hp_user" class="inputan" value="<?php if(isset($simpan)){ echo htmlspecialchars($_POST['no_hp_user']);} else { echo "{$data['NO_HP_NSB']}";} ?>"><br>
             <?php
                if (isset($simpan)) {
                ?>
                <label class="warning_salah">
                <?php if($no_hp !== True){echo $no_hp."<br>";}?> 
                </label>
                <?php
                }
                ?>
             <input type="submit" value="Simpan" name="simpan" class="simpan">
        </div>
     <?php
      if (isset($simpan) && $nama_usr && $pas_usr && $tgl && $bln && $thn && $alamat_usr && $email && $no_hp === true) {
        
         $kalimat_query = $kon -> prepare("UPDATE nasabah SET NAMA_NSB = :nama_nsb, PASSWORD_NSB = SHA2 (:pass_nsb, 0), TGL_NSB = :tgl, ALAMAT_NSB = :alamat, EMAIL_NSB = :email, NO_HP_NSB = :no_hp where USERNAME_NSB = :nsb");
         $kalimat_query -> bindValue(":nsb",$_SESSION['nsb']);
         $kalimat_query -> bindValue(":nama_nsb",$_POST['nama_user']); 
         $kalimat_query -> bindValue(":pass_nsb",$_POST['sandi_user']); 
         $kalimat_query -> bindValue(":tgl",$gabungkan); 
         $kalimat_query -> bindValue(":alamat",$_POST['alamat_user']); 
         $kalimat_query -> bindValue(":email",$_POST['email_user']); 
         $kalimat_query -> bindValue(":no_hp",$_POST['no_hp_user']);
         $kalimat_query -> execute(); 
     }
     ?>
     </div>
 </div>
 <?php
 }

?>
