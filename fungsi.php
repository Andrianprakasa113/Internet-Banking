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
function alfa_num($parameter_pertama){
	$cek = "/^[a-zA-Z0-9. '-]+$/";
	if (!isset($parameter_pertama) || empty($parameter_pertama)) {
		$data = '*harap diisi';
	}
	elseif (!preg_match($cek, $parameter_pertama)) {
		$data = "*harap diisi dengan benar";
	}
	else{
		$data = true;
	}
	return $data;
}
//harap uabah masih belum selesai dan masih kurang
function alamat_email($data){
	$pattern2 = "/^([a-zA-Z0-9 \. _]+)@([a-zA-Z]+)\.([a-zA-Z]{1,})(.[a-zA-Z]{1,})?(.[a-zA-Z]{1,})?$/";
	if (!isset($data) || empty($data)){
		$data = '*harap diisi';
	}else if (!preg_match($pattern2, $data)){
		$data = "*email tidak valid";
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
		$hasil = $batas1 - strlen($data);
		$data = "*Jumlah inputan kurang - $hasil digit harap isi dengan benar";
	}
	else if (strlen($data) > 9) {
		$hasil = strlen($data) - $batas2;
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
//fungsi buat ngecek saldo rekening
function cek_saldo($parameter_pertama)
{
	include 'koneksi.php';

	$kalimat_query = $kon -> prepare('SELECT SALDO_REK from rekening where NO_REK = :no_rek');
	$kalimat_query -> bindValue(':no_rek',  $parameter_pertama);
	$kalimat_query -> execute(); 
	$data = $kalimat_query -> fetch();
	return $data;
}
//fungsi buat update data saldo rekening
function update_saldo($parameter_pertama, $parameter_kedua)
{
	include 'koneksi.php';
	$kalimat_query = $kon -> prepare('UPDATE rekening SET SALDO_REK = :update_saldo where NO_REK = :no_rek');
	$kalimat_query -> bindValue(':no_rek', $parameter_pertama);
	$kalimat_query -> bindValue(':update_saldo', $parameter_kedua);
	$kalimat_query -> execute();
	return 0;
}
 //fungsi buat ngecek tgl bln dan thn
 function tgl($parameter_pertama){
	$cek = "/^[0-9'-]+$/";
	$batas = 2;
	if (empty($parameter_pertama) || $parameter_pertama == " ") {
		$data = "*Tanggal harap diisi!";
	}
	else if(!preg_match($cek, $parameter_pertama)){
		$data = "*Tanggal hanya bisa diisi dengan angka";
	}
	else if (strpos($parameter_pertama, " ")) {
		$data = "*Tanggal tidak boleh ada spasi";
	}
	else if (strlen($parameter_pertama) < 2) {
		$hasil = $batas - strlen($parameter_pertama);
		$data = "*Jumlah inputan tanggal kurang - $hasil harap isi dengan benar";
	}
	else if (strlen($parameter_pertama) > 2) {
		$hasil = strlen($parameter_pertama) - $batas;
		$data = "*Jumlah inputan tanggal lebih - $hasil harap isi dengan benar";
	}
	else if ($parameter_pertama > 31 || $parameter_pertama < 0 ) {
		$data = "*Tanggal harap diisi dengan benar";
	}
	else{
		$data = True;
	}
	return $data;
 }

 function bln($parameter_pertama){
	$cek = "/^[0-9'-]+$/";
	$batas = 2;
	if (empty($parameter_pertama) || $parameter_pertama == " ") {
		$data = "*Bulan harap diisi!";
	}
	else if(!preg_match($cek, $parameter_pertama)){
		$data = "*Bulan hanya bisa diisi dengan angka";
	}
	else if (strpos($parameter_pertama, " ")) {
		$data = "*Bulan tidak boleh ada spasi";
	}
	else if (strlen($parameter_pertama) < 2) {
		$hasil = $batas - strlen($parameter_pertama);
		$data = "*Jumlah inputan bulan kurang - $hasil harap isi dengan benar";
	}
	else if (strlen($parameter_pertama) > 2) {
		$hasil = strlen($parameter_pertama) - $batas;
		$data = "*Jumlah inputan bulan lebih - $hasil harap isi dengan benar";
	}
	else if ($parameter_pertama > 12 || $parameter_pertama < 0) {
		$data = "*Bulan harap diisi dengan benar";
	}
	else{
		$data = True;
	}
	return $data;
 }
 function thn($parameter_pertama){
	$cek = "/^[0-9'-]+$/";
	$batas = 4;
	if (empty($parameter_pertama) || $parameter_pertama == " ") {
		$data = "*Tahun harap diisi!";
	}
	else if(!preg_match($cek, $parameter_pertama)){
		$data = "*Tahun hanya bisa diisi dengan angka";
	}
	else if (strpos($parameter_pertama, " ")) {
		$data = "*Tahun tidak boleh ada spasi";
	}
	else if ($parameter_pertama < 0) {
		$data = "*Tahun harap diisi dengan benar";
	}
	else if (strlen($parameter_pertama) < 4) {
		$hasil = $batas - strlen($parameter_pertama);
		$data = "*Jumlah inputan Tahun kurang - $hasil harap isi dengan benar";
	}
	else if (strlen($parameter_pertama) > 4) {
		$hasil = strlen($parameter_pertama) - $batas;
		$data = "*Jumlah inputan Tahun lebih - $hasil harap isi dengan benar";
	}
	else{
		$data = True;
	}
	return $data;
 }
 ?>
