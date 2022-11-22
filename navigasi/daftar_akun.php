<div class="scroller">
<div class="daftar_akun">
    <?php
    include ('koneksi.php');
    $home_admin = $kon -> prepare("select nasabah.*,rekening.SALDO_REK from nasabah inner join rekening ON nasabah.USERNAME_NSB = rekening.USERNAME_NSB");
    $home_admin -> execute();
    foreach($home_admin as $data){
    ?>
    <table>
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>Tanggal Pembuatan</th>
            <th>No Hp</th>
            <th>Saldo</th>
        </tr>
        <tr>
            <td><?php echo "{$data['NAMA_NSB']}"; ?></td>
            <td><?php echo "{$data['ALAMAT_NSB']}"; ?></td>
            <td><?php echo "{$data['EMAIL_NSB']} "; ?></td>
            <td><?php echo "{$data['TGL_NSB']} "; ?></td>
            <td><?php echo "{$data['NO_HP_NSB']} "; ?></td>
            <td><?php echo "{$data['SALDO_REK']} "; ?></td>
        </tr>
    </table>
    <?php
    }
    ?>
</div>
</div>