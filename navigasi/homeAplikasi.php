<?php
    include ("koneksi.php");
    $home_admin = $kon -> prepare("select * from admin where USERNAME_ADMIN=:ADMIN ");
    $home_admin -> bindValue(":ADMIN", $_SESSION['admin']);
    $home_admin -> execute(); 

    foreach($home_admin as $data){
    ?>
    <div class="hom">
        <img class="adminprofil" src="./gambar/rosi.jpg">
        <table >
            <tr>
                <th class="isitabel1">Nama</th>
                <td class="isitabel1">:</td>
                <td class="isitabel1"><?php echo "{$data['NAMA_ADMIN']}" ?></td>
                
            </tr>
            <tr>
                <th class="isitabel1">Email</th>
                <td class="isitabel1">:</td>
                <td class="isitabel1"><?php echo "{$data['EMAIL_ADMIN']}"; ?></td>
            </tr>
            <tr>
                <th class="isitabel1">No Hp</th>
                <td class="isitabel1">:</td>
                <td class="isitabel1"><?php echo "{$data['NO_HP_ADMIN']} "; ?></td>
            </tr>
        </table>
    </div>
    <?php
    }
    ?>
