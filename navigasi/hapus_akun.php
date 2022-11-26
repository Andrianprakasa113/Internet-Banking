<?php
include './koneksi.php';
$home_admin = $kon -> prepare("select * from nasabah where USERNAME_NSB= :nsb ");
$home_admin -> bindValue(":nsb", $_GET["hapus"]);
$home_admin -> execute();


foreach($home_admin as $data){
?>
<div class="scroller">
    <div class="tambah_data">
        <input type="hidden" value="<?php echo $data ?>" name="hps">
        <h2>Confirm hapus data? </h2>
        <input type="submit" value="Confirm" name="simpan" class="simpan">
    </div>

<?php
    if (isset($simpan) === true) {
        $kalimat_query = $kon -> prepare("DELETE FROM nasabah WHERE USERNAME_NSB = :hps");
        $kalimat_query -> bindValue(':hps',$_POST['hps']);
        $kalimat_query -> execute();
    }
   
?>
</div>
</div>
<?php
}
?>

