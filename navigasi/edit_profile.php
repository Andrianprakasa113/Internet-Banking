<?php
include './koneksi.php';
 $home_usr = $kon -> prepare("select * from nasabah where USERNAME_NSB=:nsb ");
 $home_usr -> bindValue(":nsb", $_GET['link_edit_profile']);
 $home_usr -> execute(); 

 foreach($home_usr as $data){
 ?>
 <div class="hom">
     <img class="adminprofil" src="./gambar/icon.png" alt>
     <table >
         <tr>
             <th class="isitabel1">Nama</th>
             <td class="isitabel1">:</td>
             <td class="isitabel1"><input type="text" name="nama_user" id="nama_user" value="<?php echo "{$data['NAMA_NSB']}" ?>"></td>
             
         </tr>
         <tr>
             <th class="isitabel1">Tanggal lahir</th>
             <td class="isitabel1">:</td>
             <td class="isitabel1"><input type="date" value="<?php echo "{$data['TGL_NSB']}"; ?>" name="tgl"></td>
         </tr>
         <tr>
             <th class="isitabel1">Alamat</th>
             <td class="isitabel1">:</td>
             <td class="isitabel1"><textarea name="alamat_user" id="alamat_user" cols="20" rows="4"><?php echo "{$data['ALAMAT_NSB']}"; ?></textarea></td>
         </tr>
         <tr>
             <th class="isitabel1">Email</th>
             <td class="isitabel1">:</td>
             <td class="isitabel1"><input type="text" name="email_user" id="email_user" value="<?php echo "{$data['EMAIL_NSB']}"; ?>"></td>
         </tr>
         <tr>
             <th class="isitabel1">No Hp</th>
             <td class="isitabel1">:</td>
             <td class="isitabel1"><input type="text" name="no_hp_user" id="no_hp_user" value="<?php echo "{$data['NO_HP_NSB']} "; ?>"></td>
         </tr>
         <tr>
             <td class="isitabel1"><input type="submit" value="Simpan" name="simpan"></td>
             <td></td>
             <td></td>
         </tr>
     </table>
     <?php
    //   if (isset($_POST['simpan'])) {
    //     var_dump($_POST);
    //  }
     ?>
 </div>
 <?php
 }

?>
