<?php
include './koneksi.php';
 $home_usr = $kon -> prepare("select * from rekening where USERNAME_NSB= :nsb ");
 $home_usr -> bindValue(":nsb", $_GET["hapus"]);
 $home_usr -> execute();
 
//  $id = $home_usr->fetch();

 //buat lebih dahulu variabel ceknya


 foreach($home_usr as $data){
 ?>
 <div class="scroller">
        <div class="tambah_data">
            <input type="text" value="<?php echo $data['USERNAME_NSB'] ;?>" name="hapus">
            <input type="text" value="<?php echo $data['NO_REK']; ?>" name="rk">
             <h2>Confirm hapus data? </h2>
             <input type="submit" value="Confirm" name="simpan" class="simpan">
             <a href="home.php?link=daftar_akun" class="simpan">cancel</a>
        </div>
     <?php
      if (isset($simpan) === true) {
         $kalimat_query = $kon -> prepare("DELETE FROM rekening WHERE rekening.USERNAME_NSB = :hapus AND CONCAT(rekening.NO_REK) = :rek ");
         $kalimat_query -> bindValue(":hapus",$_POST['hps']); 
         $kalimat_query -> bindValue(":rek",$_POST['rk']); 
         $kalimat_query -> execute(); 
     }
     ?>
 </div>
 <?php
 }

?>
