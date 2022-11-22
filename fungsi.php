<?php 
function nama_user($data){
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

function nama_depan($data){
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

function no_tlp($data){
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
	else if (strlen($data) < 11) {
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
function agama($data){
	if ($data == "0") {
		$data = "*Harap diisi!";
	}
	else{
		$data = True;
	}
	return $data;
}

 ?>