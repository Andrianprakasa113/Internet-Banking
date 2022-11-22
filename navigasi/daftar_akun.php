<div class="scroller">
<div class="daftar_akun">
    <?php
    include ('koneksi.php');
    $home_admin = $kon -> prepare("select * from nasabah");
    $home_admin -> execute(); 
    foreach($home_admin as $data){
        echo "{$data['NAMA_NSB']}";
        echo "{$data['ALAMAT_NSB']}";
        echo "{$data['EMAIL_NSB']} ";
        echo "{$data['TGL_NSB']} ";
        echo "{$data['NO_HP_NSB']} ";
    }
    ?>
</div>
</div>