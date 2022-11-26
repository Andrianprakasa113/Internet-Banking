<?php
include './koneksi.php';
$home_admin = $kon -> prepare("select * from admin where USERNAME_ADMIN=:ADMIN ");
$home_admin -> bindValue(":ADMIN", $_SESSION['admin']);
$home_admin -> execute();


foreach($home_admin as $data){
?>
<div class="scroller">
    <div class="tambah_data">
        <h2>confirm delete akun?</h2><br>
        <input type="submit" value="Confirm" name="simpan" class="simpan">
    </div>

<?php
    if (isset($simpan) == true) {
        $kalimat_query = $kon -> prepare("DELETE FROM nasabah WHERE USERNAME_NSB = 'Janice'");
        $kalimat_query -> execute();
    }

?>
</div>
</div>
<?php
}
?>

