<?php
include './koneksi.php';

$kalimat_query =  $kon -> prepare('SELECT transaksi.*, rekening.USERNAME_NSB from rekening inner join transaksi on rekening.NO_REK = transaksi.no_rek_pengirim where USERNAME_NSB = :nama_nsb and NO_REK =:no_rek');
$kalimat_query -> bindValue(':nama_nsb',$_SESSION['nsb']);
$kalimat_query -> bindValue(':no_rek',$_GET['link_no_rek']);
$kalimat_query -> execute();


?>
<div class="lihat_transaksi">
    <table>
        <tr>
            <th>Nama  nasabah</th>
            <th>Waktu transaksi</th>
            <th>Jumlah transfer</th>
            <th>Rekening pengirim </th>
            <th>Rekening penerima</th>
        </tr>
        <?php
        foreach ($kalimat_query as $data) {
            ?>
            <tr>
                <td><?php echo "{$data['USERNAME_NSB']}";?></td>
                <td><?php echo "{$data['WAKTU_TRANSAKSI']}";?></td>
                <td><?php echo "{$data['JUM_TRANSFER']}";?></td>
                <td><?php echo "{$data['no_rek_pengirim']}";?></td>
                <td><?php echo "{$data['no_rek_penerima']}";?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>