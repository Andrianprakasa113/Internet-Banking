<?php
    include ("koneksi.php");
    $home_admin = $kon -> prepare("select * from admin where USERNAME_ADMIN=:ADMIN ");
    $home_admin -> bindValue(":ADMIN", $_SESSION['admin']);
    $home_admin -> execute(); 

    foreach($home_admin as $data){
    ?>
    <div class="transaksi">
        <table border=1px>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>No Hp</th>
            </tr>
            <tr>
                <th><?php echo "{$data['NAMA_ADMIN']}" ?></th>
                <th><?php echo "{$data['EMAIL_ADMIN']}"; ?></th>
                <th><?php echo "{$data['NO_HP_ADMIN']} "; ?></th>
            </tr>
        </table>
    </div>
    <?php
    }
    ?>