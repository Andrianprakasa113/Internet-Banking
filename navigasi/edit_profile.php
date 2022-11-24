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
             <td class="isitabel1"><?php echo "{$data['NAMA_NSB']}" ?></td>
             
         </tr>
         <tr>
             <th class="isitabel1">Tanggal lahir</th>
             <td class="isitabel1">:</td>
             <td class="isitabel1"><?php echo "{$data['TGL_NSB']}"; ?></td>
         </tr>
         <tr>
             <th class="isitabel1">Alamat</th>
             <td class="isitabel1">:</td>
             <td class="isitabel1"><?php echo "{$data['ALAMAT_NSB']}"; ?></td>
         </tr>
         <tr>
             <th class="isitabel1">Email</th>
             <td class="isitabel1">:</td>
             <td class="isitabel1"><?php echo "{$data['EMAIL_NSB']}"; ?></td>
         </tr>
         <tr>
             <th class="isitabel1">No Hp</th>
             <td class="isitabel1">:</td>
             <td class="isitabel1"><?php echo "{$data['NO_HP_NSB']} "; ?></td>
         </tr>
         <tr>
             <th class="isitabel1"><input type="submit" value="Simpan"></th>
         </tr>
     </table>
 </div>
 <?php
 }
?>
