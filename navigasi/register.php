<?php
include './koneksi.php';
include './fungsi.php';
$home_admin = $kon -> prepare("select * from admin where USERNAME_ADMIN=:ADMIN ");
$home_admin -> bindValue(":ADMIN", $_SESSION['admin']);
$home_admin -> execute(); 


 //buat lebih dahulu variabel ceknya
 $nama_usr = cek_alfabet(@$_POST['nama_user']);
 $pas_usr  = password(@$_POST['sandi_user']);
 $username = alfa_num(@$_POST['username']);

 $tgl = tgl(@$_POST['tgl']);
 $bln = bln(@$_POST['bln']);
 $thn = thn(@$_POST['thn']);

 $alamat_usr = alfa_num(@$_POST['alamat_user']);
 $email     = alamat_email(@$_POST['email_user']);
 $no_hp     = cek_numerik_tlp(@$_POST['no_hp_user']);

 $simpan = @$_POST['simpan'];
 foreach($home_admin as $data){
 ?>
 <div class="scroller">
 <div class="edit_profile_nsb">
    <div>
    <img class="adminprofil" src="./gambar/icon.png" alt>
    </div>
        <div class="edit_inputan">
           <form action="register.php" method="post">
             <label class="isitabel1">Nama</label><br>
             <td class="isitabel1"><input type="text" name="nama_user" id="nama_user" class="inputan" placeholder="Tidak boleh angka"><br>
             <?php
                if (isset($simpan)) {
                ?>
                <label class="warning_salah">
                <?php if($nama_usr !== True){echo $nama_usr."<br>";}?> 
                </label>
                <?php
                }
                ?>

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

             <label class="isitabel1">Password</label><br>
             <input type="password" name="sandi_user" id="sandi_user" class="inputan" placeholder="Minimal 8 dan alfanumerik"><br>
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
                $pisahkan =@explode("-",$data['TGL_NSB']);
                ?>
             <input type="text"placeholder="Tanggal" name="tgl" class="tgl"> - 
             <input type="text"placeholder="Bulan" name="bln" class="bln"> - 
             <input type="text"placeholder="Tahun" name="thn" class="thn">
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
             <br><label class="isitabel1">Alamat</label><br>
             <textarea name="alamat_user" id="alamat_user" class="alamat" cols="30" rows="4" placeholder="Alamat"></textarea><br>
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
             <input type="text" name="email_user" id="email_user" class="inputan" placeholder="Email"><br>
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
             <input type="text" name="no_hp_user" id="no_hp_user" class="inputan" placeholder="Minimal 12"><br>
             <?php
                if (isset($simpan)) {
                ?>
                <label class="warning_salah">
                <?php if($no_hp !== True){echo $no_hp."<br>";}?> 
                </label>
            </form>
                <?php
                }
                ?>
             <input type="submit" value="Simpan" name="simpan" class="simpan">
        </div>
     <?php
<<<<<<< HEAD
      if (isset($simpan) && $nama_usr && $pas_usr && $tgl && $bln && $thn && $alamat_usr && $email && $no_hp === true) {
         $kalimat_query = $kon -> prepare("insert into nasabah (NAMA_NSB, USERNAME_NSB, PASSWORD_NSB, ALAMAT_NSB, EMAIL_NSB, TGL_NSB, NO_HP_NSB) 
=======
      if (isset($simpan) && $nama_usr && $pas_usr && $tgl && $bln && $thn && $alamat_usr && $email && $no_hp) {
         $kalimat_query = $kon -> prepare("insert into nasabah (NAMA_NSB, USERNAME_NSB, PASSWORD_NSB, TGL_NSB, ALAMAT_NSB, EMAIL_NSB, NO_HP_NSB) 
>>>>>>> 6fc7fdc8fe9c7a2f8b1f61386dc8e42022936360
         VALUES (:nama_nsb,:username, SHA2 (:pass_nsb, 0), :tgl, :alamat, :email, :no_hp)");
         $kalimat_query -> bindValue(":nama_nsb",$_POST['nama_user']); 
         $kalimat_query -> bindValue(":username",$_POST['username']);
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
