<?php 
//fungsi buat cek alfabet
function cek_alfabet($data){
	$cek = "/^[a-zA-Z '-]+$/";
	if (empty($data) || $data == " ") {
		$data = "*Harap diisi!";
	}
	else if(!preg_match($cek, $data)){
		$data = "*Hanya bisa diisi dengan huruf";
	}
	else{
		 $data = True;
	}
	return $data;
}

//harap uabah masih belum selesai dan masih kurang
function alamat_email($data){
	if (empty($data) || $data == " ") {
		$data = "*Harap diisi!";
	}
	else if(!preg_match("/@/i", $data) && !preg_match("/./i", $data)){
		$data = "*Harap sertakan karakter @ dan . !";
	}
	else if(!preg_match("/@/i", $data)){
		$data = "*Harap sertakan karakter @ !";
	}
	else if(!strpos($data, ".")){
		$data = "*Harap sertakan karakter . !";
	}
	else{
		$data = True;
	}
	return $data;
}

//fungsi buat cek numerik transfer
function cek_numerik($data){
	$cek = "/^[0-9'-]+$/";
	$batas1 = 5;
	$batas2 = 9;
	if (empty($data) || $data == " ") {
		$data = "*Harap diisi!";
	}
	else if(!preg_match($cek, $data)){
		$data = "*Hanya bisa diisi dengan angka";
	}
	else if (strpos($data, " ")) {
		$data = "*Tidak boleh ada spasi";
	}
	else if (strlen($data) < 5) {
		$hasil = $batas - strlen($data);
		$data = "*Jumlah inputan kurang - $hasil digit harap isi dengan benar";
	}
	else if (strlen($data) > 9) {
		$hasil = strlen($data) - $batas;
		$data = "*Jumlah inputan lebih - $hasil digit harap isi dengan benar";
	}
	else{
		$data = True;
	}
	return $data;
}
//fungsi buat cek numerik rekening
function cek_numerik_rek($data){
	$cek = "/^[0-9'-]+$/";
	$batas = 16;
	if (empty($data) || $data == " ") {
		$data = "*Harap diisi!";
	}
	else if(!preg_match($cek, $data)){
		$data = "*Hanya bisa diisi dengan angka";
	}
	else if (strpos($data, " ")) {
		$data = "*Tidak boleh ada spasi";
	}
	else if (strlen($data) < 16) {
		$hasil = $batas - strlen($data);
		$data = "*Jumlah inputan kurang - $hasil harap isi dengan benar";
	}
	else if (strlen($data) > 16) {
		$hasil = strlen($data) - $batas;
		$data = "*Jumlah inputan lebih - $hasil harap isi dengan benar";
	}
	else{
		$data = True;
	}
	return $data;
}

//fungsi buat numerik no_tlp
function cek_numerik_tlp($data){
	$cek = "/^[0-9'-]+$/";
	$batas = 12;
	if (empty($data) || $data == " ") {
		$data = "*Harap diisi!";
	}
	else if(!preg_match($cek, $data)){
		$data = "*Hanya bisa diisi dengan angka";
	}
	else if (strpos($data, " ")) {
		$data = "*Tidak boleh ada spasi";
	}
	else if (strlen($data) < 12) {
		$hasil = $batas - strlen($data);
		$data = "*Jumlah inputan kurang - $hasil harap isi dengan benar";
	}
	else if (strlen($data) > 12) {
		$hasil = strlen($data) - $batas;
		$data = "*Jumlah inputan lebih - $hasil harap isi dengan benar";
	}
	else{
		$data = True;
	}
	return $data;
}

//fungsi buat password
function password($data){
	$cek = "/^[a-zA-Z '-]+$/";
	$cek2 =  "/^[0-9 '-]+$/";
	$hasil = !preg_match($cek, $data);
	$hasil2 = !preg_match($cek2, $data);
	if (empty($data) || $data == " ") {
		$data = "*Harap diisi!";
	}
	
	else if (strlen($data) < 7) {
		$hasil = 8 - strlen($data);
		$data = "*Jumlah inputan kurang - $hasil harap isi dengan benar";
	}
	else if($hasil && !$hasil2){
		$data = "*harap tambahkan huruf";
	}
	else if(!$hasil && $hasil2){
		$data = "*harap tambahkan angka ";
	}
	else{
		$data = True;
	}
	return $data;
}

//fungsi buat konfirmasi password
function  konfirmasi_password($data,$cek){
	if (empty($data) || $data == " ") {
		$data = "*Harap diisi!";
	}
	else if($data != $cek){
		$data = "*password salah harap diisi dengan benar";
	}
	else{
		$data = True;
	}
	return $data;
}
 ?>