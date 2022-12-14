<?php
session_start();
if (!isset($_SESSION['admin']) && !isset($_SESSION['nsb'])) {
    
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Aplikasi</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">

        <!-- Bagian buat header -->
        <div class="header">
            <div class="judul">
                <h1 class="kepala">BANSER</h1>
            </div>
            <div class="nav">
                <ul><li><a class="link" href="#">home</a></li>
                    <li><a class="link" href="#about">about</a></li>
                    <li><a class="link " href="#contact">contact us</a></li>
                </ul>
            </div>
        </div>
        <div class="container-content">
            <br>
            <br>
            
            <br>

            <!-- buat isi halaman bagian untuk home  -->
            <div class="content">
                <h2>Bank Sejahtera</h2>
                <p>BANSER kini hadir dalam bentuk internet banking. Tanpa harus pergi ke Bank nasabah bisa bertransaksi dimanapun dan kapanpun. Banser juga membebaskan nasabah dari biaya admin transfer ke sesama rekening Banser. Pada internet bangking Banser, nasabah bisa mengedit profile halaman nasabah. Tunggu apa lagi ayo segera menabung di Bank Sejahtera</p>
                
            </div>
            <div class="login">
                <h2>Login</h2>
                <form action="validasi_login.php" method="post">
                    <div>
                        <label for="username" class="label">username </label>
                        <br>
                        <input type="text" id="username" class="text_label" name="username">
                    </div>
                    <br>
                    <div>
                        <label for="password" class="label">password </label>
                        <br>
                        <input type="password" id="password" class="text_label" name="password">
                    </div>
                    <div>
                        <input type="submit" name="submit" class="submit" value="login">
                    </div>
                </form>
            </div>
        </div>

        <!-- buat isi halaman bagian untuk about us  -->
        <div class="about" id="about">
            <div class="bungkus_biodata">
                <div class="tempat_biodata">
                    <div class="gambar">
                        <img src="gambar/rosi.jpg" alt="icon" class="gambar_biodata">
                    </div>
                    <div class="isi_biodata">
                        <p class="isi">Fahrurrosi</p> 
                    </div>
                </div>
    
                <div class="tempat_biodata">
                    <div class="gambar">
                        <!-- Untuk gamabr bisa ambil gambar pribadi dengan ukuran 1:1 -->
                        <img src="gambar/andre.jpg" alt="icon" class="gambar_biodata">
                    </div>
                    <div class="isi_biodata">
                        <p class="isi">Andrian Andi Prakasa</p> 
                        <p class="isi"></p>
                    </div>
                </div>
    
                <div class="tempat_biodata">
                    <div class="gambar">
                        <!-- Untuk gamabr bisa ambil gambar pribadi dengan ukuran 1:1 -->
                        <img src="gambar/fadil.jpg" alt="icon" class="gambar_biodata">
                    </div>
                    <div class="isi_biodata">
                        <p class="isi">Moh. Fadil Abdillah</p> 
                    </div>
                </div>
            </div>
            
        </div>
        <!-- buat isi halaman bagian untuk contact us perlu diedit lagi -->
        <div class="contact_us" id="contact">
            <div class="isi_contact">
                <h3>CONTACT US</h3><br>
                <p>BankSejahtera@gmail.com</p><br>
                <p>+62 8819026787</p>
                <img src="gambar/facebook.png" alt="#" class="icon-footer">
				<img src="gambar/instagram.png" alt="#" class="icon-footer">
				<img src="gambar/youtube.png" alt="#" class="icon-footer">
            </div>
            <div class="isi_contact">
                <h4>BANK SEJAHTERA</h4>
                <p>Jl Pahlawan No.76 Telang, Kamal 5643,</p>
                <p>Bangkalan, Jawa Timur</p>
            </div>
        </div>

        <div class="footer">
            <p>copyright by @teamBanking</p>
        </div>
    </div>
</body>
</html>
    <?php
}
else {
    header('location:home.php');
}
?>
