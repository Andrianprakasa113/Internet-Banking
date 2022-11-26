<div class="scroller">
<div class="daftar_akun">
    <?php
    include ('koneksi.php');
    $home_admin = $kon -> prepare("select nasabah.*,rekening.NO_REK, rekening.WAKTU_BUAT_REK from nasabah inner join rekening ON nasabah.USERNAME_NSB = rekening.USERNAME_NSB");
    $home_admin -> execute();
    $no = 1;
    ?>
    <table>
        <tr>
            <th class='isi_tabel'>Nama</th>
            <th class='isi_tabel'>Alamat</th>
            <th class='isi_tabel'>Email</th>
            <th class='isi_tabel'>Tanggal Pembuatan</th>
            <th class='isi_tabel'>No Hp</th>
            <th class='isi_tabel'>No Rekening</th>
            <th class="isi_tabel" colspan='2'>Tindakan</th>
        </tr>
        <?php
        foreach($home_admin as $data){
                if ($no%2==1) {
                    ?>
                <tr class="warna1">
                <?php
                }
                else {
                    ?>
                    <tr class="warna2">
                    <?php
                }
            ?>
            <td class='isi_tabel'><?php echo "{$data['NAMA_NSB']}"; ?></td>
            <td class='isi_tabel'><?php echo "{$data['ALAMAT_NSB']}"; ?></td>
            <td class='isi_tabel'><?php echo "{$data['EMAIL_NSB']} "; ?></td>
            <td class='isi_tabel'><?php echo "{$data['WAKTU_BUAT_REK']} "; ?></td>
            <td class='isi_tabel'><?php echo "{$data['NO_HP_NSB']} "; ?></td>
            <td class='isi_tabel'><?php echo "{$data['NO_REK']} "; ?></td>
            <td class="isi_tabel"><a href="home.php?link=edit_admin&id_admin=<?php echo $data['USERNAME_NSB'] ?>"> Edit </a></td>
            <td class="isi_tabel"><a href="home.php?link=hapus_akun&hapus=<?php echo $data['USERNAME_NSB'] ?>"> Delete </a></td>
        </tr>
        <?php
        
        }
        ?>

    </table>
</div>
</div>