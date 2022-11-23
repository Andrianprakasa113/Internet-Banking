<?php
    include "./koneksi.php";
    if (isset($_SESSION['admin'])) {
        # code...
        $home_admin = $kon -> prepare("select * from admin where USERNAME_ADMIN=:ADMIN ");
        $home_admin -> bindValue(":ADMIN", $_SESSION['admin']);
        $home_admin -> execute(); 

        foreach($home_admin as $data){
        ?>
        <div class="hom">
            <img class="adminprofil" src="./gambar/<?php echo $_SESSION['admin'];?>.jpg" alt>
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
    }
    else if (isset( $_SESSION['nsb'])){
        $home_usr = $kon -> prepare("select * from nasabah where USERNAME_NSB=:nsb ");
        $home_usr -> bindValue(":nsb", $_SESSION['nsb']);
        $home_usr -> execute(); 

        foreach($home_usr as $data){
        ?>
        <div class="hom">
            <img class="adminprofil" src="./gambar/img_258083.png" alt>
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
            </table>
        </div>
        <?php
        }
    }
    ?>
